// MIT license
// By @nodws with github.com/greensock/GreenSock-JS, see more examples at greensock.com/examples-showcases
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] ||
            window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
                timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());


(function() {

    var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

    // Main

    if (is_touch_device()) {
        // console.log('effect close');

    } else {
        //console.log('effect fire');
        initHeader();
        initAnimation();
        addListeners();
    }

    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;
        target = { x: width / 2, y: height / 2 };

        largeHeader = document.getElementById('bgEffects');

        largeHeader.style.height = height + 'px';

        canvas = document.getElementById('Draw_effects');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');



        // create points
        points = [];
        var puntitos = 20;
        for (var x = 0; x < width; x = x + width / puntitos) {
            for (var y = 0; y < height; y = y + height / puntitos) {
                var px = x + Math.random() * width / puntitos;
                var py = y + Math.random() * height / puntitos;
                var p = { x: px, originX: px, y: py, originY: py };
                points.push(p);
            }
        }

        // for each point find the 5 closest points
        for (var i = 0; i < points.length; i++) {
            var closest = [];
            var p1 = points[i];
            for (var j = 0; j < points.length; j++) {
                var p2 = points[j]
                if (!(p1 == p2)) {
                    var placed = false;
                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }

                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }

        // assign a circle to each point
        for (var i in points) {
            var c = new Circle(points[i], 2 + Math.random() * 2, 'rgba(200,200,255,255)');
            points[i].circle = c;
        }
    }

    // Event handling
    function addListeners() {
        if (!('ontouchstart' in window)) {
            window.addEventListener('mousemove', mouseMove);
        }
        //window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    function mouseMove(e) {
        var posx = posy = 0;
        if (e.pageX || e.pageY) {
            posx = e.clientX;
            posy = e.clientY;

        } else if (e.clientX || e.clientY) {
            //posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            //posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
            posx = e.clientX;
            posy = e.clientY;

        }
        target.x = posx;
        target.y = posy;
    }

    function scrollCheck() {
        if (document.body.scrollTop > height) animateHeader = false;
        else animateHeader = true;
    }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        largeHeader.style.height = height + 'px';
        canvas.width = width;
        canvas.height = height;
    }

    // animation
    function initAnimation() {
        animate();
        for (var i in points) {
            shiftPoint(points[i]);
        }
    }

    function animate() {
        if (animateHeader) {

            ctx.clearRect(0, 0, width, height);
            for (var i in points) {
                // detect points in range
                if (Math.abs(getDistance(target, points[i])) < 4000) {
                    points[i].active = 0.3;
                    points[i].circle.active = 0.6;
                } else if (Math.abs(getDistance(target, points[i])) < 20000) {
                    points[i].active = 0.1;
                    points[i].circle.active = 0.3;
                } else if (Math.abs(getDistance(target, points[i])) < 40000) {
                    points[i].active = 0.02;
                    points[i].circle.active = 0.1;
                } else {
                    points[i].active = 0;
                    points[i].circle.active = 0;
                }

                drawLines(points[i]);
                points[i].circle.draw();
            }
        }
        requestAnimationFrame(animate);
    }

    function shiftPoint(p) {
        TweenLite.to(p, 1 + 1 * Math.random(), {
            x: p.originX - 50 + Math.random() * 50,
            y: p.originY - 50 + Math.random() * 50,
            ease: Circ.easeInOut,
            onComplete: function() {
                shiftPoint(p);
            }
        });
    }

    // Canvas manipulation
    function drawLines(p) {
        if (!p.active) return;
        for (var i in p.closest) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.closest[i].x, p.closest[i].y);
            ctx.strokeStyle = 'rgba(95,205,255,' + p.active + ')';
            ctx.stroke();
        }
    }

    function Circle(pos, rad, color) {
        var _this = this;

        // constructor
        (function() {
            _this.pos = pos || null;
            _this.radius = rad || null;
            _this.color = color || null;
        })();

        this.draw = function() {
            if (!_this.active) return;

            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(95,205,255,' + _this.active + ')';
            ctx.fill();
        };
    }

    // Util
    function getDistance(p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }

})();



(function($, window, document) {
    // for(var i=0;i<10;i++){
    //     var person = new Person('Bob'+i);
    //     person.greeting();
    // }


})(jQuery, window, document);

