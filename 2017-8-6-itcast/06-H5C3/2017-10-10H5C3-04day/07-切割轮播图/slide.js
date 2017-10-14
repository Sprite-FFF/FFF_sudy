var lis = document.querySelectorAll('li');
var prev = document.querySelector('.prev');
var next = document.querySelector('.next');

// 记录点击次数
var count = 0;
// 找到最后一个li
var last_li = document.querySelector('li:last-child');
// 监听最后一个里的动画是否执行完毕
// 如果么有执行完 那么让点击无效
var flag = true;
last_li.addEventListener("webkitTransitionEnd",function(){
    console.log("111");
    flag = true;
});
prev.onclick = function () {
    console.log(flag);    
    if(!flag) return;
    flag = false;
    count++;
    for (var i = 0; i < lis.length; i++) {
        lis[i].style.transform = "rotateX("+ 90 * count+ "deg)";
    }
}

next.onclick = function(){
    if(!flag) return;
    flag = false;
    count--;
    for(var i=0;i<lis.length;i++){
        lis[i].style.transform = "rotateX("+ 90 * count +"deg)";
    }
}