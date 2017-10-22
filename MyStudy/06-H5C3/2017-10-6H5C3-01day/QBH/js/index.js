$(function () {
    var wHeight = $(window).height();
    $("#fullpage").fullpage({
        sectionsColor: ['#fadd67', '#84a2d4', '#ef674d', '#ffeedd', '#d04759', '#84d9ed', '#4fdded', '#fff'],
        navigation: true,
        // 滚动到某一屏后的回调函数、接收anchorLink 和 index 两个参数、
        // anchorLink锚链接名称、index是序号、从一开始计算
        afterLoad: function (anchorLink, index) {
            // 第二屏动画
            if (index == 2) {
                $(".qbh-list .qbh-list-search").show().animate({
                    "right": 384
                }, 1000, function () {
                    $(".qbh-list-search-font").fadeTo(500, 1, function () {
                        $(".qbh-list .qbh-list-search").hide();
                        $(".qbh-list .qbh-list-search-finish").show().animate({
                            "left": "70%",
                            "bottom": 448,
                            "height": 30
                        }, 1000);
                        $(".qbh-list .qbh-list-wordb").fadeTo(300, 1);
                        $(".qbh-list .qbh-list-sofas").show().animate({
                            "height": 218
                        }, 1000);
                    });
                });
            }
        },
        // 滚动前的回调函数、接收 index 、nextIndex 和 direction三个参数 index是当前离开
        // 页面的序号、nextIndex是即将到达的页面的序号、从1开始计算
        // direction是判断向上滚动还是向下滚动、值是down或者up
        onLeave: function (index, nextIndex, direction) {
            // 第二屏到第三屏动画
            if (index == 2 && nextIndex == 3) {
                $(".qbh-list .qbh-list-sofa-pic").animate({
                    "opacity": 1,
                    "bottom": -wHeight + 250,
                    "width": 204,
                    "right": 524
                }, 1000, function () {
                    $(".qbh-buy-main .qbh-buy-choose-end").fadeTo(600, 1, function () {
                        $(".qbh-buy-main .qbh-buy-add-cart-end").fadeTo(600, 1);
                    });
                });
            }
            // 第三屏到第四屏动画
            if (index == 3 && nextIndex == 4) {
                $(".qbh-buy .qbh-buy-rotate-sofa").fadeTo(200, 1).animate({
                    "bottom": -((wHeight - 250) + 50),
                    "right": 190
                }, 1000, function () {
                    $(".qbh-buy .qbh-buy-rotate-sofa").hide();
                    $(".qbh-info-cart-box .qbh-info-rotate-sofa").show();
                    $(".qbh-info-cart-box").animate({
                        "left": 1500
                    }, 1500, function () {
                        $(".qbh-info .qbh-info-address-box").fadeIn(600, function () {
                            $(".qbh-info-address").fadeTo(600, 1);
                            $(".qbh-info .qbh-info-wordb").fadeTo(400, 1);
                        });
                    });
                });
            }
        }

    });
});