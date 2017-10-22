(
    function (window, Food) {
        //存蛇
        var ele = [];

        function Snake(width, height, direction) {
            this.width = width || 20;
            this.height = height || 20;
            this.direction = direction || "right";
            //初始化蛇的位置
            this.body = [{
                    "x": 3,
                    "y": 2,
                    "color": "red"
                },
                {
                    "x": 2,
                    "y": 2,
                    "color": "#00ffff"
                },
                {
                    "x": 1,
                    "y": 2,
                    "color": "#00ffff"
                }
            ];
        }

        Snake.prototype.render = function (map) {
                remove();
            for (var i = 0; i < this.body.length; i++) {
                var oDiv = document.createElement("div");
                oDiv.style.width = this.width + "px";
                oDiv.style.height = this.height + "px";
                oDiv.style.position = "absolute";
                oDiv.style.left = this.body[i].x * this.width + "px";
                oDiv.style.top = this.body[i].y * this.height + "px";
                oDiv.style.backgroundColor = this.body[i].color;
                map.appendChild(oDiv);
                ele.push(oDiv);
            }
            
        }
        //私有的方法 用来删除原来的蛇
        function remove(){
            for (var i = 0; i < ele.length; i++) {
                ele[i].parentNode.removeChild(ele[i]);
            }
            ele = [];   
        }
        //蛇移动方法
        Snake.prototype.move = function (food,map) {
            // console.log(this.body.length)
            for (var i = this.body.length - 1; i > 0; i--) {
                this.body[i].x = this.body[i - 1].x;
                this.body[i].y = this.body[i - 1].y;
            }
            //头往哪走取决于方向
            switch (this.direction) {
                case "left":
                    this.body[0].x -= 1;
                    break;
                case "right":
                    this.body[0].x += 1;
                    break;
                case "up":
                    this.body[0].y -= 1;
                    break;
                case "down":
                    this.body[0].y += 1;
                    break;
            }
            // console.log(this.body);
            //检测是否已经吃到食物，如果吃到，则蛇加一节身体，map上食物删除，重新生成新的食物
            var headX = this.body[0].x * this.width;
            var headY = this.body[0].y * this.height;
            if(headX == food.x && headY == food.y){
                var last = this.body[this.body.length-1];
                // this.body.push(last);   // ???为什么不可以？
                // console.log( this.body)
                // console.log(last)
                this.body.push({
                    "x":last.x,
                    "y":last.y,
                    "color":last.color
                });  
                food.render(map);
            }
            
        }
        window.Snake = Snake;
    }
)(window, Food);