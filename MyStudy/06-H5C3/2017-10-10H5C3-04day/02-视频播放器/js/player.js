// 获取元素
let video = document.querySelector("video");
var play = document.getElementById("play_btn");
var play_icon = document.querySelector("#play_btn i");
var total = document.querySelector('.total-time');
var current = document.querySelector('.current-time');
var process_inner = document.querySelector('.process-inner');
var process = document.querySelector('.process');
var fullScreen = document.querySelector('.fullscreen');
var fullScreen_icon = document.querySelector('.fullscreen i');
// 点击切换播放暂停
play.addEventListener("click", function () {
    play_icon.classList.toggle("fa-pause-circle");
    // 判断视频的播放状态 获取在暂停状态的属性 paused
    if (video.paused) {
        // 在暂停状态时调用播放方法
        video.play();
    } else {
        // 在播放状态则调用暂停方法
        video.pause();
    }
});

// 视频总时长显示
// oncanplay 事件 当视频是可以播放的状态时触发的事件

video.addEventListener("canplay", function () {
    // 获取总时长属性 duration 单位是秒
    var time = video.duration;
    // 将时长格式化为时分秒格式
    h = Math.floor(time / 3600);
    h = h < 10 ? "0" + h : h;
    m = Math.floor(time / 60 % 60);
    m = m < 10 ? "0" + m : m;
    s = Math.floor(time % 60);
    s = s < 10 ? "0" + s : s;
    total.innerHTML = h + ":" + m + ":" + s;
});

// 视频已经播放时长显示
// 随视频播放进度不停触发的事件 ontimeupdate
// 获取当前播放时长 currentTime 属性 
video.addEventListener("timeupdate", function () {
    var time = this.currentTime;
    h = Math.floor(time / 3600);
    h = h < 10 ? "0" + h : h;
    m = Math.floor(time / 60 % 60);
    m = m < 10 ? "0" + m : m;
    s = Math.floor(time % 60);
    s = s < 10 ? "0" + s : s;
    current.innerHTML = h + ":" + m + ":" + s;

    // 播放进度条的显示

    process_inner.style.width = this.currentTime / this.duration * 100 + "%";
});

// 跳跃播放
process.addEventListener("click", function (event) {
    // 获取鼠标在盒子中的横坐标
    var x = event.offsetX;
    var pWidth = this.offsetWidth;
    // 当前播放进度 = 鼠标距离盒子左侧的距离 / 盒子总宽度 * 总时长
    video.currentTime = x / pWidth * video.duration;
});

// 全屏播放
// 判断是否在全屏状态
// video.webkitFullScreenElement
// 进入全屏方法
// video.webkitRequestFullScreen();
// 退出全屏方法
// video.webkitExitFullScreen();
fullScreen.addEventListener("click",function(){
    // video.webkitRequestFullscreen();
    // fullScreen_icon.classList.toggle("");
    video.webkitEnterFullScreen();
    video.webkitExitFullScreen();
});

