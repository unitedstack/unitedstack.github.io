(function() {
    ("abbr article aside audio canvas datalist details figcaption figure footer " +
            "header hgroup mark meter nav output progress section summary time video"
            ).replace(/[^, ]+/g, function(tag) {
        document.createElement(tag);
    });
    var prefix = "http://rubylouvre.github.io/mvvm/";
    var head = document.getElementsByTagName("head")[0];
    var appendScript = function(url) {
        var node = document.createElement("script");
        node.src = prefix + "/javascripts" + url;
        head.appendChild(node);
    };
    var appendStyle = function(url) {
        var node = document.createElement("link");
        node.type = "text/css";
        node.rel = "stylesheet";
        node.href = prefix + "/stylesheets" + url;
        head.appendChild(node);
    };
    "/shCore.js  /shCore.css /shThemeRDark.css".replace(/[^, ]+/g, function(url) {
        if (/\.js$/.test(url)) {
            appendScript(url);
        } else {
            appendStyle(url);
        }
    });
    function Highlight() {
        try {
            SyntaxHighlighter.highlight()
        } catch (e) {
            setTimeout(Highlight, 500);
        }
    }
    var bind = document.dispatchEvent ? function(el, type, fn, phase) {
        el.addEventListener(type, fn, !!phase);
        return fn;
    } : function(el, type, fn) {
        el.attachEvent && el.attachEvent("on" + type, function() {
            fn.call(el, event);
        });
        return fn;
    };
    function getNext(el) {
        var elem = el;
        do {
            elem = elem.nextSibling;
            if (elem && elem.nodeName === "BUTTON" && /doc_btn/.test(elem.className)) {
                return elem;
            }
        } while (elem);
    }
      function unescapeHTML(target) {
            //还原为可被文档解析的HTML标签
            return target.replace(/&quot;/g, '"').replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&amp;/g, "&") //处理转义的中文和实体字符
                    .replace(/&#([\d]+);/g, function($0, $1) {
                return String.fromCharCode(parseInt($1, 10));
            });
        }
    bind(window, "load", function() {
        var elems = document.getElementsByTagName("pre");
        for (var i = 0, elem; elem = elems[i++]; ) {
            try {
                if (/brush:\s*j/i.test(elem.className)) {
                    var btn = getNext(elem)
                    if (btn) {
                        var code = unescapeHTML(elem.innerHTML);
                        var fn = Function(code);
                        btn.exec = fn;
                    }
                }
            } catch (e) {
               window.console && console.log(e.message)
            }
        }
        Highlight();
        bind(document.body, "click", function(e) {
            var target = e.target || e.srcElement;
            if (typeof target.exec == "function") {
                target.exec.call(window);
            }
        });
    });

})();
