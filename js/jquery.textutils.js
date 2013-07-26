/**
 *  Tools for working with text
 *  (c) 2010 Interactive Things
 *
 *  textWidth - measure text width
 *  shortenText - shorten text using an ellipsis
 *
 *  Note: because of performance improvements, the plugin may
 *  behave unexpectedly when used on elements with different
 *  font styles.
 */
(function($) {
  
  // Test Div
  var div;

  /* TEXT METRICS 
	/////////////////////////////////////////////////////////////////*/
  $.fn.textWidth = function() {
    var el = this;
    var h = 0, w = 0;
    
    if (!div) {
      div = $('<div></div>');
      $("body").append(div);
      div.css({
        position: 'absolute',
        left: -1000,
        top: -1000,
        display: 'none'
      });
      
      var styles = ['margin-top', 'margin-right', 'margin-bottom', 'margin-left',
                    'padding-top', 'padding-right', 'padding-bottom', 'padding-left',
                    'border-top-width', 'border-right-width', 'border-bottom-width', 'border-left-width',
                    'font-size','font-style', 'font-weight', 'font-family','line-height', 'text-transform', 'letter-spacing'];
      var stylesHash = {};
      for (var i=0,l=styles.length;i<l;i++) {
        stylesHash[styles[i]] = $(el).css(styles[i]);
      }
      div.css(stylesHash);
    }

    div.html($(el).html());

    return div.outerWidth();
  }
  

  /* SHORTEN TEXT
	/////////////////////////////////////////////////////////////////*/
  $.fn.fitText = function(targetWidth) {
    var charWidth, stack = [];
    
    // Create cache slots that less exact than 1px
    var targetWidthSlot = Math.floor(targetWidth/15)*15;

    // Use a wide character like the "W" to approximate character width
    var first = $(this[0]);
    var firstText = first.text();
    charWidth = first.text("s").textWidth();
    first.text(firstText);

    // Fit text for each element
    this.each(function() {
      var self = this, text, shortenedText, textWidth, counter;
      
      // Make this operation non-blocking.
      stack.push(function() {
        // Cache the shortened text corresponding to a targetWidth
        if (!$(self).data('textCache')) {
          $(self).data('textCache', {});
        } else {
          var cache = $(self).data('textCache');
          // If the text has already been calculated, exit
          if (cache[targetWidthSlot]) {
            $(self).text(cache[targetWidthSlot]);
            return;
          }
        }

        // Save the original text
        if (!$(self).data('originalText')) {
          text = $(self).text();
          $(self).data('originalText', text);
        } else {
          text = $(self).data('originalText');
          $(self).text(text);
        }
    
        if (!$(self).data('textWidthCache')) {
          $(self).data('textWidthCache', {});
          textWidth = $(self).textWidth();
        } else {
          var cache = $(self).data('textWidthCache');
          if (cache[targetWidthSlot]) {
            textWidth = cache[targetWidthSlot];
          } else {
            textWidth = $(self).textWidth();
            cache[targetWidthSlot] = textWidth;
            $(self).data('textWidthCache', cache);
          }
        }

        var hiddenChars = Math.floor((textWidth - targetWidth)/charWidth);
        if (hiddenChars < 0) return self;
    
        // Start with deleting the approximated hidden characters
        counter = hiddenChars;
        while (textWidth > targetWidth) {
          if (text.length < 5) {
            shortenedText = text.substr(0,leftBoundary) + "…";
            $(self).text(shortenedText);
            break;
          } else {
            var newLength = Math.floor(text.length - counter);
            var leftBoundary = Math.floor(newLength * 0.7);
            var rightBoundary = Math.ceil(text.length - newLength * 0.3);
            shortenedText = text.substr(0,leftBoundary) + "…" + text.substr(rightBoundary, text.length);
            $(self).text(shortenedText);
          }
          textWidth = $(self).textWidth();
          counter++;
        }

        var cache = $(self).data('textCache');
        cache[targetWidthSlot] = shortenedText;
        $(self).data('textCache', cache);
      });
    });
    
    // Work through stack
    setTimeout(stackWorker, 0);
    function stackWorker() {
      if (stack.length > 0) {
        stack.shift().call();
      }
      setTimeout(stackWorker, 0);
    }

  }
})(jQuery);