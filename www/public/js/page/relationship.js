    // global var 
    var $scrollMagic
    var theCanvas
    var ctx
    theCanvas = document.getElementById('ballContainer');
    ctx = theCanvas.getContext("2d");
    ctx.fillStyle = "#ffffff";
    var drawdotApp

    //browser on start-//////////////////////
    (function($, window, document) {

        //easescroll的設定   參考https://github.com/ivmello/easeScroll
        smoothScroll();

    })(jQuery, window, document);


    //browser on loaded-/////////////////////

    $(window).load(function() {

        //讀取完畢後第一cut的行為
        onLoaded();
        //scrollMagic套件 參考http://scrollmagic.io/
        $($canvas).attr("width", windowW);
        $($canvas).attr("height", windowH / 2);

        $(theCanvas).attr("width", windowW);
        $(theCanvas).attr("height", $('#FeelingStory').height());



    });

    //other function-////////////////////////
    function onLoaded() {

        $firstBannerPic = $('section#Main picture');
        $firstBannerPic.addClass('in');
        $firstBannerText = $('section#Main .textBox');
        $firstBannerText.addClass('in');



        //console.log('haha')
    }

    //scrollMagic套件 參考http://scrollmagic.io/
    function scrollMagicStart() {
        var firstCutBack = 0

        $scrollMagic = new ScrollMagic.Controller({});
        if ($(window).width() <= 500) {

        } else {

        }
        //產品Banner---------------------------------
        var scene = new ScrollMagic.Scene({
            triggerElement: 'section#Main',
            duration: 10,
            offset: $windowHeight * 0.5
        }).on('enter', function(event) {
            $('section#Main picture').removeClass('leave');
            if (firstCutBack > 0) {
                $('section#Main picture').addClass('back');
            }
        }).on("leave", function(event) {
            $('section#Main picture').addClass('leave');
            $('section#Main picture').removeClass('back');
            firstCutBack = 1

        }).addTo($scrollMagic);

        //幾何世界---------------------------------    
        var scene = new ScrollMagic.Scene({
            triggerElement: 'section#Geometric',
            duration: 10,
            offset: $windowHeight * -0.2
        }).on('enter', function(event) {
            $('.svgContainerA').addClass('active');
            $('.svgContainerB').addClass('active');
            //canvasApp(); //複製第二cut svg


        }).on("leave", function(event) {
            //$('.svgContainerA').removeClass('active');
            //$('.Geometric .textBox').removeClass('active');

        }).addTo($scrollMagic);

        var scenrGeo_2 = new ScrollMagic.Scene({
            triggerElement: 'section#Geometric',
            duration: $windowHeight,
            offset: $windowHeight * 0.3
        }).on('enter', function(event) {
            $('#Geometric .textBox').addClass('active');

        }).on('leave', function(event) {



        }).addTo($scrollMagic);
        if ($mobile) {

        } else {

            var scenrGeo_3 = new ScrollMagic.Scene({
                    triggerElement: 'section#Geometric',
                    duration: 800,
                    offset: $windowHeight * 0.5
                })
                .setPin("section#Geometric")
                .addTo($scrollMagic)


        }



        //幾何與人---------------------------------
        var hexagon1 = $('.hexagonContainer .hexagon1');
        var hexagon2 = $('.hexagonContainer .hexagon2');
        var hexagon3 = $('.hexagonContainer .hexagon3');
        var hexagon4 = $('.hexagonContainer .hexagon4');
        var hexagon5 = $('.hexagonContainer .hexagon5');
        var hexagon6 = $('.hexagonContainer .hexagon6');
        TweenMax.to(hexagon1, 0, { y: '50%' });
        TweenMax.to(hexagon2, 0, { y: '40%' });
        TweenMax.to(hexagon3, 0, { y: '60%' });
        TweenMax.to(hexagon4, 0, { y: '35%' });
        TweenMax.to(hexagon5, 0, { y: '45%' });
        TweenMax.to(hexagon6, 0, { y: '55%' });
        var handCakeArray = [];
        for (var i = 0; i < 5; i++) {
            handCakeArray.push($('.girlContainer .cake').eq(i));
            //handCakeArray[i].push($('.girlContainer .cake').eq(i).attr('class').split(' ')[0]);
        }

        if ($mobile) {

        } else {
            TweenMax.to(handCakeArray[0], 0, { x: '-100%' });
            TweenMax.to(handCakeArray[1], 0, { x: '-100%' });
            TweenMax.to(handCakeArray[2], 0, { x: '100%' });
            TweenMax.to(handCakeArray[3], 0, { x: '100%' });
            TweenMax.to(handCakeArray[4], 0, { y: '-100%' });


        }
        TweenMax.to($('.picOuter1'), 0, { y: '14%' });
        TweenMax.to($('.picOuter2'), 0, { y: '5%' });
        var scenr = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                offset: 0
            })
            .on('enter', function(event) {
                $('.openDoor .left').addClass('active');
                $('.openDoor .right').addClass('active');
                $('.People .content').addClass('active');
                $('.hexagon_intro .hexagon').addClass('active');
            })
            .addTo($scrollMagic)
        if ($mobile) {
            var scenr = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 1500,
                    offset: $windowHeight * 0.5
                })
                .setPin("section#People")
                .addTo($scrollMagic)


        } else {
            var scenr = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 3500,
                    offset: $windowHeight * 0.5
                })
                .setPin("section#People")
                .addTo($scrollMagic)


        }



        if ($mobile) {

        } else {
            var scenr = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2000,
                    offset: $windowHeight * 0.5
                })
                .setPin("section#FeelingStory")
                .addTo($scrollMagic)

        }




        if ($mobile) {
            $('.bgColor .pic').addClass('mobile');


        } else {
            var scenr = new ScrollMagic.Scene({
                    triggerElement: 'section#relationSweeter',
                    duration: 1000,
                    offset: $windowHeight * 0.5
                })
                .setPin("section#relationSweeter")
                .addTo($scrollMagic)

            $('.bgColor .pic').removeClass('mobile');


        }

        if ($mobile) {
            var scenrL = new ScrollMagic.Scene({

                triggerElement: 'section#People',
                offset: $windowHeight * 0.8
            }).on('enter', function(event) {
                //console.log('section#People');

                $('.openDoor .left').addClass('OpenMobile');
                $('.openDoor .right').addClass('OpenMobile');
                $('.hexagon_intro .hexagon').removeClass('active');
            }).on('leave', function(event) {
                $('.openDoor .left').removeClass('OpenMobile');
                $('.openDoor .right').removeClass('OpenMobile');
                $('.hexagon_intro .hexagon').addClass('active');


            }).addTo($scrollMagic)


        } else {
            var scenrL = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                duration: 1500,

                offset: $windowHeight
            }).setTween('.openDoor .left', 1, { x: "-100%", ease: Power0.easeOut, delay: 0 }).addTo($scrollMagic)

            var scenrR = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                duration: 1500,
                offset: $windowHeight
            }).setTween('.openDoor .right', 1, { x: "100%", ease: Power0.easeOut, delay: 0 }).addTo($scrollMagic)


        }

        if ($mobile) {

        } else {
            var scenrC1 = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                duration: 1200,
                offset: $windowHeight *1.3
            }).setTween(handCakeArray[0], 1, {
                x: "0%", 
                ease: Power2.easeOut,
                delay: 1.2,
                onComplete: function() {
                    $('.hexagon_intro .hexagon').removeClass('active');
                }
            }).addTo($scrollMagic)

            var scenrC2 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 1200,
                    offset: $windowHeight * 2
                }).setTween(handCakeArray[1], 1, { x: "0%", ease: Power2.easeOut,delay:0.5 })
                .addTo($scrollMagic)

            var scenrC3 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 1200,
                    offset: $windowHeight * 2.4
                }).setTween(handCakeArray[2], 1, { x: "0%", ease: Power2.easeOut,delay:1 })
                .addTo($scrollMagic)

            var scenrC4 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 1200,
                    offset: $windowHeight * 2.8
                }).setTween(handCakeArray[3], 1, { x: "0%", ease: Power2.easeOut,delay:1.1  })
                .addTo($scrollMagic)


            var scenrC5 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 1000,
                    offset: $windowHeight * 3
                }).setTween(handCakeArray[4], 1, { y: "0%", ease: Power2.easeOut,delay:1.3 })
                .addTo($scrollMagic)

        }


        if ($mobile) {


        } else {
            var scenrH1 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2
                }).setTween(hexagon1, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)

            var scenrH2 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2
                }).setTween(hexagon2, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)

            var scenrH3 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2
                }).setTween(hexagon3, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)

            var scenrH4 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2

                }).setTween(hexagon4, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)

            var scenrH5 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2
                }).setTween(hexagon5, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)

            var scenrH6 = new ScrollMagic.Scene({
                    triggerElement: 'section#People',
                    duration: 2500,

                    offset: $windowHeight * 1.2
                }).setTween(hexagon6, 1, { y: "0%", ease: Power2.easeOut })
                .addTo($scrollMagic)




        }

        if ($mobile) {
            var scenr2 = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                offset: $windowHeight * 1.1
            }).on('enter', function(event) {
                $('.girlContainer').addClass('active');
            }).on('leave', function(event) {
                $('.girlContainer').removeClass('active');


            }).addTo($scrollMagic)


        } else {
            var scenr2 = new ScrollMagic.Scene({
                triggerElement: 'section#People',
                offset: $windowHeight * 1.4
            }).on('enter', function(event) {
                $('.girlContainer').addClass('active');
            }).on('leave', function(event) {
                $('.girlContainer').removeClass('active');


            }).addTo($scrollMagic)


        }




        var scenr3 = new ScrollMagic.Scene({
            triggerElement: 'section#People',
            delay: 100,
            offset: $windowHeight * 0.7
        }).on('enter', function(event) {
            $('.hexagon_intro .hexagon').addClass('active');
            $('.openDoor').addClass('active');

        }).on('leave', function(event) {
            $('.hexagon_intro .hexagon').removeClass('active');
            $('.openDoor').removeClass('active');

        }).addTo($scrollMagic)
        if ($mobile) {

            var scenrFS = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                offset: $windowHeight * -1.5
            }).on('enter', function(event) {

                $('.feeling_pic_1').addClass('active');
                $('.feeling_pic_2').addClass('active');
                drawdotApp = drawdot();
                //console.log("drawdot");


            }).addTo($scrollMagic)

        } else {
            var scenrFS = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                offset: $windowHeight * 0.5
            }).on('enter', function(event) {
                $('.feeling_pic_1').addClass('active');
                $('.feeling_pic_2').addClass('active');
                $('#FeelingStory .dotItemBig').addClass('active');

            }).on('leave', function(event) {
                $('.feeling_pic_1').removeClass('active');
                $('.feeling_pic_2').removeClass('active');
                $('#FeelingStory .dotItemBig').removeClass('active');

            }).addTo($scrollMagic)

        }

        if ($mobile) {
            var scenrFS_3 = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * -0.2
                }).setTween($('.dotItemBig.a img'), 1, { y: "30%", x: "-30%", ease: Power0.easeOut })
                .addTo($scrollMagic)

            var scenrFS_4 = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * -0.2
                }).setTween($('.dotItemBig.b img'), 1, { y: "40%", x: "-40%", ease: Power0.easeOut })
                .addTo($scrollMagic)
            var scenrFS_ = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * -0.2
                }).setTween($('.dotItemBig.c img'), 1, { y: "60%", x: "-60%", ease: Power0.easeOut })
                .addTo($scrollMagic)

        } else {
            var scenrFS_3 = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * 0.3
                }).setTween($('.dotItemBig.a img'), 1, { y: "30%", x: "-30%", ease: Power0.easeOut })
                .addTo($scrollMagic)

            var scenrFS_4 = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * 0.3
                }).setTween($('.dotItemBig.b img'), 1, { y: "40%", x: "-40%", ease: Power0.easeOut })
                .addTo($scrollMagic)
            var scenrFS_ = new ScrollMagic.Scene({
                    triggerElement: 'section#FeelingStory',
                    duration: 2500,
                    offset: $windowHeight * 0.3
                }).setTween($('.dotItemBig.c img'), 1, { y: "60%", x: "-60%", ease: Power0.easeOut })
                .addTo($scrollMagic)


        }




        var scenrFS_1 = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                duration: 2000,
                offset: $windowHeight * 0.5
            }).setTween($('.picOuter1'), 1, { y: "0%", ease: Power2.easeOut })
            .addTo($scrollMagic)

        var scenrFS_2 = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                duration: 2000,
                offset: $windowHeight * 0.5
            }).setTween($('.picOuter2'), 1, { y: "0%", ease: Power2.easeOut })
            .addTo($scrollMagic)



        if ($mobile) {
            var scenrFS_3 = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                offset: $windowHeight * -0.3
            }).on('enter', function(event) {
                $('.textBox.FS').addClass('active');
            }).on('leave', function(event) {
                $('.textBox.FS').removeClass('active');
            }).addTo($scrollMagic)

        } else {
            var scenrFS_3 = new ScrollMagic.Scene({
                triggerElement: 'section#FeelingStory',
                offset: $windowHeight * 0.7
            }).on('enter', function(event) {
                $('.textBox.FS').addClass('active');
            }).on('leave', function(event) {
                $('.textBox.FS').removeClass('active');
            }).addTo($scrollMagic)

        }




        var scenrRS_1 = new ScrollMagic.Scene({
            triggerElement: 'section#relationSweeter',
            offset: $windowHeight * 0.2
        }).on('enter', function(event) {
            $('.box.item1').addClass('active');
            $('.box.item2').addClass('active');
            $('.box.item3').addClass('active');
            $('.box.item4').addClass('active');
            $('.box.item5').addClass('active');
            $('.box.item6').addClass('active');
            $('.box.item7').addClass('active');
            $('.box.item8').addClass('active');
            $('.box.item9').addClass('active');
            $('.box.item10').addClass('active');
        }).on('leave', function(event) {
            $('.box.item1').removeClass('active');
            $('.box.item2').removeClass('active');
            $('.box.item3').removeClass('active');
            $('.box.item4').removeClass('active');
            $('.box.item5').removeClass('active');
            $('.box.item6').removeClass('active');
            $('.box.item7').removeClass('active');
            $('.box.item8').removeClass('active');
            $('.box.item9').removeClass('active');
            $('.box.item10').removeClass('active');

        }).addTo($scrollMagic)

        TweenMax.to($('#girlContainer'), 0, { y: '40%', opacity: 0 });
        if ($mobile) {
            var scenrLS = new ScrollMagic.Scene({
                    triggerElement: 'section#Last_Cut',
                    duration: 800,
                    offset: $windowHeight * 0.5
                }).setTween($('#girlContainer'), 1, { y: "5%", opacity: 1 })
                .on('enter', function(event) {
                    $('#girlContainer').addClass('active');
                }).on('leave', function(event) {

                }).setPin("section#Last_Cut").addTo($scrollMagic)

        } else {
            var scenrLS = new ScrollMagic.Scene({
                    triggerElement: 'section#Last_Cut',
                    duration: 1200,
                    offset: $windowHeight * 0.5
                }).setTween($('#girlContainer'), 1, { y: "5%", opacity: 1 })
                .on('enter', function(event) {
                    $('#girlContainer').addClass('active');
                }).on('leave', function(event) {
                    $('#girlContainer').removeClass('active');
                }).setPin("section#Last_Cut").addTo($scrollMagic)

        }



    }

    //easescroll的設定   參考https://github.com/ivmello/easeScroll
    function smoothScroll() {
        $("html").easeScroll({

            frameRate: 30,
            animationTime: 700,
            stepSize: 65,
            pulseAlgorithm: 1,
            pulseScale: 6,
            pulseNormalize: 1,
            accelerationDelta: 20,
            accelerationMax: 1,
            keyboardSupport: true,
            arrowScroll: 30,
            touchpadSupport: true,
            fixedBackground: true
        });



    }
    // 繪製圓圈掉落動畫-----mobie專用------------------------------------    
    var windowW = $(window).width();
    var windowH = $(window).height();
    var $canvas
    var ContainerW
    var ContainerH
    var ballQuantity
    var ball = new Image();
    var ballQuantity
    var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    var ballArray = [];

    function drawdot() {
        ContainerH = $('#FeelingStory').height();
        ball.src = "images/gold_circle.png";
        ballQuantity = 15;
        ball.addEventListener('load', ballTeam, false);

        //window.requestAnimationFrame = requestAnimationFrame;


    }

    function ballTeam() {
        for (var i = 0; i < ballQuantity; i++) {
            var size = Math.random() * 30 + 8
            var ballFly = new singleBall(Math.random() * (windowW * 5) + (windowW * -2), -50 - (i * 5), size * (1.5 / 180), i, size, ball)
            ballArray.push(ballFly);
        }
        //console.log(ballArray);


        ctx.fillRect(0, 0, windowW, ContainerH);
        ballTeamFlyAnimate();
    }

    function ballTeamFlyAnimate() {
        theCanvas.height = ContainerH
        theCanvas.width = windowW
        ctx.fillStyle = "#ffffff";
        ctx.fillRect(0, 0, windowW, ContainerH);

        for (var c = 0; c < ballQuantity; c++) {
            ballArray[c].flyDown();
            var ballx = ballArray[c].flyDown().ballx;
            var bally = ballArray[c].flyDown().bally;
            var ballSize = ballArray[c].flyDown().ballSize;
            //console.log(ballSize);

            ctx.drawImage(ball, ballx, bally, ballSize, ballSize);

        }

        requestAnimationFrame(ballTeamFlyAnimate);


    }

    var singleBall = function(StartPosX, StartPosY, speed, id, size, obj) {

        var Id = id
        var StartX = StartPosX.toFixed(1)
        var StartY = StartPosY.toFixed(1)
        var Speed = speed
        var distance = 0
        var nowX = parseInt(StartX, 10)
        var nowY = parseInt(StartY, 10)
        // console.log('Speed=' + Speed)
        // console.log('nowX=' + nowX)
        // console.log('nowY=' + nowY)
        this.flyDown = function() {
            nowSize = size
            nowX -= Speed
            nowY += Speed
            if (nowY > windowH + size || nowX < 0 - size) {
                nowY = parseInt(StartY, 10);
                nowX = parseInt(StartX, 10);

            }


            return {
                id: Id,
                ballx: nowX,
                bally: nowY,
                ballSize: nowSize
            }
        }

    }

    // 繪製圓圈掉落動畫-----------------------------------------


    // 複製svg線段給canvas-----------------------------------------
    function canvasApp() {

        setTimeout(function() {
            $('.svgBox').each(function(){
               // console.log($(this).find(".item").html());
               // console.log(this.querySelector(".item"))

                var $canvas = $(this).find('canvas');
    html2canvas(this.querySelector(".item"),{backgroundColor:null}).then( canvas = function(){
        //$(this).append(canvas);
        var $div = $(this).find(".item");
        $div.empty();
        $("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
    });
            })

            // var canvas = document.getElementById('Canvas');
        }, 3000);

    }

    // 複製svg線段給canvas-----------------------------------------