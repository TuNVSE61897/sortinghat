<?php
include 'common.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>




<!doctype html>
<html lang="en">
    <head>
        <title><?php echo $lang['PAGE_TITLE']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url"                content="https://hogwarts.vn/sortinghat" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="SortingHat - Hogwarts.vn" />
        <meta property="og:description"        content="Phân loại xem mình Nhà nào!" />
        <meta property="og:image"              content="https://i.imgur.com/W0BoIav.jpg" />
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="bootstrap-maxlength.min.js"></script>
        <script src="highlight.pack.js"></script>
        <link href="styles/styles.css" rel="stylesheet" type="text/css"/>

        <style>
            body, html {
                width: 100%;
                height: 100%;
                background-image: url('images/background.jpg');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .centerBlock {
                display: table;
                margin: auto;
            }
        </style>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">



            $(document).ready(function () {

                /*   var source = "frog.mp3"
                 var audio = document.createElement("audio");
                 audio.autoplay = true;
                 audio.load()
                 audio.addEventListener("load", function () {
                 audio.play();
                 }, true);
                 audio.src = source;*/

                answers = new Object();
                // var answer = ($(this).attr('value'))
                /// var question = ($(this).attr('name'))
                //  answers[question] = answer;
                //) change(function ()
                var questionNumber = 0;
                $('.option').change(function () {
                    var answer = ($(this).attr('value'))
                    var question = ($(this).attr('name'))
                    questionNumber = question;
                    //     alert(question);
                    answers[question] = answer;
                })
                var item1 = document.getElementById('questions');

                //Store the total number of questions
                var totalQuestions = $('.questions').size();

                //Set the current question to display to 1
                var currentQuestion = 0;

                //Store the selector in a variable.
                //It is good practice to prefix jQuery selector variables with a $
                $questions = $('.questions');

                //Hide all the questions
                $questions.hide();

                //Show the first question
                $($questions.get(currentQuestion)).fadeIn();

                //attach a click listener to the HTML element with the id of 'next'
                $('#nextQuestion').click(function () {

                    num = currentQuestion + 1;

                    //Check if answer is empty
                    if (isNaN(answers[('question' + currentQuestion)]) && num !== 1) {
                        alert("Xin chọn một đáp án");
                    } else {
                        //fade out the current question,
                        //putting a function inside of fadeOut calls that function 
                        //immediately after fadeOut is completed, 
                        //this is for a smoother transition animation
                        $($questions.get(currentQuestion)).fadeOut(function () {
                            //alert(answers['question1']);
                            //increment the current question by one
                            currentQuestion = currentQuestion + 1;


                            //if there are no more questions do stuff
                            if (currentQuestion == totalQuestions) {
                                var result = sum_values();
                                var name = $("input[name='question0']").val();

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function () {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert(this.responseText);
                                        // alert(this.responseText);
                                        //document.getElementById("preview-image").src = this.responseText;
                                    }
                                };

                                var request = "name=" + name + "&";
                                for (question in answers) {
                                    request = request + question + "=" + answers[question] + "&";
                                }

                                alert(request);

                                xmlhttp.open("GET", "function.php?" + request, true);
                                xmlhttp.send();
                                //do stuff with the result


                            } else {

                                //otherwise show the next question
                                $($questions.get(currentQuestion)).fadeIn();
                            }
                        });
                    }


                });
            });


            function sum_values() {
                var the_sum = 0;
                for (question in answers) {
                    the_sum = the_sum + "-" + answers[question];
                }
                return the_sum;
            }

            var myAudio = document.getElementById("myAudio");

            function playsound() {
                return myAudio.paused ? myAudio.play() : myAudio.pause();
            }

        </script>

        <style media="screen">

            .container {
                width: 210px;
                height: 140px;
                position: relative;
                margin: 0 auto 40px;

                -webkit-perspective: 1100px;
                -moz-perspective: 1100px;
                -o-perspective: 1100px;
                perspective: 1100px;
            }


            #carousel {
                width: 100%;
                height: 100%;
                position: absolute;
                -webkit-transform-style: preserve-3d;
                -moz-transform-style: preserve-3d;
                -o-transform-style: preserve-3d;
                transform-style: preserve-3d;
            }

            .ready #carousel {
                -webkit-transition: -webkit-transform 1s;
                -moz-transition: -moz-transform 1s;
                -o-transition: -o-transform 1s;
                transition: transform 1s;
            }

            #carousel.panels-backface-invisible figure {
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            #carousel figure {
                display: block;
                position: absolute;
                width: 200px;
                height: 300px;
                left: 10px;
                top: 10px;
                border: 2px solid black;
                line-height: 116px;
                font-weight: bold;
                color: white;
                text-align: center;
            }

            .ready #carousel figure {
                -webkit-transition: opacity 1s, -webkit-transform 1s;
                -moz-transition: opacity 1s, -moz-transform 1s;
                -o-transition: opacity 1s, -o-transform 1s;
                transition: opacity 1s, transform 1s;
            }

            #carousel figure:nth-child(1) { background: hsla(   0, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(2) { background: hsla(  40, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(3) { background: hsla(  80, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(4) { background: hsla( 120, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(5) { background: hsla( 160, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(6) { background: hsla( 200, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(7) { background: hsla( 240, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(8) { background: hsla( 280, 100%, 50%, 0.8 ); }
            #carousel figure:nth-child(9) { background: hsla( 320, 100%, 50%, 0.8 ); }

            #carousel figure:nth-child(1) {
                -webkit-transform: rotateY(   0deg ) translateZ( 288px );
                -moz-transform: rotateY(   0deg ) translateZ( 288px );
                -o-transform: rotateY(   0deg ) translateZ( 288px );
                transform: rotateY(   0deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(2) {
                -webkit-transform: rotateY(  40deg ) translateZ( 288px );
                -moz-transform: rotateY(  40deg ) translateZ( 288px );
                -o-transform: rotateY(  40deg ) translateZ( 288px );
                transform: rotateY(  40deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(3) {
                -webkit-transform: rotateY(  80deg ) translateZ( 288px );
                -moz-transform: rotateY(  80deg ) translateZ( 288px );
                -o-transform: rotateY(  80deg ) translateZ( 288px );
                transform: rotateY(  80deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(4) {
                -webkit-transform: rotateY( 120deg ) translateZ( 288px );
                -moz-transform: rotateY( 120deg ) translateZ( 288px );
                -o-transform: rotateY( 120deg ) translateZ( 288px );
                transform: rotateY( 120deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(5) {
                -webkit-transform: rotateY( 160deg ) translateZ( 288px );
                -moz-transform: rotateY( 160deg ) translateZ( 288px );
                -o-transform: rotateY( 160deg ) translateZ( 288px );
                transform: rotateY( 160deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(6) {
                -webkit-transform: rotateY( 200deg ) translateZ( 288px );
                -moz-transform: rotateY( 200deg ) translateZ( 288px );
                -o-transform: rotateY( 200deg ) translateZ( 288px );
                transform: rotateY( 200deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(7) {
                -webkit-transform: rotateY( 240deg ) translateZ( 288px );
                -moz-transform: rotateY( 240deg ) translateZ( 288px );
                -o-transform: rotateY( 240deg ) translateZ( 288px );
                transform: rotateY( 240deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(8) {
                -webkit-transform: rotateY( 280deg ) translateZ( 288px );
                -moz-transform: rotateY( 280deg ) translateZ( 288px );
                -o-transform: rotateY( 280deg ) translateZ( 288px );
                transform: rotateY( 280deg ) translateZ( 288px );
            }
            #carousel figure:nth-child(9) {
                -webkit-transform: rotateY( 320deg ) translateZ( 288px );
                -moz-transform: rotateY( 320deg ) translateZ( 288px );
                -o-transform: rotateY( 320deg ) translateZ( 288px );
                transform: rotateY( 320deg ) translateZ( 288px );
            }


        </style>

    </head>
    <body>

        <div style="width: 90%; height: 95%; margin: auto;" class="container-fluid">
            <div class="bg-3 text-center" style="height: 100%">
                <br> 
                <h3 style="font-style: #FFFFFF"><b><?php echo $lang['HEADER_TITLE_H3_TOP']; ?>

                        <div style=" margin-top: 50px; margin-left: auto;margin-right: auto;" class="container-fluid">
                            <div class="row ajax-call" id="testLoading" action="function.php" method="post" role="form">

                                <div class="col-sm-12 center-block" style="width: 100%; text-align: center">
                                    <div class="row center-block">
                                        <div class="form-group center-block" style="width: 100%">

                                            <div class="form-group centerBlock text-center">

                                                <div class="questions container">
                                                    <label for="name" class="font-weight-bold control-label">hello</label>
                                                    <form class="options" id="carousel">
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-1.png" alt=""/>

                                                            <input class="option" type="radio" name="question1" id="optionsRadios1" value="1">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S1']; ?>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-2.png" alt=""/>
                                                            <input class="option" type="radio" name="question1" id="optionsRadios2" value="2">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S2']; ?>
                                                        </figure>

                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>
                                                            <input class="option" type="radio" name="question1" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>

                                                            <input class="option" type="radio" name="question1" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>
                                                            <input class="option" type="radio" name="question1" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>

                                                        <br>
                                                    </form> 


                                                </div>



                                                <div class="questions container">
                                                    <label for="name" class="font-weight-bold control-label">hello</label>
                                                    <form class="options" id="carousel">
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-1.png" alt=""/>

                                                            <input class="option" type="radio" name="question2" id="optionsRadios1" value="1">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S1']; ?>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-2.png" alt=""/>
                                                            <input class="option" type="radio" name="question2" id="optionsRadios2" value="2">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S2']; ?>
                                                        </figure>

                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>
                                                            <input class="option" type="radio" name="question2" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>

                                                            <input class="option" type="radio" name="question2" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>
                                                        <figure>
                                                            <img width="90%" height="90%" src="images/options/1-3.png" alt=""/>
                                                            <input class="option" type="radio" name="question2" id="optionsRadios3" value="3">
                                                            <?php echo $lang['LB_CHOOSE_SKIN_S3']; ?>
                                                            <br>

                                                        </figure>

                                                        <br>
                                                    </form> 


                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <input type="button" id="nextQuestion" value="Next" onclick="sum_values()">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- <section class="container">
                             <div id="carousel">
                 
                                 <figure><img width="90%" height="90%" src="images/B.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/C.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/D.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/E.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/A.png" alt=""/></figure>               
                                 <figure><img width="90%" height="90%" src="images/B.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/C.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/D.png" alt=""/></figure>
                                 <figure><img width="90%" height="90%" src="images/E.png" alt=""/></figure>
                 
                             </div>
                         </section>-->

                        <section id="options">
                            <p>
                                <label for="panel-count">panels</label>
                                <input type="range" id="panel-count" value="5" min="3" max="5" />
                            </p>

                            <p id="navigation">
                                <button id="previous" data-increment="-1">Previous</button>
                                <button id="next" data-increment="1">Next</button>
                            </p>

                            <p>
                                <button id="toggle-axis">Toggle Carousel Axis</button>
                            </p>

                            <p>
                                <button id="toggle-backface-visibility">Toggle Backface Visibility</button>
                            </p>

                        </section>

                        <script src="utils.js" type="text/javascript"></script>

                        <script>
                                                                var transformProp = Modernizr.prefixed('transform');

                                                                function Carousel3D(el) {
                                                                    this.element = el;

                                                                    this.rotation = 0;
                                                                    this.panelCount = 0;
                                                                    this.totalPanelCount = this.element.children.length;
                                                                    this.theta = 0;

                                                                    this.isHorizontal = true;

                                                                }

                                                                Carousel3D.prototype.modify = function () {

                                                                    var panel, angle, i;

                                                                    this.panelSize = this.element[ this.isHorizontal ? 'offsetWidth' : 'offsetHeight' ];
                                                                    this.rotateFn = this.isHorizontal ? 'rotateY' : 'rotateX';
                                                                    this.theta = (360 / this.panelCount);

                                                                    // do some trig to figure out how big the carousel
                                                                    // is in 3D space
                                                                    this.radius = Math.round((this.panelSize / 2) / Math.tan(Math.PI / this.panelCount));

                                                                    for (i = 0; i < this.panelCount; i++) {
                                                                        panel = this.element.children[i];
                                                                        angle = (this.theta * i);
                                                                        panel.style.opacity = 1;
                                                                        panel.style.backgroundColor = 'hsla(' + angle + ', 100%, 50%, 0.8)';
                                                                        // rotate panel, then push it out in 3D space
                                                                        panel.style[ transformProp ] = this.rotateFn + '(' + angle + 'deg) translateZ(' + this.radius + 'px)';
                                                                    }

                                                                    // hide other panels
                                                                    for (; i < this.totalPanelCount; i++) {
                                                                        panel = this.element.children[i];
                                                                        panel.style.opacity = 0;
                                                                        panel.style[ transformProp ] = 'none';
                                                                    }

                                                                    // adjust rotation so panels are always flat
                                                                    this.rotation = Math.round(this.rotation / this.theta) * this.theta;

                                                                    this.transform();

                                                                };

                                                                Carousel3D.prototype.transform = function () {
                                                                    // push the carousel back in 3D space,
                                                                    // and rotate it
                                                                    this.element.style[ transformProp ] = 'translateZ(-' + this.radius + 'px) ' + this.rotateFn + '(' + this.rotation + 'deg)';
                                                                };



                                                                var init = function () {


                                                                    var carousel = new Carousel3D(document.getElementById('carousel')),
                                                                            panelCountInput = document.getElementById('panel-count'),
                                                                            axisButton = document.getElementById('toggle-axis'),
                                                                            navButtons = document.querySelectorAll('#navigation button'),
                                                                            onNavButtonClick = function (event) {
                                                                                var increment = parseInt(event.target.getAttribute('data-increment'));
                                                                                carousel.rotation += carousel.theta * increment * -1;
                                                                                carousel.transform();
                                                                            };

                                                                    // populate on startup
                                                                    carousel.panelCount = parseInt(panelCountInput.value, 10);
                                                                    carousel.modify();


                                                                    axisButton.addEventListener('click', function () {
                                                                        carousel.isHorizontal = !carousel.isHorizontal;
                                                                        carousel.modify();
                                                                    }, false);

                                                                    panelCountInput.addEventListener('change', function (event) {
                                                                        carousel.panelCount = event.target.value;
                                                                        carousel.modify();
                                                                    }, false);

                                                                    for (var i = 0; i < 2; i++) {
                                                                        navButtons[i].addEventListener('click', onNavButtonClick, false);
                                                                    }

                                                                    document.getElementById('toggle-backface-visibility').addEventListener('click', function () {
                                                                        carousel.element.toggleClassName('panels-backface-invisible');
                                                                    }, false);

                                                                    setTimeout(function () {
                                                                        document.body.addClassName('ready');
                                                                    }, 0);

                                                                };

                                                                window.addEventListener('DOMContentLoaded', init, false);
                        </script>

                        </body>
                        </html>
