/*! UIkit 2.27.2 | http://www.getuikit.com | (c) 2014 YOOtheme | MIT License */
(function(UI) {

    "use strict";

    UI.component('tab', {

        defaults: {
            target    : '>li:not(.frxp-tab-responsive, .frxp-disabled)',
            connect   : false,
            active    : 0,
            animation : false,
            duration  : 200,
            swiping   : true
        },

        boot: function() {

            // init code
            UI.ready(function(context) {

                UI.$('[data-frxp-tab]', context).each(function() {

                    var tab = UI.$(this);

                    if (!tab.data('tab')) {
                        var obj = UI.tab(tab, UI.Utils.options(tab.attr('data-frxp-tab')));
                    }
                });
            });
        },

        init: function() {

            var $this = this;

            this.current = false;

            this.on('click.uk.tab', this.options.target, function(e) {

                e.preventDefault();

                if ($this.switcher && $this.switcher.animating) {
                    return;
                }

                var current = $this.find($this.options.target).not(this);

                current.removeClass('frxp-active').blur();

                $this.trigger('change.uk.tab', [UI.$(this).addClass('frxp-active'), $this.current]);

                $this.current = UI.$(this);

                // Update ARIA
                if (!$this.options.connect) {
                    current.attr('aria-expanded', 'false');
                    UI.$(this).attr('aria-expanded', 'true');
                }
            });

            if (this.options.connect) {
                this.connect = UI.$(this.options.connect);
            }

            // init responsive tab
            this.responsivetab = UI.$('<li class="frxp-tab-responsive frxp-active"><a></a></li>').append('<div class="frxp-dropdown frxp-dropdown-small"><ul class="frxp-nav frxp-nav-dropdown"></ul><div>');

            this.responsivetab.dropdown = this.responsivetab.find('.frxp-dropdown');
            this.responsivetab.lst      = this.responsivetab.dropdown.find('ul');
            this.responsivetab.caption  = this.responsivetab.find('a:first');

            if (this.element.hasClass('frxp-tab-bottom')) this.responsivetab.dropdown.addClass('frxp-dropdown-up');

            // handle click
            this.responsivetab.lst.on('click.uk.tab', 'a', function(e) {

                e.preventDefault();
                e.stopPropagation();

                var link = UI.$(this);

                $this.element.children('li:not(.frxp-tab-responsive)').eq(link.data('index')).trigger('click');
            });

            this.on('show.uk.switcher change.uk.tab', function(e, tab) {
                $this.responsivetab.caption.html(tab.text());
            });

            this.element.append(this.responsivetab);

            // init UIkit components
            if (this.options.connect) {

                this.switcher = UI.switcher(this.element, {
                    toggle    : '>li:not(.frxp-tab-responsive)',
                    connect   : this.options.connect,
                    active    : this.options.active,
                    animation : this.options.animation,
                    duration  : this.options.duration,
                    swiping   : this.options.swiping
                });
            }

            UI.dropdown(this.responsivetab, {mode: 'click', preventflip: 'y'});

            // init
            $this.trigger('change.uk.tab', [this.element.find(this.options.target).not('.frxp-tab-responsive').filter('.frxp-active')]);

            this.check();

            UI.$win.on('resize orientationchange', UI.Utils.debounce(function(){
                if ($this.element.is(':visible'))  $this.check();
            }, 100));

            this.on('display.uk.check', function(){
                if ($this.element.is(':visible'))  $this.check();
            });
        },

        check: function() {

            var children = this.element.children('li:not(.frxp-tab-responsive)').removeClass('frxp-hidden');

            if (!children.length) {
                this.responsivetab.addClass('frxp-hidden');
                return;
            }

            var top          = (children.eq(0).offset().top + Math.ceil(children.eq(0).height()/2)),
                doresponsive = false,
                item, link, clone;

            this.responsivetab.lst.empty();

            children.each(function(){

                if (UI.$(this).offset().top > top) {
                    doresponsive = true;
                }
            });

            if (doresponsive) {

                for (var i = 0; i < children.length; i++) {

                    item  = UI.$(children.eq(i));
                    link  = item.find('a');

                    if (item.css('float') != 'none' && !item.attr('frxp-dropdown')) {

                        if (!item.hasClass('frxp-disabled')) {

                            clone = UI.$(item[0].outerHTML);
                            clone.find('a').data('index', i);

                            this.responsivetab.lst.append(clone);
                        }

                        item.addClass('frxp-hidden');
                    }
                }
            }

            this.responsivetab[this.responsivetab.lst.children('li').length ? 'removeClass':'addClass']('frxp-hidden');
        }
    });

})(UIkit2frxp);
