$(document).ready(function(){
	/* ISOTOPE SETUP
	/////////////////////////////////////////////////////////////////*/
	var $container = $('#cards');
	$container.isotope({
	  itemSelector: '.card',
    layoutMode: 'cellsByRow',
    getSortData : {
      name : function ( $elem ) {
        var name = $elem.find('.tool_name').text();
        return name;
      }
    },
    sortBy : 'name',
    cellsByRow : {
      columnWidth : 245
    }
	});
	
  /* ISOTOPE FILTER
	/////////////////////////////////////////////////////////////////*/
  var filters = {};

  // filter buttons
  $('#nav li a').click(function(){
    var $this = $(this);
    if ( $this.hasClass('selected') ) {
      return;
    }
    var $optionSet = $this.parents('.option-set');
    $optionSet.find('.selected').removeClass('selected');
    $this.addClass('selected');

    var group = $optionSet.attr('data-filter-group');
    filters[ group ] = $this.attr('data-filter');
    var isoFilters = [];
    for ( var prop in filters ) {
      isoFilters.push( filters[ prop ] )
    }
    var selector = isoFilters.join('');
    $container.isotope({ filter: selector });
    console.log(selector);

    return false;
  });
  
  /* QUICKSEARCH
  /////////////////////////////////////////////////////////////////*/
  $('input#search_field').quicksearch('#deck #cards .card');
  
  $('input#search_field').quicksearch('#deck #cards .card', {
      'show': function() {
          $(this).addClass('quicksearch-match');
      },
      'hide': function() {
          $(this).removeClass('quicksearch-match');
      },
      onAfter: function() {
        $container.isotope({ filter: '.quicksearch-match'});
      }
  });
  
  /* CARD FLIP
  /////////////////////////////////////////////////////////////////*/
  $('.card .front').append('<span class="flip_back"></span>');
  $('.card .back').append('<span class="flip_front"></span>');
  
  $('.card').click(function(e){
    if($(this).hasClass('flip')){
      if(e.target.tagName == "A"){
        window.open(e.target.href);
        e.preventDefault();
      }else{
        $(this).removeClass('flip');
      }
    }else{
      if(e.target.tagName == "A"){
        window.open(e.target.href);
        e.preventDefault();
      }else{
        $(this).addClass('flip');
      }
    }
  });
  
  /* FIT TEXT
  /////////////////////////////////////////////////////////////////*/
  $(this).find(".card .front a").fitText(205);
  
  /* GITHUB WATCHERS
  /////////////////////////////////////////////////////////////////*/
  $('.card').each(function(){
    if ($(".back a[title='GitHub Repository']", this).length != 0){
      if ($(this).find('.popularity_chart').length == 0){
        //$('.back', this).append('<div class="popularity_chart"><span class="popularity_track"><span class="popularity_bar"></span></span></div>');
      }
      //query = 'http://www.google.com/search?q=' + $(".front a[title='Official Website']", this).attr('href') + ' #resultStats';
      //placeholder.load(query);
      placeholder = $(this).find('.popularity_bar');
      var github_link = $(".back a.github_repository", this)
      var query = $(github_link).attr('href');
      query = query.replace("https://", "http://");
      query = query.replace("http://github.com/", "http://github.com/api/v2/json/repos/show/");
      $.getJSON(query, function(json) {
        $(github_link).html($(github_link).html() + " (<span class='github_watchers'>" + json.repository.watchers + "</span>)");
      });
    }
  })
  
});
