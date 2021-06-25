jQuery(function($) {
    $(window).scroll(function() {
        // This is then function used to detect if the element is scrolled into view
        function elementScrolled(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $(elem).offset().top;
            return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
        }

        // This is where we use the function to detect if ".box2" is scrolled into view, and when it is add the class ".animated" to the <p> child element
        if (elementScrolled('main>div, footer')) {
            var els = $('main > div, footer'),
                i = 0,
                f = function() {
                    $(els[i++]).addClass('jump-in-animation');
                    if (i < els.length) setTimeout(f, 400);
                };
            f();
        }
    });
});