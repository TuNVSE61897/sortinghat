<?php
include 'common.php';
?>
<!DOCTYPE html>
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

                //////////// ANIMATION //////////////////

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
                        //  panel.style.backgroundColor = 'hsla(' + angle + ', 100%, 50%, 0.8)';
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



                function init(panelNum) {

                    // alert("init");

                    var carousel = new Carousel3D(document.getElementById('carousel')),
                            // panelCountInput = document.getElementById('panel-count'),
                            navButtons = document.querySelectorAll('#navigation button'),
                            onNavButtonClick = function (event) {
                                var increment = parseInt(event.target.getAttribute('data-increment'));
                                carousel.rotation += carousel.theta * increment * -1;
                                carousel.transform();
                            };

                    carousel.element.toggleClassName('panels-backface-invisible');
                    // populate on startup
                    carousel.panelCount = parseInt(5, 10);//parseInt(panelCountInput.value, 10);
                    carousel.modify();

                    /*    panelCountInput.addEventListener('change', function (event) {
                     alert("hello");
                     carousel.panelCount = event.target.value;
                     carousel.modify();
                     }, false);*/
                    carousel.panelCount = panelNum;
                    carousel.modify();

                    for (var i = 0; i < 2; i++) {
                        navButtons[i].addEventListener('click', onNavButtonClick, false);
                    }

                    setTimeout(function () {
                        document.body.addClassName('ready');
                    }, 0);

                }
                ;

                window.addEventListener('DOMContentLoaded', init(5), false);


                ////////// QUIZ////////////////

                   var source = "frog.mp3"
                 var audio = document.createElement("audio");
                 audio.autoplay = true;
                 audio.load()
                 audio.addEventListener("load", function () {
                 audio.play();
                 }, true);
                 audio.src = source;

                answers = new Object();
                var numberOpt = [5, 6, 4, 4, 5, 7];
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
                    if (isNaN(answers[('question' + num)]) && num !== 16) {
                        alert("Xin chọn một đáp án");
                    } else {
                        /*    alert(currentQuestion);
                         if (currentQuestion === 0) {
                         alert(currentQuestion);
                         var panelCountInput = document.getElementById('panel-count');
                         panelCountInput.value = 6;
                         panelCountInput.dispatchEvent("change");
                         }*/

                        //fade out the current question,
                        //putting a function inside of fadeOut calls that function 
                        //immediately after fadeOut is completed, 
                        //this is for a smoother transition animation

                        $($questions.get(currentQuestion)).fadeOut(function () {
                            //  $( ".questions" ).remove();

                            //alert(answers['question1']);
                            //increment the current question by one

                            //DOMContentLoaded
                            currentQuestion = currentQuestion + 1;


                            //if there are no more questions do stuff
                            if (currentQuestion == totalQuestions) {
                                var result = sum_values();
                                var name = $("input[name='question16']").val();

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function () {
                                    if (this.readyState == 4 && this.status == 200) {
                                   //     alert(this.responseText);
                                        $("#navigation").fadeOut();
                                        $("#nextQuestion").fadeOut();
                                        document.getElementById("house-image").src = this.responseText;
                                        document.getElementById("house-image").style.display = 'block';
                                        // alert(this.responseText);
                                        //document.getElementById("preview-image").src = this.responseText;
                                    }
                                };

                                var request = "name=" + name + "&";
                                for (question in answers) {
                                    request = request + question + "=" + answers[question] + "&";
                                }

                               // alert(request);

                                xmlhttp.open("GET", "function.php?" + request, true);
                                xmlhttp.send();
                                //do stuff with the result


                            } else {
                                $($questions.get(currentQuestion - 1)).remove();
                                // var id = "question2";
                                // var numberOpt = document.getElementById(id).value;
                                // alert(numberOpt);
                                //  window.addEventListener("load",init,false);

                                //otherwise show the next question
                                $($questions.get(currentQuestion)).fadeIn();
                                init(numberOpt[currentQuestion]);
                                //  document.addEventListener("mousemove", init, false);
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
                width: 260px;
                height: 390px;
                position: relative;
                margin: 20px auto 40px;

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
                width: 260px;
                height: 390px;
                left: 10px;
                top: 10px;


                font-size: 18px;
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


        </style>
    </head>
    <body>

        <div style="width: 90%; height: 97%; margin: auto;" class="container-fluid">
            <!--<div>
                   <audio id="myAudio" src="frog.mp3" preload="auto"></audio>
                       <a onclick="playsound()"><img width="15px" height="15px" src="images/sound2.png" /></a>
          
               </div>-->
            <div class="bg-3 text-center" style="height: 100%">
                <br>
                <h3 style="font-style: #FFFFFF"><b><?php echo $lang['HEADER_TITLE_H3_TOP']; ?></b></h3>
               <!-- <img src="images/logo.png" class="img-circle" width="30%" height="30%" alt="Bird"></br></br>
                <h3>#WeasleyJumper #XmasHogwartsVietnam</h3>-->

                <div style=" margin-top: 30px; margin-left: auto;margin-right: auto;" class="container-fluid">
                    <div class="row ajax-call" id="testLoading" action="function.php" method="post" role="form">

                        <!-- Column Face and Skin -->

                        <div class="col-sm-12 center-block" style="width: 100%; text-align: center">
                            <div class="row center-block">
                                <div class="form-group center-block" style="width: 100%">

                                    <div class="form-group centerBlock text-center">

                                        <!-- Question 1 -->
                                        <div class="questions" id="question1" value="5">
                                            <label for="name" class="font-weight-bold control-label">
                                                <text style="font-size: 24px"> Hogwarts tổ chức cho học sinh toàn trường đi du lịch. Trò mong muốn đó sẽ là dịp</text>
                                            </label>
                                            <div class="container">
                                                <form class="options" id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/1-1.png" alt=""/>
                                                        <br>   <br>    Halloween
                                                        <br><input class="option" type="radio" name="question1" id="optionsRadios1" value="1">


                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/1-2.png" alt=""/>
                                                        <br>  <br>  Valentine
                                                        <br> <input class="option" type="radio" name="question1" id="optionsRadios2" value="2">


                                                    </figure>
                                                    <figure>
                                                        <img  width="80%" height="80%" src="images/options/1-3.png" alt=""/>
                                                        <br>  <br>    Giáng sinh
                                                        <br> <input class="option" type="radio" name="question1" id="optionsRadios3" value="3">


                                                    </figure>
                                                    <figure>
                                                        <img  width="80%" height="80%" src="images/options/1-4.png" alt=""/>

                                                        <br>  <br>   Cuối năm học
                                                        <br><input class="option" type="radio" name="question1" id="optionsRadios4" value="4">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/1-5.png" alt=""/>

                                                        <br> <br>  Cứ được đi chơi là tốt rồi không quan trọng
                                                        <br> <input class="option" type="radio" name="question1" id="optionsRadios5" value="5">
                                                    </figure><br>
                                                </form> 
                                            </div>
                                        </div>

                                        <!-- Question 2 -->
                                        <div class="questions" id="question2" value="6">
                                            <label for="name" class="font-weight-bold control-label">
                                                Và là ở
                                            </label>
                                            <div class="container">
                                                <form class="options" id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-1.png" alt=""/>
                                                        <br><br>Một bãi biển nổi tiếng của Muggle
                                                        <br><input class="option" type="radio" name="question2" id="optionsRadios1" value="1">
                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-2.png" alt=""/>
                                                        <br> <br>Một vùng rừng núi hoang vu, hùng vĩ
                                                        <br><input class="option" type="radio" name="question2" id="optionsRadios2" value="2">
                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-3.png" alt=""/>
                                                        <br> <br> Một vùng đất phủ tuyết trắng, ít sự sống
                                                        <br>  <input class="option" type="radio" name="question2" id="optionsRadios3" value="3">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-4.png" alt=""/>
                                                        <br><br>  Một trang trại thiên nhiên trù phú, hoa thơm trái ngọt
                                                        <br>  <input class="option" type="radio" name="question2" id="optionsRadios4" value="4">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-5.png" alt=""/>
                                                        <br><br>   Một hoang đảo giữa biển Bắc bao la
                                                        <br>  <input class="option" type="radio" name="question2" id="optionsRadios4" value="5">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/2-6.png" alt=""/>
                                                        <br><br>   Một nơi ghi dấu lịch sử với nhiều điều bí ẩn cần khám phá
                                                        <br> <input class="option" type="radio" name="question2" id="optionsRadios5" value="6">

                                                    </figure><br><br>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Question 3 -->
                                        <div class="questions" id="question3" value="4">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò sẽ chuẩn bị cho chuyến đi kỹ tới mức nào?
                                            </label>
                                            <div class="container">
                                                <form class="options"  id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/3-1.png" alt=""/>
                                                        <br><br>  Tìm hiểu về nơi đó trước một, hai tuần vì quá háo hức
                                                        <br>   <input class="option" type="radio" name="question3" id="optionsRadios1" value="1">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/3-2.png" alt=""/>
                                                        <br> <br>  Chuẩn bị đủ để không chết đói hoặc chết chán
                                                        <br>   <input class="option" type="radio" name="question3" id="optionsRadios2" value="2">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/3-3.png" alt=""/>
                                                        <br><br>    Điều gì đến thì đến. Còn cả lũ bạn đi chung lo gì!
                                                        <br>    <input class="option" type="radio" name="question3" id="optionsRadios3" value="3">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/3-4.png" alt=""/>
                                                        <br><br>    Chuẩn bị thật kỹ lưỡng, mình không cần biết đâu ai khác cần
                                                        <br>    <input class="option" type="radio" name="question3" id="optionsRadios4" value="4">

                                                    </figure><br><br>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Question 4 -->
                                        <div class="questions" id="question4" value="4">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò sẽ bàn bạc chung về việc chuẩn bị với ai?
                                            </label>
                                            <div class="container">                                            
                                                <form class="options" id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/4-1.png" alt=""/>
                                                        <br><br>    Tất nhiên là đứa bạn thân nhất rồi
                                                        <br>    <input class="option" type="radio" name="question4" id="optionsRadios1" value="1">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/4-2.png" alt=""/>
                                                        <br><br>    Bạn trai/bạn gái tôi chứ!
                                                        <br>    <input class="option" type="radio" name="question4" id="optionsRadios2" value="2">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/4-3.png" alt=""/>
                                                        <br><br>    Bàn gì với ai thì bàn, mình vẫn phải lo hết cho mình, không tin ai được.
                                                        <br>    <input class="option" type="radio" name="question4" id="optionsRadios3" value="3">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/4-4.png" alt=""/>
                                                        <br><br>   Hỏi kinh nghiệm các anh chị đi trước và các Huynh Trưởng là tốt nhất.
                                                        <br>   <input class="option" type="radio" name="question4" id="optionsRadios4" value="4">

                                                    </figure><br><br>
                                                </form>
                                            </div>

                                        </div>

                                        <!-- Question 5 -->
                                        <div class="questions" id="question5" value="5">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò muốn đi từ trường tới khu du lịch bằng phương tiện gì?
                                            </label>
                                            <div class="container">         
                                                <form class="options" id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/5-1.png" alt=""/>
                                                        <br><br>      Tàu tốc hành Hogwarts
                                                        <br>  <input class="option" type="radio" name="question5" id="optionsRadios1" value="1">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/5-2.png" alt=""/>
                                                        <br><br>  Độn thổ kèm theo với các Huynh trưởng, Giáo sư, Thủ Lĩnh, Giám thị...
                                                        <br>   <input class="option" type="radio" name="question5" id="optionsRadios2" value="2">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/5-3.png" alt=""/>
                                                        <br><br>     Cưỡi thảm bay
                                                        <br>  <input class="option" type="radio" name="question5" id="optionsRadios3" value="3">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/5-4.png" alt=""/>
                                                        <br><br>     Khóa cảng
                                                        <br>      <input class="option" type="radio" name="question5" id="optionsRadios4" value="4">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/5-5.png" alt=""/>
                                                        <br><br>    Dùng bột Floo
                                                        <br>   <input class="option" type="radio" name="question5" id="optionsRadios5" value="5">

                                                    </figure><br><br>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Question 6 -->
                                        <div class="questions" id="question6" value="7">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Tới khu du lịch, trò sẽ
                                            </label>
                                            <div class="container">        
                                                <form class="options" id="carousel" autocomplete="off">
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-1.png" alt=""/>
                                                      <br><br>  Tham gia vào các hoạt động vui chơi của học sinh cùng Nhà, cùng khóa
                                                     <br>   <input class="option" type="radio" name="question6" id="optionsRadios1" value="1">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-2.png" alt=""/>
                                                      <br><br>  Chỉ chơi với nhóm nhỏ những đứa thân như đã lên kế hoạch
                                                      <br>  <input class="option" type="radio" name="question6" id="optionsRadios2" value="2">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-3.png" alt=""/>
                                                       <br><br> Tìm hiểu những điểm thú vị, kỳ bí về nơi này
                                                      <br>  <input class="option" type="radio" name="question6" id="optionsRadios3" value="3">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-4.png" alt=""/>
                                                    <br><br>    Mặc kệ các Huynh Trưởng và hoạt động tập thể, chỉ làm theo ý mình thích
                                                     <br>   <input class="option" type="radio" name="question6" id="optionsRadios4" value="4">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-5.png" alt=""/>
                                                      <br><br>  Vào các hàng quán, kiosk của người dân trong vùng
                                                      <br>  <input class="option" type="radio" name="question6" id="optionsRadios5" value="5">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-6.png" alt=""/>
                                                      <br><br>  Tới những nơi càng có ít người càng tốt
                                                      <br>  <input class="option" type="radio" name="question6" id="optionsRadios6" value="6">

                                                    </figure>
                                                    <figure>
                                                        <img width="80%" height="80%" src="images/options/6-7.png" alt=""/>
                                                     <br><br>   Làm những gì trí tò mò mách bảo
                                                      <br>  <input class="option" type="radio" name="question6" id="optionsRadios7" value="7">

                                                    </figure><br><br>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Question 7 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò cảm thấy tò mò với cảnh tượng
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios1" value="1">
                                                    Một làn khói bốc ra từ một căn chòi trong khu dân cư
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios2" value="2">
                                                    Một làn khói lạ bốc ra từ ba lô của một bạn trong trường
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios3" value="3">
                                                    Một cột khói xa xa nơi cánh rừng hoang vu
                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 8 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò rất muốn đến chỗ bốc khói đó để xem chuyện gì xảy ra, nhưng lại bắt gặp Thủ Lĩnh Nam Sinh đang hôn bạn gái mình ở góc kín. Trò sẽ
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios1" value="1">
                                                    Mặc kệ, chạy đi xem khói đã
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios2" value="2">
                                                    Đứng lại xem đôi tình nhân

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios3" value="3">
                                                    Chia nhau với bạn thân, mỗi đứa xem một chỗ rồi kể cho nhau

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios4" value="4">
                                                    Kéo bạn bè đi xem khói để họ được riêng tư

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios5" value="5">
                                                    Vốn không ưa gã TLNS này, phải bảo mọi người tới xem cho hắn ê mặt

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios6" value="6">
                                                    Phóng bùa khóa lưỡi rồi chạy đi xem khói

                                                </figure><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 9 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Cuối cùng, trò cũng lại gần đám khói. Trò phát hiện ra đây là khói Tình dược vì nó có mùi

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios1" value="1">
                                                    Giấy da dê
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios2" value="2">
                                                    Thảo dược
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios3" value="3">
                                                    Biển
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios4" value="4">
                                                    Cỏ
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios5" value="5">
                                                    Quế
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios6" value="6">
                                                    Đất ẩm
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios7" value="7">
                                                    Chanh dây
                                                </figure><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 10 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò lấy được chỗ Tình dược đó và sẽ

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios1" value="1">
                                                    Dùng để cưa người trong mộng

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios2" value="2">
                                                    Dùng để mơi anh chàng/cô nàng hot nhất cho dạ vũ đêm đó của Trường

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios3" value="3">
                                                    Dùng để chơi khăm bồ cũ/tình địch

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios4" value="4">
                                                    Dùng để chơi khăm gã/bà Thủ lĩnh/Huynh trưởng hách dịch

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios5" value="5">
                                                    Không dùng vì mặc cảm tội lỗi

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios6" value="6">
                                                    Không dùng vì có bạn gái/bạn trai rồi mà

                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 11 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Con nhỏ lắm chuyện nhất trường tình cờ bắt gặp trò mang Tình dược ngay cả khi không sử dụng và loan tin khắp trường, trò sẽ

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios1" value="1">
                                                    Ếm bùa nó cho nó khỏi lôi thôi

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios2" value="2">
                                                    Thanh minh với nó rằng trò chỉ tình cờ tìm thấy và không hề sử dụng (dù có ý định)

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios3" value="3">
                                                    Dùng lời lẽ ngon ngọt để nó cũng thích và dùng theo, lợi cả đôi bên

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios4" value="4">
                                                    Dùng lời lẽ ngon ngọt để nó cũng thích và dùng theo, rồi bắt quả tang và tố nó
                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 12 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Chỉ vì mất thì giờ với con nhỏ lắm chuyện mà trò lỡ cơ hội mời bạn nhảy tới Dạ vũ và cuối cùng chỉ còn lại những lựa chọn sau, trò sẽ chọn

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios1" value="1">
                                                    Người trông ổn nhất, biết chải chuốt một tý dù chẳng quen biết mấy

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios2" value="2">
                                                    Người nói chuyện rất nhạt nhẽo nhưng ít nhất đã tiếp xúc vài lần, học chung nhóm vài môn

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios3" value="3">
                                                    Người ngoại hình dưới trung bình, biết nói chuyện nhưng luôn tươi cười tới mức trò thấy có vấn đề

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios4" value="4">
                                                    Người nào chẳng được, trò sẽ không tham gia khiêu vũ hay những trò kiểu thế tối nay đâu mà
                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 13 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Bạn nhảy của trò cuối cùng đã khiến trò rất khó chịu vì

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios1" value="1">
                                                    Ăn nói, cử chỉ vô duyên

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios2" value="2">
                                                    Liên tục yêu cầu trò phải làm gì

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios3" value="3">
                                                    Chảnh

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios4" value="4">
                                                    Nói chuyện nhạt nhẽo, hiểu biết nông cạn

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios5" value="5">
                                                    Khó chịu ra mặt vì chính trò không hào hứng tham gia khiêu vũ cùng bạn ấy
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios6" value="6">
                                                    Luôn đi tìm trò trong khi trò muốn tránh mặt
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios7" value="7">
                                                    Không có gì phải khó chịu vì trò vốn không kỳ vọng gì ở họ
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios8" value="8">
                                                    Không có gì phải khó chịu, trò thiếu gì niềm vui khác
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios9" value="9">
                                                    Không có gì phải khó chịu, mỗi người có cá tính riêng mà
                                                </figure><br>

                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 14 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trong buổi Dạ vũ trò dành thời gian nhiều nhất

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios1" value="1">
                                                    Trên sàn khiêu vũ

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios2" value="2">
                                                    Làm quen với bạn bè mới
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios3" value="3">
                                                    Bên bàn uống nước
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios4" value="4">
                                                    Ở những nơi ít ai để ý

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios5" value="5">
                                                    Bên ngoài khán phòng
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios6" value="6">
                                                    Né tránh người bạn nhảy khó chịu
                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 15 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò nhớ nhất điều gì trong cả chuyến đi?

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios1" value="1">
                                                    Những kỷ niệm vui với bạn bè

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios2" value="2">
                                                    Những điều kỳ thú trò khám phá ra ở nơi đây
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios3" value="3">
                                                    Lần đầu tiên được cưỡi thảm bay hay độn thổ kèm theo
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios4" value="4">
                                                    Sự cố Tình dược

                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios5" value="5">
                                                    Trò lãng mạn vụng trộm của gã TLNS và cô bồ
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios6" value="6">
                                                    Thời gian vui vẻ với bạn trai/bạn gái của trò
                                                </figure><br>
                                                <figure>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios7" value="7">
                                                    Đêm Dạ vũ với người bạn nhảy khó chịu ngoài mức tưởng tượng

                                                </figure><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Name -->
                                        <div class="questions">
                                            <label for="name" class="font-weight-bold control-label">
                                                Tên của trò
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="text" name="question16" id="optionsRadios1" value="">

                                                </label>
                                                <br><br>
                                            </form> 
                                        </div>
                                        
                                       
                                        <div class="w-100"></div>

                                        <!-- Next button -->
                                        <div class="form-group">
                                            <input type="button" id="nextQuestion" value="Next" onclick="sum_values()">
                                        </div>

                                        <section id="options" >
                                         <!--   <p>
                                                <label style="visibility: hidden" for="panel-count" >panels</figure>
                                                <input type="range" id="panel-count" value="5" min="1" max="7" />
                                            </p>-->

                                            <p id="navigation">
                                                <button style="margin-right: 20px" id="previous" data-increment="-1"> Previous</button>

                                                <button id="next" data-increment="1">Next</button>

                                            </p>

                                        </section>
                                    </div>
                                </div>

                                <!-- Column 2 -->

                            </div>
                        </div>

                    <img id ="house-image" class="row" width="80%" height="80%" style="display: none" src="images/results/ihrH53K_2018-01-20_213501.jpg"/>
                    
                    </div>


<!--  <img style="display: none" src="" class="row" width="80%" height="80%" download="myImage"/>-->


                </div>

            </div>

            <!--    <div style="position: relative; margin-left: 0.1%; margin-top: 0.01%">
                    <text style="color: #FFFFFF; font-size: 13px">Developed by Lincoln Nguyen and Quy Le Anh</text>
                </div> -->
        </div>


        <script src="utils.js" type="text/javascript"></script>

        <script>

        </script>

    </body>
</html>
