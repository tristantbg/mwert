$(function(){$(".oembed-video .thumb, .oembed-video .play").click(function(){var t=$(this).parent(),e=t.find("iframe, object");e.attr("src",e.attr("data-src")),e.css({display:"block"}),t.find(".play, .thumb").remove()})});