;(function ($) {
    $.plugin('trustedShops', {

        /**
         * Plugin constructor
         */
        init: function () {
            $.subscribe('plugin/offCanvasMenu/openMenu', function (event, plugin) {
                if (plugin.opts.direction === 'fromRight') {
                    var badge = $('*[id^="tsbadge_"]');

                    badge.addClass('ts--canvas-open');
                }
            });

            $.subscribe('plugin/offCanvasMenu/closeMenu', function () {
                var badge = $('*[id^="tsbadge_"]');
                badge.removeClass('ts--canvas-open');
            });
        }
    });

    $('body').trustedShops();
})(jQuery);