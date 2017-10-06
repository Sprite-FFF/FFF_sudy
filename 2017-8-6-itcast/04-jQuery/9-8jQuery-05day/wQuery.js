function W(arg) {
    return new wQuery(arg);
}

function wQuery(arg) {

    this.ele = [];
    if (typeof arg === "function") {
        bind(window, "load", arg);
    } else if (typeof arg === "string") {
        switch (arg.charAt(0)) {
            case "#":
                this.ele.push(document.getElementById(arg.slice(1)));
                break;
            case ".":
                this.ele = getByClass(arg.slice(1));
                break;
            default:
                this.ele = document.getElementsByTagName(arg);
                break;
        }
    }
}

// DOM二级事件的兼容
function bind(obj, event, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(event, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent("on" + event, fn);
    } else {
        obj["on" + event] = fn;
    }
}

// 封装一个通过className获取元素的兼容性函数

function getByClass(myClass) {
    var all = document.getElementsByTagName("*");
    var eleArr = [];
    for (var i = 0; i < all.length; i++) {
        var arr = all[i].className.split(" ");
        for (var j = 0; j < arr.length; j++) {
            if (arr[j] === myClass) {
                eleArr.push(all[i]);
                break;
            }
        }

    }
    return eleArr;
}

// 兼容获取样式封装

function getStyle(ele, attr) {
    return getComputedStyle ? getComputedStyle(ele, attr) : currentStyle(ele, attr);
}

// 封装css方法

wQuery.prototype.css = function (attr, value) {
    // 传入一个参数时、就是json格式设置或者获取
    if (arguments.length === 1) {
        // 传入一个json格式数据代表设置
        if (typeof arguments[0] === "object") {
            for (var i = 0; i < this.ele.length; i++) {
                for (var key in attr) {
                    this.ele[i].style[key] = attr[key];
                }
            }
        } else {
            // 获取时、获取的是第一个元素的属性
            return this.ele[0].style[attr];
        }
    } else if (arguments.length === 2) {
        // 两个参数是代表设置
        for (var i = 0; i < this.ele.length; i++) {
            this.ele[i].style[attr] = value;
        }
    }
    // 实现链式操作
    return this;
}

// 封装html方法

wQuery.prototype.html = function(value){
    if(value){
        for (var i = 0; i < this.ele.length; i++) {
            this.ele[i].innerHTML = value;
        }
    }else{
        return this.ele[0].innerHTML;
    }
    return this;
}

// 封装click方法

wQuery.prototype.click = function(fn){
    for (var i = 0; i < this.ele.length; i++) {
        bind(this.ele[i],"click",fn);
    }
    return this;
}

// jQuery内部工具方法实现的原理
wQuery.extend = function(obj){
    for (var attr in obj) {
        wQuery[attr] = obj[attr];
    }
}

// jQuery内部插件实现的原理
W.fn = wQuery.prototype;

W.fn.extend = function(obj){
    for (var attr in obj) {
        wQuery.prototype[attr] = obj[attr];
    }
}