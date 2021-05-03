/*! UIkit 2.27.2 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
(function(UI) {

    "use strict";

    UI.component('nav', {

        defaults: {
            toggle: '>li.frxp-parent > a[href="#"]',
            lists: '>li.frxp-parent > ul',
            multiple: false
        },

        boot: function() {

            // init code
            UI.ready(function(context) {

                UI.$('[data-frxp-nav]', context).each(function() {
                    var nav = UI.$(this);

                    if (!nav.data('nav')) {
                        var obj = UI.nav(nav, UI.Utils.options(nav.attr('data-frxp-nav')));
                    }
                });
            });
        },

        init: function() {

            var $this = this;

            this.on('click.uk.nav', this.options.toggle, function(e) {
                e.preventDefault();
                var ele = UI.$(this);
                $this.open(ele.parent()[0] == $this.element[0] ? ele : ele.parent("li"));
            });

            this.update();

            UI.domObserve(this.element, function(e) {
                if ($this.element.find($this.options.lists).not('[role]').length) {
                    $this.update();
                }
            });
        },

        update: function() {

            var $this = this;

            this.find(this.options.lists).each(function() {

                var $ele   = UI.$(this).attr('role', 'menu'),
                    parent = $ele.closest('li'),
                    active = parent.hasClass("frxp-active");

                if (!parent.data('list-container')) {
                    $ele.wrap('<div style="overflow:hidden;height:0;position:relative;"></div>');
                    parent.data('list-container', $ele.parent()[active ? 'removeClass':'addClass']('frxp-hidden'));
                }

                // Init ARIA
                parent.attr('aria-expanded', parent.hasClass("frxp-open"));

                if (active) $this.open(parent, true);
            });
        },

        open: function(li, noanimation) {

            var $this = this, element = this.element, $li = UI.$(li), $container = $li.data('list-container');

            if (!this.options.multiple) {

                element.children('.frxp-open').not(li).each(function() {

                    var ele = UI.$(this);

                    if (ele.data('list-container')) {
                        ele.data('list-container').stop().animate({height: 0}, function() {
                            UI.$(this).parent().removeClass('frxp-open').end().addClass('frxp-hidden');
                        });
                    }
                });
            }

            $li.toggleClass('frxp-open');

            // Update ARIA
            $li.attr('aria-expanded', $li.hasClass('frxp-open'));

            if ($container) {

                if ($li.hasClass('frxp-open')) {
                    $container.removeClass('frxp-hidden');
                }

                if (noanimation) {

                    $container.stop().height($li.hasClass('frxp-open') ? 'auto' : 0);

                    if (!$li.hasClass('frxp-open')) {
                        $container.addClass('frxp-hidden');
                    }

                    this.trigger('display.uk.check');

                } else {

                    $container.stop().animate({
                        height: ($li.hasClass('frxp-open') ? getHeight($container.find('ul:first')) : 0)
                    }, function() {

                        if (!$li.hasClass('frxp-open')) {
                            $container.addClass('frxp-hidden');
                        } else {
                            $container.css('height', '');
                        }

                        $this.trigger('display.uk.check');
                    });
                }
            }
        }
    });


    // helper

    function getHeight(ele) {

        var $ele = UI.$(ele), height = 'auto';

        if ($ele.is(':visible')) {
            height = $ele.outerHeight();
        } else {

            var tmp = {
                position: $ele.css('position'),
                visibility: $ele.css('visibility'),
                display: $ele.css('display')
            };

            height = $ele.css({position: 'absolute', visibility: 'hidden', display: 'block'}).outerHeight();

            $ele.css(tmp); // reset element
        }

        return height;
    }

})(UIkit2frxp);
