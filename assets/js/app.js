/* globals $:false */
var width = $(window).width(),
    height = $(window).height(),
    isMobile = false,
    delay,
    $root = '/';
$(function() {
    var app = {
        init: function() {
            $(window).resize(function(event) {
                app.sizeSet();
            });
            $(document).ready(function($) {
                $body = $('body');
                $container = $('#container');
                $header = $('header');
                app.sizeSet();
                History.Adapter.bind(window, 'statechange', function() {
                    var State = History.getState();
                    console.log(State);
                    content = State.data;
                    app.loadContent(State.url, $container);
                });
                if ('scrollRestoration' in history) {
                    history.scrollRestoration = 'manual';
                }
                $body.on('click', '#back', function(e) {
                    History.go(-1);
                });
                $('#intro').click(function(event) {
                    $(this).addClass('hidden');
                    $header.addClass('reduction');
                    setTimeout(function() {
                        $header.removeClass('reduction').addClass('reduced');
                    }, 1450);
                    setTimeout(function() {
                        $('#intro').remove();
                    }, 2000);
                });
                if (isMobile) {
                    $header.addClass('reduced');
                    $('#intro').remove();
                }
                $('body').on('click', '[data-target]', function(e) {
                    $el = $(this);
                    e.preventDefault();
                    $('.submenu').removeClass('open');
                    if ($el.data('target') == "page") {
                        History.pushState({
                            type: 'page'
                        }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                    } else if ($el.data('target') == "about") {
                        History.pushState({
                            type: 'about'
                        }, $el.data('title') + " | " + $sitetitle, $el.attr('href'));
                    } else if ($el.data('target') == "index") {
                        e.preventDefault();
                        app.goIndex();
                    }
                    if (Modernizr.localstorage && $('#container .inner').hasClass('home')) {
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
                $body.on('click', '#read-more', function(event) {
                    event.preventDefault();
                    $(this).parent().addClass('more');
                });
                app.navScroll();
                window.viewportUnitsBuggyfill.init();
                document.addEventListener('lazybeforeunveil', function(e) {
                    $(e.target).parents('.project').addClass('lazyloaded');
                });
                document.addEventListener('lazybeforesizes', function(e) {
                    e.detail.width = Math.max(e.target.parentNode.offsetWidth, e.detail.width);
                });
                $(window).load(function() {
                    app.sizeSet();
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
            } else {
                $("#projects-container .project:not(:first-child)").each(function(index, el) {
                    var elem = $(this);
                    var prevH = elem.prev().outerHeight();
                    var elemH = $(this).outerHeight();
                    if (elemH > prevH) {
                        $(this).css('marginTop', -prevH / 4);
                    } else {
                        $(this).css('marginTop', -elemH / 3);
                    }
                    elem.find('.secondary.image:not(".fit-height")').each(function(index, el) {
                      $(this).width($(this).parent().width());
                    });
                });
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
                if (footer.length > 0 && desc.length > 0) {
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
            if (content.type == 'about') {
                $body.addClass('about');
            } else {
                $body.removeClass('about');
            }
            $('#container .inner').hasClass('home') ? delay = 700 : delay = 300;
            setTimeout(function() {
                $(target).load(url + ' #container .inner', function(response) {
                    setTimeout(function() {
                        if (Modernizr.localstorage) {
                            if ($('#container .inner').hasClass('home')) {
                                var id = $('#container .inner.home').data('id');
                                var scrollTop = localStorage.getItem('scrollTop-' + id) || 0;
                                console.log('GET: ' + 'scrollTop-' + id + "= " + scrollTop);
                                $('html, body').scrollTop(scrollTop);
                            } else {
                                $('html, body').scrollTop(0);
                            }
                        }
                        $body.removeClass('leaving');
                        app.navScroll();
                        app.sizeSet();
                    }, 100);
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