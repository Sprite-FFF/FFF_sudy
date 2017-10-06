(function (window) {
    function Drag(id) {
        this.ele = document.getElementById(id);
        this.X = 0;
        this.Y = 0;
    }

    Drag.prototype.init = function () {
        var that = this;
        this.ele.onmousedown = function (event) {
           
            event = event || window.event;
            that.X = event.clientX - that.ele.offsetLeft;
            that.Y = event.clientY - that.ele.offsetTop;
            document.onmousemove = function(event) {
                event = event || window.event;
                that.move(event);
            }
            document.onmouseup = that.removeEvent;
        }
    }
    Drag.prototype.move = function(event){
        this.ele.style.left = event.clientX - this.X + "px";
        this.ele.style.top = event.clientY - this.Y + "px";
    }
    Drag.prototype.removeEvent = function(){
        document.onmousemove = document.onmouseup = null;
    }
    
    window.Drag = Drag;

})(window);