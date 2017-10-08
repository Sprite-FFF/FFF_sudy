// 如果使用普通方式传递参数
// 不方便设置默认参数
// 严格按照参数的顺序取数据、不灵活
var $ = {
    // 使用对象来传递参数
    ajax: function (obj) {
        var url = obj.url || location.pathname;
        var type = obj.type || "get";
        var data = obj.data || {};
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