//
function DnaIndex(wholeDegree, newX, newY, scale) {
    var requestAnimationFrame2 = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    window.requestAnimationFrame = requestAnimationFrame;
    var canvas = document.getElementById('Draw_effects');
    var Width = window.innerWidth;
    var Height = window.innerHeight;
    //canvas = document.getElementById('Draw_effects');
    canvas.width = Width;
    canvas.height = Height;
    var ctx = canvas.getContext("2d");
    var targets = [];
    var R = 30;
    var ii = 6;
    var r = R / ii / 4 * 3;
    var deg = Math.PI / (ii * 1.5);
    var rotate_speed = deg / 40;
    var distance = r * 4;
    var lineWidth = 1;
    var num = 16;
    var offsetX = R * 2;
    var offsetY = 20;
    var color = "rgba(27,165,234,0.2)";
    var _wholeDegree = wholeDegree;
    var rad = _wholeDegree * (Math.PI / 180);
    for (var i = 0; i < num; i++) {
        targets.push(deg * i);
        targets.push(i * distance);
    }
    var transformPos = function(deg) {
        var x = Math.sin(deg) * R;
        // var y = Math.cos(deg) * r +r;
        return { x: x }
    }
    var draw = function() {


        //console.log(_wholeDegree);

        ctx.beginPath();
        ctx.lineWidth = lineWidth;
        ctx.strokeStyle = color;
        ctx.fillStyle = color;


        for (var i = 0; i < targets.length; i += 2) {

            var pos = transformPos(targets[i]);
            var y = offsetY + targets[i + 1];


            // / console.log(posx2New);


            ctx.save();
            ctx.translate(newX, newY);
            ctx.scale(scale, scale)
            ctx.rotate(rad);
            ctx.moveTo(pos.x + offsetX, y);
            ctx.lineTo(-pos.x + offsetX, y);
            ctx.moveTo(pos.x + offsetX, y);
            ctx.arc(pos.x + offsetX, y, r, 0, Math.PI * 2);
            ctx.moveTo(-pos.x + offsetX, y)
            ctx.arc(-pos.x + offsetX, y, r, 0, Math.PI * 2);
            if (is_touch_device()) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }

            ctx.restore();



        }


        ctx.stroke();
        ctx.fill();
        ctx.closePath();





    }
    var cleanUp = function() {

        requestAnimationFrame(cleanUp);
    }

    var update = function() {
        for (var i = 0; i < targets.length; i += 2) {

            targets[i] += rotate_speed;
            if (targets[i] >= Math.PI) { targets[i] -= Math.PI; }
        }

    }



    // PC Mobile 無分開
    // var Animat = function() {
    //     draw();
    //     update();
    //     requestAnimationFrame(Animat);
    //     //setTimeout(Animat,1000/60);
    //     // console.log('draw');
    // }
    // this.active = function() {
    //     Animat();
    //     //cleanUp();
    // }



    // PC Mobile 分開
    var aniFrame = 20; // 幾幀跑一次
	var times = aniFrame;
	var isMobile = is_touch_device();
	var drawAni = function(){
		draw();
		update();
	}
	var Animat = function() {
		drawAni();
		requestAnimationFrame(Animat);
		//setTimeout(Animat,1000/60);
        // console.log('draw');
	}
	var Animat_mobile = function() {
		// Mobile
		if(times == aniFrame){
			drawAni();
		}else if(times == 0){
			times = aniFrame + 1;
		}
		times--
		requestAnimationFrame(Animat_mobile);
	}

	this.active = function() {
		if(isMobile){
			Animat_mobile();
		}else{
			Animat();
		}
		//cleanUp();
	}



};

$(window).on('load', function() {
    // /var Dna = new DnaIndex();
    // console.log(Math.random() * $(window).width());
    for (var i = 0; i < 6; i++) {
        var ratote = Math.random() * 360;
        var posX = (Math.random() * window.innerWidth).toFixed(2);
        var posY = (Math.random() * window.innerHeight).toFixed(2);
        var scale = Math.random() * 0.4 + 0.2;
        var dna = new DnaIndex(ratote, posX, posY, scale);
        //console.log(posX,posY,scale);
        dna.active();
        // console.log(window.innerWidth);
        // console.log(window.innerHeight);
        // console.log(scale);

    }
});