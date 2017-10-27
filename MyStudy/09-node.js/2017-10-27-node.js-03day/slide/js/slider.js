jQuery.easing["jswing"] = jQuery.easing["swing"];
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function (x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
    },
    easeOutQuad: function (x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b
    },
    easeOutBounce: function (x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b
        } else {
            if (t < (2 / 2.75)) {
                return c * (7.5625 * (t -= (1.5 / 2.75)) * t + 0.75) + b
            } else {
                if (t < (2.5 / 2.75)) {
                    return c * (7.5625 * (t -= (2.25 / 2.75)) * t + 0.9375) + b
                } else {
                    return c * (7.5625 * (t -= (2.625 / 2.75)) * t + 0.984375) + b
                }
            }
        }
    }
});
String.prototype.format = function () {
    var pattern = this;
    for (var i = 0, len = arguments.length; i < len; i++) {
        var regex = new RegExp("\\{" + i + "\\}", "g");
        pattern = pattern.replace(regex, arguments[i]);
    }
    return pattern;
};
$.fn.will = function (callback, type) {
    $(this).queue(type || "fx", function (next) {
        callback && typeof callback == "function" && callback.call(this);
        next()
    });
    return this
};
(function ($) {
    function Slider(opt) {
        this.opt = opt;
        this.ele = $("#" + this.opt.id)
    }
    Slider.prototype = {
        cubeSize: {
            x: 0,
            y: 0
        },
        nowIndex: 0,
        canChose: true,
        nextIndex: function () {
            var newIndex = this.nowIndex + 1;
            if (newIndex >= this.opt.imgs.length) {
                newIndex = 0
            }
            return newIndex
        },
        init: function () {
            this.preLoad();
            this.fill();
            this.resize();
            var self = this;
            $(window).resize(function () {
                self.resize()
            })
        },
        preLoad: function () {
            var arr = this.opt.imgs;
            $.each(arr, function (index, url) {
                var img = document.createElement("img");
                img.src = url
            })
        },
        begin: function () {
            var self = this;
            this.timer = setInterval(function () {
                var newIndex = self.nowIndex + 1;
                if (newIndex >= self.opt.imgs.length) {
                    newIndex = 0
                }
                self.choseImg(newIndex)
            }, self.opt.interval)
        },
        stop: function () {
            clearInterval(this.timer)
        },
        fill: function () {
            var result = '<div class="slider-box">';
            for (var x = 0; x < this.opt.x; x++) {
                for (var y = 0; y < this.opt.y; y++) {
                    result += '<div id="{0}" class="{1}"><div class="slider_inner_a"></div><div class="slider_inner_b"></div></div>'.format(this.opt.id + "_" + x + "_" + y, "slider_cube")
                }
            }
            if (this.opt.showBar) {
                result += '<div class="slider_bar">';
                result += '<span class="active"></span>';
                result += new Array(this.opt.imgs.length).join("<span></span>");
                result += "</div>"
            }
            result += "</div>";
            this.ele.html(result);
            this.eleBox = this.ele.children(".slider-box");
            this.bindEvents()
        },
        bindEvents: function () {
            var self = this;
            if (this.opt.showBar) {
                this.eleBox.children(".slider_bar").on("click", "span", function () {
                    var eleSpan = $(this);
                    self.choseImg(eleSpan.index())
                })
            }
            if (this.opt.urls.length <= 0) {
                return
            }
            self.eleBox.find(".slider_cube").click(function () {
                window.location.href = self.opt.urls[self.nowIndex]
            }).css("cursor", "pointer");
            self.eleBox.mouseenter(function () {
                self.stop()
            }).mouseleave(function () {
                self.begin()
            })
        },
        resize: function () {
            this.eleBox.height(this.eleBox.width() / this.opt.scale);
            var eleWid = this.eleBox.width(),
                eleHei = this.eleBox.height();
            var xSize, ySize;
            if (this.opt.border) {
                xSize = (eleWid - this.opt.x + 1) / this.opt.x;
                ySize = (eleHei - this.opt.y + 1) / this.opt.y
            } else {
                xSize = eleWid / this.opt.x;
                ySize = eleHei / this.opt.y
            }
            this.cubeSize = {
                x: xSize,
                y: ySize
            };
            if (this.opt.x == 1) {
                xSize = eleWid
            }
            if (this.opt.y == 1) {
                ySize = elehei
            }
            var borLen = this.opt.border ? 1 : 0;
            for (var x = 0; x < this.opt.x; x++) {
                for (var y = 0; y < this.opt.y; y++) {
                    $("#" + this.opt.id + "_" + x + "_" + y).css({
                        "left": x * xSize + x * borLen + "px",
                        "top": y * ySize + y * borLen + "px",
                        "width": xSize + "px",
                        "height": ySize + "px"
                    }).find(".slider_inner_a,.slider_inner_b").css({
                        "background-image": "url({0})".format(this.opt.imgs[this.nowIndex]),
                        "background-position": "{0}px {1}px".format(-x * xSize, -y * ySize),
                        "background-size": "{0}px {1}px".format(eleWid, eleHei)
                    })
                }
            }
        },
        choseImg: function (index) {
            var self = this;
            if (index == self.nowIndex) {
                return
            }
            if (!self.canChose) {
                return
            }
            self.canChose = false;
            setTimeout(function () {
                self.canChose = true
            }, self.opt.delay + 200);
            this.nowIndex = index;
            var url = this.opt.imgs[index];
            this.effectIndex = this.effectIndex || 0;
            if (this.effectIndex >= this.effects.length) {
                this.effectIndex = 0
            }
            this.effects[this.effectIndex](this, url);
            this.effectIndex++;
            if (self.opt.showBar) {
                self.eleBox.children(".slider_bar").find("span").removeClass("active").eq(self.nowIndex).addClass("active")
            }
        },
        effects: [function (self, url) {
            var delayItem = self.opt.delay / (self.opt.x * self.opt.y);
            self.effectTemplate(function (eleA, eleB, x, y) {
                eleA.css({
                    "top": -self.cubeSize.y + "px",
                    "background-image": "url({0})".format(url)
                });
                var delayTime = (x + (self.opt.x * y)) * delayItem * 4 / 5;
                eleA.delay(delayTime).animate({
                    "top": "0"
                }, {
                    duration: delayItem * 10,
                    easing: "easeOutBounce"
                });
                eleB.delay(delayTime).animate({
                    "top": self.cubeSize.y + "px"
                }, {
                    duration: delayItem * 10,
                    easing: "easeOutBounce"
                }).will(function () {
                    $(this).css({
                        "top": "0",
                        "background-image": "url({0})".format(url)
                    })
                })
            })
        }, function (self, url) {
            var delayItem = self.opt.delay / self.opt.x;
            self.effectTemplate(function (eleA, eleB, x, y) {
                eleA.css({
                    "left": -self.cubeSize.x + "px",
                    "background-image": "url({0})".format(url)
                });
                var delayTime = x * delayItem;
                eleA.delay(delayTime).animate({
                    "left": "0"
                }, {
                    duration: delayItem * 2
                });
                eleB.delay(delayTime).animate({
                    "left": self.cubeSize.x + "px"
                }, {
                    duration: delayItem * 2
                }).will(function () {
                    $(this).css({
                        "left": "0",
                        "background-image": "url({0})".format(url)
                    })
                })
            })
        }, function (self, url) {
            var delayItem = self.opt.delay / (self.opt.x * self.opt.y);
            self.effectTemplate(function (eleA, eleB, x, y) {
                eleA.css({
                    "opacity": "0",
                    "background-image": "url({0})".format(url)
                });
                var delayTime = (x + (self.opt.x * y)) * delayItem;
                eleA.delay(delayTime).animate({
                    "opacity": "1"
                }, {
                    duration: delayItem * 4,
                });
                eleB.delay(delayTime).animate({
                    "opacity": "0"
                }, {
                    duration: delayItem * 4,
                }).will(function () {
                    $(this).css({
                        "opacity": "1",
                        "background-image": "url({0})".format(url)
                    })
                })
            })
        }, function (self, url) {
            var delayArr = [0];
            var delayItem = self.opt.delay / (self.opt.x * self.opt.y);
            for (var i = 1, len = self.opt.x * self.opt.y; i < len; i++) {
                delayArr[i] = delayArr[i - 1] + delayItem
            }
            delayArr.sort(function (a, b) {
                return Math.random() > 0.5 ? 1 : -1
            });
            self.effectTemplate(function (eleA, eleB, x, y) {
                var directionIndex = Math.floor(Math.random() * 4);
                var cssName = ["top", "left", "top", "left"][directionIndex];
                var cssValue = [-self.cubeSize.y, self.cubeSize.x, self.cubeSize.y, -self.cubeSize.x][directionIndex];
                var obj = {};
                obj[cssName] = cssValue + "px";
                obj["background-image"] = "url({0})".format(url);
                eleA.css(obj);
                var delayTime = delayArr[x + y * self.opt.x];
                obj = {};
                obj[cssName] = "0";
                eleA.delay(delayTime * 3 / 4).animate(obj, delayItem * 4);
                obj = {};
                obj[cssName] = -cssValue + "px";
                eleB.delay(delayTime * 3 / 4).animate(obj, delayItem * 4).will(function () {
                    obj = {};
                    obj[cssName] = "0";
                    obj["background-image"] = "url({0})".format(url);
                    $(this).css(obj)
                })
            })
        }],
        effectTemplate: function (callback) {
            for (var y = 0; y < this.opt.y; y++) {
                for (var x = 0; x < this.opt.x; x++) {
                    var eleBox = $("#{0}_{1}_{2}".format(this.opt.id, x, y));
                    var eleA = eleBox.children(".slider_inner_a");
                    var eleB = eleBox.children(".slider_inner_b");
                    callback(eleA, eleB, x, y)
                }
            }
        }
    };
    $.fn.slider = function (opt) {
        var defaults = {
            id: this.id,
            imgs: [],
            urls: [],
            x: 2,
            y: 2,
            scale: 4 / 3,
            delay: 800,
            interval: 5000,
            border: false
        };
        var settings = $.extend({}, defaults, opt);
        var slider = new Slider(settings);
        slider.init();
        $(this).data("slider", slider);
        slider.begin();
        return slider
    }
})(jQuery);
var slider = $("#imgBar").slider({
    id: "imgBar",
    // imgs:["http://images.cnitblog.com/blog/708426/201501/080209549216360.jpg", "http://images.cnitblog.com/blog/708426/201501/100557406251638.jpg", "http://images.cnitblog.com/blog/708426/201501/100602118284450.jpg"],
    // imgs:["http://study.com/images/01.jpg","http://study.com/images/02.jpg","http://study.com/images/03.jpg"],
    imgs:["./images/01.jpg","./images/02.jpg","./images/03.jpg"],
    scale: 128 / 36,
    border: true,
    delay: 2200,
    x: 10,
    y: 3
});