(
    function (window, Food, Snake) {
        function Game(map) {
            this.map = map;
            this.food = new Food();
            this.snake = new Snake();
            this.timer = null;
        }

        Game.prototype.start = function () {
            this.food.render(this.map);
            this.snake.render(this.map);
            go.call(this);
            keyBind.call(this);
        }

        function go() {
            this.timer = setInterval((
                function () {
                    this.snake.move(this.food, this.map);
                    var headX = this.snake.body[0].x * 20;
                    var headY = this.snake.body[0].y * 20;
                    var maxX = this.map.offsetWidth - 20;
                    var maxY = this.map.offsetHeight - 20;
                    if (headX < 0 || headX > maxX) {
                        clearInterval(this.timer);
                        alert("啊！撞死了");
                        return;
                    }
                    if (headY < 0 || headY > maxY) {
                        clearInterval(this.timer);
                        alert("啊！撞死了");
                        return;
                    }
                    this.snake.render(this.map);
                }
            ).bind(this), 200);
        }

        function keyBind() {
            document.onkeydown = (function (e) {
                e = e || event;
                switch (e.keyCode) {
                    case 37:
                        this.snake.direction = "left";
                        break;
                    case 38:
                        this.snake.direction = "up";
                        break;
                    case 39:
                        this.snake.direction = "right";
                        break;
                    case 40:
                        this.snake.direction = "down";
                        break;
                }
            }).bind(this);
        }
        window.Game = Game;
    }
)(window, Food, Snake);