(
    function(window){
        var ele = [];
        function Food(){
            this.width = 20;
            this.height = 20;
            this.x = 0;
            this.y = 0;
            this.classname = "food";
            this.color = "";
            this.obj = null;
        }
        //食物小方块渲染方法
        Food.prototype.render = function (map){
            //每次执行渲染先移除旧的
            remove();
            this.obj = document.createElement("div");
            this.obj.style.width = this.width + "px";
            this.obj.style.height = this.height + "px";
            // this.obj.style.position = "absolute";
            this.x = Math.floor(Math.random() * map.offsetWidth/this.width) * this.width;
            this.y = Math.floor(Math.random() * map.offsetHeight/this.height) * this.height;
            this.obj.style.left = this.x + "px";
            this.obj.style.top = this.y + "px";
            this.obj.style.backgroundColor = this.color;
            this.obj.className = this.classname;
            map.appendChild(this.obj);
            ele.push(this.obj);
        }
        //私有方法，移除被吃掉的食物
        function remove(){
            for (var i = 0; i < ele.length; i++) {
                ele[i].parentNode.removeChild(ele[i]);
            }
            //清空ele数组
            ele = [];
        }
        window.Food = Food;

    }
)(window);