$(function () {
    var wHeight = $(window).height();
    var flag = false;
    var flag_buy = false;
    var flag_delievry = false;
    $("#fullpage").fullpage({
        // 设置每一屏背景色
        sectionsColor: ['#fadd67', '#84a2d4', '#ef674d', '#ffeedd', '#d04759', '#84d9ed', '#4fdded', '#fff'],
        // 设置圆点导航
        navigation: true,
        // 滚动的时间 默认是 700ms
        // 设置滚动时间
        scrollingSpeed: 1500,
        // 滚动到某一屏后的回调函数、接收anchorLink 和 index 两个参数、
        // anchorLink锚链接名称、index是序号、从一开始计算
        afterLoad: function (anchorLink, index) {
            // 第二屏动画
            if (index == 2 && flag == false) {
                $(".qbh-list .qbh-list-search").show().animate({
                    "right": 384
                }, 1000, function () {
                    $(".qbh-list-search-font").fadeTo(500, 1, function () {
                        $(".qbh-list .qbh-list-search").hide();
                        $(".qbh-list .qbh-list-search-finish").show().animate({
                            "left": "70%",
                            "bottom": 448,
                            "height": 30
                        }, 1000,function(){
                            flag = true;
                        });
                        $(".qbh-list .qbh-list-wordb").fadeTo(300, 1);
                        $(".qbh-list .qbh-list-sofas").show().animate({
                            "height": 218
                        }, 1000,function(){
                            $(".down").fadeIn();
                        });
                    });
                });
            }
            // 第五屏动画
            if(index == 5){
                $(".qbh-payment .qbh-payment-hands").show().animate({
                    "bottom":0
                },1000,function(){
                    $(".qbh-payment .qbh-payment-mouse-end").fadeTo(400,1,function(){
                        $(".qbh-payment .qbh-payment-sofa-start").show().animate({
                            "bottom":200
                        },1000,function(){
                            $(".qbh-payment .qbh-payment-sofa-end").animate({
                                "bottom":70
                            },800);
                            $(".qbh-payment .qbh-payment-bill").animate({
                                "bottom":400
                            },800,function(){
                                $(".down").fadeIn();
                            });
                        });
                    });
                });
            }
            // 第七屏动画 
            if(index == 7){
                $(".qbh-appraise .qbh-appraise-stars").animate({
                    "width":100
                },1000,function(){
                    $(".qbh-appraise .qbh-appraise-haoping").animate({
                        "margin-left": -289                        
                    },1000).animate({
                        "width":72
                    },600,function(){
                        $(".down").fadeIn();
                    });
                });
            }
            // 第八屏动画
            if(index == 8){
                $(document).on("mousemove",function(event){
                    var x = event.pageX - 60;
                    var y = event.pageY + 10;
                    $(".qbh-shopping .qbh-shopping-hands").css({
                        "top":y,
                        "left":x
                    });
                });
                $(".qbh-shopping-link").on("mouseenter",function(){
                    $(".qbh-shopping .qhb-shopping-dong").show();
                });
                $(".qbh-shopping-link").on("mouseleave",function(){
                    $(".qbh-shopping .qhb-shopping-dong").hide();
                });
            }
        },
        // 滚动前的回调函数、接收 index 、nextIndex 和 direction三个参数 index是当前离开
        // 页面的序号、nextIndex是即将到达的页面的序号、从1开始计算
        // direction是判断向上滚动还是向下滚动、值是down或者up
        onLeave: function (index, nextIndex, direction) {
            // 离开某一屏时隐藏继续往下
            // 每个屏动画执行完毕后、再显示
            $(".down").fadeOut();
            // 第二屏到第三屏动画
            if (index == 2 && nextIndex == 3) {
                $(".qbh-list .qbh-list-sofa-pic").animate({
                    "opacity": 1,
                    "bottom": -wHeight + 250,
                    "width": 204,
                    "right": 524
                }, 1000, function () {
                    $(".qbh-buy-main .qbh-buy-choose-end").fadeTo(600, 1, function () {
                        $(".qbh-buy-main .qbh-buy-add-cart-end").fadeTo(600, 1,function(){
                            $(".down").fadeIn();
                        });
                    });
                });
            }
            // 第三屏到第四屏动画
            if (index == 3 && nextIndex == 4 && flag_buy == false) {
                $(".qbh-buy .qbh-buy-rotate-sofa").fadeTo(200, 1).animate({
                    "bottom": -((wHeight - 250) + 50),
                    "right": 190
                }, 1000, function () {
                    $(".qbh-buy .qbh-buy-rotate-sofa").hide();
                    flag_buy = true;
                    $(".qbh-info-cart-box .qbh-info-rotate-sofa").show();
                    $(".qbh-info-cart-box").animate({
                        "left": 2000
                    }, 1500, function () {
                        $(".qbh-info .qbh-info-address-box").fadeIn(600, function () {
                            $(".qbh-info-address").fadeTo(600, 1,function(){
                                $(".down").fadeIn();
                            });
                            $(".qbh-info .qbh-info-wordb").fadeTo(400, 1);
                        });
                    });
                });
            }
            // 第五屏到第六屏动画
            if(index == 5 && nextIndex == 6 && flag_delievry == false){
                $(".qbh-payment .qbh-payment-sofa-continues").show().animate({
                    "bottom":-270,
                    "width": 80
                },1000,function(){
                    $(".qbh-payment .qbh-payment-sofa-continues").hide();
                });
                $(".qbh-delivery .qbh-delivery-box").show().animate({
                    "bottom": 376,
                    "left": "23%"
                },1000).animate({
                    "bottom": 30,
                    "left": "50%",
                    "width": 80,
                },1000,function(){
                    $(".qbh-delivery .qbh-delivery-box").hide();
                    $(".qbh-delivery .qbh-delivery-shangjia").fadeTo(10,1).delay(1000).fadeTo(400,0,function(){
                        $(".qbh-delivery .qbh-delivery-truck-font").fadeTo(10,1);
                        flag_delievry = true;
                    });
                    $(".qbh-delivery").animate({
                        "backgroundPositionX":"100%"
                    },3000,function(){
                        $(".qbh-delivery .qbh-delivery-deliveryman").show().animate({
                            "bottom": 116,
                            "right": 800,
                            "width": 252,
                        },1000).animate({
                            "right":580
                        },1000,function(){
                            $(".qbh-delivery .qbh-delivery-font-end").fadeTo(400,1);
                            $(".qbh-delivery .qbh-delivery-door").show();
                            $(".qbh-delivery .qbh-delivery-buyer").animate({
                                "width":87
                            },function (){
                                $(".qbh-delivery .qbh-delivery-shouhuo").fadeIn(600,function(){
                                    $(".down").fadeIn();
                                });
                            });
                        });
                    });
                });
            }
        }

    });
});