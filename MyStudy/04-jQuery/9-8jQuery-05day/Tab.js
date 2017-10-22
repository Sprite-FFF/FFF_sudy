(function ($) {
    // 在全局放一个json
    var json = {};

    $.fn.extend({
        tab: function (options) {
            // 默认配置
            var defaultSettings = {
                "btnVal": ['按钮1', '按钮2', '按钮3'],
                "divCon": ["内容1", "内容2", "内容3"],
                "evtType": "click"
            }

            // 使用jQuery里提供好的$.extend()方法遍历对象属性

            $.extend(json,defaultSettings,options);

            create.call(this);
            eventFn.call(this);

            // 
        }
    });

    // 生成input标签和div标签
    function create(){
        // 根据json数据生成input
        for (var i = 0; i < json.btnVal.length; i++) {
            var btn = $("<input type='button' value='"+json.btnVal[i]+"' />");
            if(i===0){
                btn.addClass("active");
            }
            this.append(btn);
        }

        // 生成div
        for (var i = 0; i < json.divCon.length; i++) {
            var div = $("<div></div>");
            div.html(json.divCon[i]);
            if(i===0){
                div.show();
            }
            this.append(div);
        }
    }

    // 实现选项卡功能
    function eventFn(){
        var that = this;
        this.children("input").on(json.evtType,function(){
            $(this).addClass("active").siblings().removeClass("active");
            that.children("div").eq($(this).index()).show().siblings("div").hide();
        });
    }
})(jQuery);