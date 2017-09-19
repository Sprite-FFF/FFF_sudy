/**
 * Created by FFF on 2017/8/24.
 */
/**
 * 兼容封装getElementsByClassName方法
 * @param classname
 * @returns {*}
 */
function myGetElementsByClassName(classname) {
    if (document.getElementsByClassName) {
        return document.getElementsByClassName(classname);
    } else {
        var dom = document.getElementsByTagName("*");
        var elements = [];
        for (var i = 0; i < dom.length; i++) {
            var arr = dom[i].className.split(" ");
            for (var j = 0; j < arr.length; j++) {
                if (arr[j] == classname) {
                    elements.push(dom[i]);
                }
            }
        }
        return elements;
    }
}
/**
 * $选择器
 * @param str
 * @returns {*}
 */
function $(str) {
    var str1 = str.substr(0, 1);
    var str2 = str.substr(1);
    switch (str1) {
        case "#":
            return document.getElementById(str2);
            break;
        case ".":
            return myGetElementsByClassName(str2);
            break;
        default:
            return document.getElementsByTagName(str);
            break;
    }
}
/**
 * 兼容获取页面卷曲部分宽高
 * @returns {Number|number}
 */
function scrollTop() {
    return window.pageYOffset || document.documentElement.scrollTop;
}

function scrollLeft() {
    return window.pageXOffset || document.documentElement.scrollLeft;
}
/**
 *兼容获取页面可视区域宽高
 * @returns {Number|number}
 */
function clientWidth() {
    return window.innerWidth || document.documentElement.clientWidth;
}

function clientHeight() {
    return window.innerHeight || document.documentElement.clientHeight;
}
//兼容性获取样式属性值
function getStyle(ele, attr) {
    if (window.getComputedStyle && typeof(getComputedStyle) == "function") {
        return window.getComputedStyle(ele, null)[attr];
    } else {
        return ele.currentStyle[attr];
    }
}
/**
 * 兼容性获取鼠标在页面中的坐标
 * @param event
 * @returns {*}
 * @constructor
 */
function PageX(event) {
    return event.pageX || event.clientX + scrollLeft();
}
function PageY(event) {
    return event.pageY || event.clientY + scrollTop();
}
/**
 * 事件监听兼容性封装
 * @param ele
 * @param event
 * @param func
 */
function addEvent(ele, event, func) {
    if (ele.addEventListener && typeof (ele.addEventListener) == "function") {
        ele.addEventListener(event, func);
    } else if (ele.attachEvent) {
        ele.attachEvent("on" + event, func);
    } else {
        ele["on" + event] = func;
    }
}
/**
 * 兼容性事件解除绑定
 * @param ele
 * @param event
 * @param func
 */
function removeEvent(ele, event, func) {
    if (ele.removeEventListener && typeof(ele.removeEventListener) == "function") {
        ele.removeEventListener(event, func);
    } else if (ele.detachEvent) {
        ele.detachEvent("on" + event, func);
    } else {
        ele["on" + event] = null;

}
/**
 * 兼容取消事件传播
 * @param event
 */
function stopBubble(event) {
    if (event.stopPropagation && typeof (event.stopPropagation) == "function") {
        event.stopPropagation();
    } else {
        event.cancelBubble = "true";
    }
}