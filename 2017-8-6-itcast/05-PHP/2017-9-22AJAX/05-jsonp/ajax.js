// 如果使用普通方式传递参数
// 不方便设置默认参数
// 严格按照参数的顺序取数据、不灵活
var $ = {
    // 使用对象来传递参数
    ajax: function (obj) {
        var url = obj.url || location.pathname;
        var type = obj.type || "get";
        var data = obj.data || {};
        var dataType = obj.dataType;
        // 回调函数 接收到服务端数据后需要做的操作
        var success = obj.success || function(){};
        // 处理数据
        // 将传过来的对象格式数据
        // 转换为?name=xxx&age=xxx格式的字符串
        function params(args){
            var str = "";
            for(var key in args){
                str += key+"="+args[key] +"&";
            }
            return str.slice(0,-1);
        };
        data = params(data);
        // 封装JSONP
        if(dataType == 'jsonp'){
            var head = document.querySelector("head");
            var script = document.createElement("script");
            // 要通过get传入到后台的回调函数名
            var callback_name = "jQuery"+new Date().getTime();
            // 拼接src
            script.src = url + "?callback="+callback_name;
            // ???我如何真正的拿到跨域后、后台通过参数传过来的数据去操作
            window[callback_name] = function(info){
                // console.log(info);
                // return info;

                success(info);
            }
            head.appendChild(script);
            // 加载完毕移除标签
            script.onload = function(){
                // script加载完毕   执行success回调函数
                // 将后台传过来的temp作为参数
                // 就可以操作了
                // success(temp);
                head.removeChild(script);
            }
            // 后面的代码不要再执行直接return
            return;
        }


        var xhr = new XMLHttpRequest();
        // 如果为get请求
        // 使用url传参
        if(type == 'get'){
            url = url + '?' +data;
            data = null;
        }
        xhr.open(type,url);
        // 如果为post请求
        // 则设置请求头
        if(type == 'post'){
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        }
        // send发送数据
        xhr.send(data);

        xhr.addEventListener("readystatechange",function(){
            if(this.readyState==4&&this.status==200){
                // 回调函数处理服务端返回数据
                success(JSON.parse(this.responseText));
            }
        });
        
    }
};