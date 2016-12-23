/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    isMobile = false,
    delay,
    $root = '/new';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {
                app.sizeSet();
            });
            $(document).ready(function($) {
                $body = $('body');
                $container = $('#container');
                History.Adapter.bind(window, 'statechange', function() {
                    var State = History.getState();
                    console.log(State);
                    content = State.data;
                    if (content.type == 'page') {
                        app.loadContent(State.url, $container);
                    } else {
                        app.loadContent(State.url, $container);
                    }
                });
                $('body').on('click', '[data-target]', function(e) {
                    $el = $(this);
                    e.preventDefault();
                    $('.submenu').removeClass('open');
                    if ($el.data('target') == "page") {
                        History.pushState({
                            type: 'page'
                        }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                    } else if ($el.data('target') == "index") {
                        e.preventDefault();
                        app.goIndex();
                    }
                    if (Modernizr.localstorage) {
                        localStorage.setItem('scrollTop-' + $('#container .inner.home').data('id'), $body.scrollTop());
                    }
                });
                $(document).keyup(function(e) {
                    if (e.keyCode === 27) app.goIndex();
                    if (e.keyCode === 37 && $slider) app.goPrev($slider);
                    if (e.keyCode === 39 && $slider) app.goNext($slider);
                });
                $body.on('click', '.menu-toggle', function(event) {
                    event.preventDefault();
                    var target = $(this).next('.submenu');
                    if (target.hasClass('open')) {
                        $('.submenu').removeClass('open');
                        target.removeClass('open');
                    } else {
                        $('.submenu').removeClass('open');
                        target.addClass('open');
                    }
                });
                app.navScroll();
                window.viewportUnitsBuggyfill.init();
                $(window).load(function() {
                    $(".loader").fadeOut("fast");
                });
            });
        },
        sizeSet: function() {
            width = $(window).width();
            height = $(window).height();
            if (width <= 770 || Modernizr.touch) isMobile = true;
            if (isMobile) {
                if (width >= 770) {
                    isMobile = false;
                    //location.reload();
                }
            }
        },
        goIndex: function() {
            History.pushState({
                type: 'index'
            }, $sitetitle, window.location.origin + $root);
        },
        navScroll: function(event) {
            var desc = $('#project-description');
            var footer = $('footer');

            function searchElems() {
                if (footer.length > 0) {
                    var window_bottom = $(document).scrollTop() + height - 20;
                    if (window_bottom >= desc.position().top) {
                        footer.addClass('next-project');
                    } else {
                        footer.removeClass('next-project');
                    }
                }
            }
            $(document).on("scroll", searchElems);
        },
        loadContent: function(url, target) {
            $body.addClass('leaving');
            $('#container .inner').hasClass('home') ? delay = 1000 : delay = 300;
            setTimeout(function() {
                $(target).load(url + ' #container .inner', function(response) {
                    setTimeout(function() {
                        if (Modernizr.localstorage) {
                            if ($('#container .inner').hasClass('home')) {
                                var id = $('#container .inner.home').data('id');
                                var scrollTop = localStorage.getItem('scrollTop-' + id) || 0;
                                console.log('GET: ' + 'scrollTop-' + id + "= " + scrollTop);
                                $body.scrollTop(scrollTop);
                            } else {
                                $body.scrollTop(0);
                            }
                        } else {
                            $body.scrollTop(0);
                        }
                        $body.removeClass('leaving');
                        app.navScroll();
                    }, 500);
                });
            }, delay);
        },
        deferImages: function() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i = 0; i < imgDefer.length; i++) {
                if (imgDefer[i].getAttribute('data-src')) {
                    imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                }
            }
        }
    };
    app.init();
});