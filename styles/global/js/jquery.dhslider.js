/**
 * All credits goes to Dannie Hansen @ dannie93dk@hotmail.com
 *
 * Use this as you wish, share it as you wish and customize it as you wish.
 *
 * But always leave the above credits.
 *
 * Version: 1.1
 *
 * Changelog:
 *
 * --- 1.1 ---
 * - Added number support for controls.
 *
 * --- 1.0 ---
 * Release
 **/

(function($){
    var DHdata = {
        options: {
            speed: 500,
            auto: {
                active: true,
                speed: 500
            },
            preload: {
                active: true,
                fadeSpeed: 500,
                callback: function () {}
            },
            controls: {
                active: true,
                action: {
                    type: "fade",
                    speed: 1000,
                    fixed: true
                },
                numbers: false,
                callback: function () {}
            },
            captions: {
                active: true,
                action: {
                    type: "fade",
                    speed: 1000
                },
                callback: function () {}
            },
            callback: function () {}
        },
        elements: {},
        captions: {},
        controls: {},
        loadedElements: 0,
        slider: null,
        currentSlide: 999,
        sliderWidth: 0,
        sliding: false
    };
    
    var CheckPreload = function () {
        if(DHdata.loadedElements == DHdata.elements.length) {
            DHdata.slider.fadeIn(DHdata.options.preload.fadeSpeed, function () {
                $(this).css({ display: 'block' });
                initDHslider();
                DHdata.options.preload.callback(DHdata.loadedElements);
            });
        }
    };
    
    var initDHslider = function () {
        DHdata.slider.find(".elements").css({ width: (DHdata.elements.length * DHdata.sliderWidth) });
        
        if(DHdata.options.auto.active == true) {
            setInterval(function () {
                var OverallElements = DHdata.elements.length;
                var SlideNext = DHdata.currentSlide + 1;
                
                if(OverallElements < (SlideNext+1)) {
                    SlideNext = 0;
                }
                
                DHslide(SlideNext);
            }, DHdata.options.auto.speed);
        }
        
        if(DHdata.controls.length == 1 && DHdata.options.controls.active) {
            DHdata.elements.each(function (index, item) {
                DHdata.controls.append('<div class="control control-'+index+'" rel="'+index+'">'+(DHdata.options.controls.numbers == true ? (index+1) : "")+'</div>');
            });
            
            DHdata.controls.css({ marginLeft: -(DHdata.controls.width() / 2) });
            
            DHdata.controls.find(".control").click(function () {
                var index = parseInt($(this).attr("rel"));
                DHdata.options.controls.callback();
                DHslide(index);
            });
            
            if(DHdata.options.controls.action.type == "fade") {
                DHdata.controls.fadeIn(DHdata.options.controls.action.speed, function () {
                    $(this).css({ display: 'block' });
                });
            } else if(DHdata.options.controls.action.type == "normal") {
                DHdata.controls.css({ display: 'block' });
            }
        }
        
        if(DHdata.options.captions.active == true && DHdata.captions.length > 0) {
            if(DHdata.options.captions.action.type == "fade") {
                DHdata.slider.find(".captions").fadeIn(DHdata.options.captions.action.speed, function () {
                    $(this).css({ display: 'block' });
                    DHdata.options.captions.callback();
                });
            } else if(DHdata.options.captions.action.type == "normal") {
                DHdata.slider.find(".captions").css({ display: 'block' });
                DHdata.options.captions.callback();
            }
        }
        
        DHslide(0);
    };
    
    var DHslide = function (index) {
        if(index != DHdata.currentSlide && DHdata.sliding == false) {
            DHdata.sliding = true;
            
            var NewLeft = 0;
            
            NewLeft = (-(DHdata.sliderWidth * index));
            
            if(DHdata.currentSlide == 999) {
                NewLeft = 0;
            }
            
            if(DHdata.controls.length == 1 && DHdata.options.controls.active) {
                var CurrentActive = DHdata.controls.find(".active");
                
                if(CurrentActive.length > 0 || DHdata.currentSlide == 999) {
                    if(DHdata.currentSlide != 999) { CurrentActive.removeClass("active"); }
                    DHdata.controls.find(".control-"+index).addClass("active");
                }
            }
            
            if(DHdata.options.captions.active == true && DHdata.captions.length > 0) {
                var Obj = DHdata.slider.find(".captions div").eq(index);
                var Obj2 = DHdata.slider.find(".captions div").eq(DHdata.currentSlide);
                
                if((Obj.css("display") == "none" && Obj2.css("display") == "block")) {
                    if(DHdata.options.captions.action.type == "fade") {
                        Obj2.fadeOut(DHdata.options.captions.action.speed, function () {
                            $(this).css({ display: 'none' });
                            
                            Obj.fadeIn(DHdata.options.captions.action.speed, function () {
                                $(this).css({ display: 'block' });
                            });
                        });
                    } else if(DHdata.options.captions.action.type == "normal") {
                        Obj.css({ display: 'block' });
                        Obj2.css({ display: 'none' });
                    }
                } else if(DHdata.currentSlide == 999) {
                    if(DHdata.options.captions.action.type == "fade") {
                        Obj.fadeIn(DHdata.options.captions.action.speed, function () {
                            $(this).css({ display: 'block' });
                        });
                    } else if(DHdata.options.captions.action.type == "normal") {
                        Obj.css({ display: 'block' });
                    }
                }
            }
            
            DHdata.slider.find(".elements").animate({
                left: NewLeft
            }, DHdata.options.speed, function () {
                DHdata.sliding = false;
                DHdata.currentSlide = index;
                DHdata.options.callback(index);
            });
        }
    };
    
    $.fn.DHslider = function(options) {
        if(options) {
            $.extend(DHdata.options, options);
        }
        
        DHdata.slider = this;
        
        DHdata.elements = DHdata.slider.find(".elements img");
        DHdata.captions = DHdata.slider.find(".captions div");
        DHdata.controls = DHdata.slider.find(".controls");
        DHdata.sliderWidth = DHdata.slider.width();
        
        if(DHdata.elements.length > 0) {
            if(DHdata.options.preload.active) {
                DHdata.elements.each(function (index, item) {
                    var image = $(item).bind("load", function () {
                        DHdata.loadedElements++;
                        CheckPreload();
                    });
                });
            } else {
                initDHslider();
            }
        }
        
        return this;
    };
})(jQuery);