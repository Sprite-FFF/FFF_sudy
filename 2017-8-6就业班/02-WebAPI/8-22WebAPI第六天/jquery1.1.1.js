/**
 * Created by FFF on 2017/8/22.
 */

function changeBgColor() {
    if (clientWidth()<680) {
        document.body.bgColor = "#00ffff";
    } else if(clientWidth()>=680 && clientWidth()<=960) {
        document.body.bgColor = "#ff0000";
    }else{
        document.body.bgColor = "#00ff00";
    }
}

function clientWidth() {
    return window.innerWidth || document.documentElement.clientWidth;
}
function clientHeight() {
    return window.innerHeight || document.documentElement.clientWidth;
}