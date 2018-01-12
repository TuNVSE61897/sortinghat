<?php
include 'common.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $lang['PAGE_TITLE']; ?></title>
        <link rel="stylesheet" href="styles/styles2.css">
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
                $('#next').click(function () {

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



        </script>
    </head>
    <body>

        <div style="width: 90%; height: 95%; margin: auto;" class="container-fluid">
            <div class="bg-3 text-center" style="height: 100%">
                <br>
                <h3 style="font-style: #FFFFFF"><b><?php echo $lang['HEADER_TITLE_H3_TOP']; ?></b></h3></br>
               <!-- <img src="images/logo.png" class="img-circle" width="30%" height="30%" alt="Bird"></br></br>
                <h3>#WeasleyJumper #XmasHogwartsVietnam</h3>-->

                <div style=" margin-top: 50px; margin-left: auto;margin-right: auto;" class="container-fluid">
                    <div class="row ajax-call" id="testLoading" action="function.php" method="post" role="form">

                        <!-- Column Face and Skin -->

                        <div class="col-sm-12 center-block" style="width: 100%; text-align: center">
                            <div class="row center-block">
                                <div class="form-group center-block" style="width: 100%">

                                    <div class="form-group centerBlock text-center">
                                        
                                        <!-- Name -->
                                        <div class="questions">
                                            <label for="name" class="font-weight-bold control-label">
                                                Tên của trò
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="text" name="question0" id="optionsRadios1" value="">
                         
                                                </label>
                                                <br><br>
                                            </form> 
                                        </div>

                                        <!-- Question 1 -->
                                        <div class="questions">
                                            <label for="name" class="font-weight-bold control-label">
                                                Hogwarts tổ chức cho học sinh toàn trường đi du lịch. Trò mong muốn đó sẽ là dịp
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question1" id="optionsRadios1" value="1">
                                                    Halloween
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question1" id="optionsRadios2" value="2">
                                                    Valentine
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question1" id="optionsRadios3" value="3">
                                                    Giáng sinh
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question1" id="optionsRadios4" value="4">
                                                    Cuối năm học
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question1" id="optionsRadios5" value="5">
                                                    Cứ được đi chơi là tốt rồi không quan trọng
                                                </label><br><br>
                                            </form> 
                                        </div>

                                        <!-- Question 2 -->
                                        <div class="questions">
                                            <label for="name" class="font-weight-bold control-label">
                                                Và là ở
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question2" id="optionsRadios1" value="1">
                                                    Một bãi biển nổi tiếng của Muggle
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question2" id="optionsRadios2" value="2">
                                                    Một vùng rừng núi hoang vu, hùng vĩ
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question2" id="optionsRadios3" value="3">
                                                    Một vùng đất phủ tuyết trắng, ít sự sống
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question2" id="optionsRadios4" value="4">
                                                    Một trang trại thiên nhiên trù phú, hoa thơm trái ngọt
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question2" id="optionsRadios5" value="5">
                                                    Một nơi ghi dấu lịch sử với nhiều điều bí ẩn cần khám phá
                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 3 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò sẽ chuẩn bị cho chuyến đi kỹ tới mức nào?
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question3" id="optionsRadios1" value="1">
                                                    Tìm hiểu về nơi đó trước một, hai tuần vì quá háo hức
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question3" id="optionsRadios2" value="2">
                                                    Chuẩn bị đủ để không chết đói hoặc chết chán
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question3" id="optionsRadios3" value="3">
                                                    Điều gì đến thì đến. Còn cả lũ bạn đi chung lo gì!
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question3" id="optionsRadios4" value="4">
                                                    Chuẩn bị thật kỹ lưỡng, mình không cần biết đâu ai khác cần
                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 4 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò sẽ bàn bạc chung về việc chuẩn bị với ai?
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question4" id="optionsRadios1" value="1">
                                                    Tất nhiên là đứa bạn thân nhất rồi
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question4" id="optionsRadios2" value="2">
                                                    Bạn trai/bạn gái tôi chứ!
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question4" id="optionsRadios3" value="3">
                                                    Bàn gì với ai thì bàn, mình vẫn phải lo hết cho mình, không tin ai được.
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question4" id="optionsRadios4" value="4">
                                                    Hỏi kinh nghiệm các anh chị đi trước và các Huynh Trưởng là tốt nhất.
                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 5 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò muốn đi từ trường tới khu du lịch bằng phương tiện gì?
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question5" id="optionsRadios1" value="1">
                                                    Tàu tốc hành Hogwarts
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question5" id="optionsRadios2" value="2">
                                                    Độn thổ kèm theo với các Huynh trưởng, Giáo sư, Thủ Lĩnh, Giám thị...
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question5" id="optionsRadios3" value="3">
                                                    Cưỡi thảm bay
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question5" id="optionsRadios4" value="4">
                                                    Khóa cảng
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question5" id="optionsRadios5" value="5">
                                                    Dùng bột Floo
                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 6 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Tới khu du lịch, trò sẽ
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios1" value="1">
                                                    Tham gia vào các hoạt động vui chơi của học sinh cùng Nhà, cùng khóa
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios2" value="2">
                                                    Chỉ chơi với nhóm nhỏ những đứa thân như đã lên kế hoạch
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios3" value="3">
                                                    Tìm hiểu những điểm thú vị, kỳ bí về nơi này
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios4" value="4">
                                                    Mặc kệ các Huynh Trưởng và hoạt động tập thể, chỉ làm theo ý mình thích
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios5" value="5">
                                                    Vào các hàng quán, kiosk của người dân trong vùng
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios6" value="6">
                                                    Tới những nơi càng có ít người càng tốt
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question6" id="optionsRadios7" value="7">
                                                    Làm những gì trí tò mò mách bảo
                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 7 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò cảm thấy tò mò với cảnh tượng
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios1" value="1">
                                                    Một làn khói bốc ra từ một căn chòi trong khu dân cư
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios2" value="2">
                                                    Một làn khói lạ bốc ra từ ba lô của một bạn trong trường
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question7" id="optionsRadios3" value="3">
                                                    Một cột khói xa xa nơi cánh rừng hoang vu
                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 8 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò rất muốn đến chỗ bốc khói đó để xem chuyện gì xảy ra, nhưng lại bắt gặp Thủ Lĩnh Nam Sinh đang hôn bạn gái mình ở góc kín. Trò sẽ
                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios1" value="1">
                                                    Mặc kệ, chạy đi xem khói đã
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios2" value="2">
                                                    Đứng lại xem đôi tình nhân

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios3" value="3">
                                                    Chia nhau với bạn thân, mỗi đứa xem một chỗ rồi kể cho nhau

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios4" value="4">
                                                    Kéo bạn bè đi xem khói để họ được riêng tư

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios5" value="5">
                                                    Vốn không ưa gã TLNS này, phải bảo mọi người tới xem cho hắn ê mặt

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question8" id="optionsRadios6" value="6">
                                                    Phóng bùa khóa lưỡi rồi chạy đi xem khói

                                                </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 9 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Cuối cùng, trò cũng lại gần đám khói. Trò phát hiện ra đây là khói Tình dược vì nó có mùi

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios1" value="1">
                                                    Giấy da dê
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios2" value="2">
                                                    Thảo dược
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios3" value="3">
                                                    Biển
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios4" value="4">
                                                    Cỏ
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios5" value="5">
                                                    Quế
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios6" value="6">
                                                    Đất ẩm
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question9" id="optionsRadios7" value="7">
                                                    Chanh dây
                                               </label><br><br>
                                            </form>
                                        </div>

                                        <!-- Question 10 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò lấy được chỗ Tình dược đó và sẽ

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios1" value="1">
                                                    Dùng để cưa người trong mộng

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios2" value="2">
                                                    Dùng để mơi anh chàng/cô nàng hot nhất cho dạ vũ đêm đó của Trường

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios3" value="3">
                                                    Dùng để chơi khăm bồ cũ/tình địch

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios4" value="4">
                                                    Dùng để chơi khăm gã/bà Thủ lĩnh/Huynh trưởng hách dịch

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios5" value="5">
                                                    Không dùng vì mặc cảm tội lỗi

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question10" id="optionsRadios6" value="6">
                                                    Không dùng vì có bạn gái/bạn trai rồi mà

                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 11 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Con nhỏ lắm chuyện nhất trường tình cờ bắt gặp trò mang Tình dược ngay cả khi không sử dụng và loan tin khắp trường, trò sẽ

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios1" value="1">
                                                    Ếm bùa nó cho nó khỏi lôi thôi

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios2" value="2">
                                                    Thanh minh với nó rằng trò chỉ tình cờ tìm thấy và không hề sử dụng (dù có ý định)

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios3" value="3">
                                                    Dùng lời lẽ ngon ngọt để nó cũng thích và dùng theo, lợi cả đôi bên

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question11" id="optionsRadios4" value="4">
                                                    Dùng lời lẽ ngon ngọt để nó cũng thích và dùng theo, rồi bắt quả tang và tố nó
                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 12 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Chỉ vì mất thì giờ với con nhỏ lắm chuyện mà trò lỡ cơ hội mời bạn nhảy tới Dạ vũ và cuối cùng chỉ còn lại những lựa chọn sau, trò sẽ chọn

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios1" value="1">
                                                    Người trông ổn nhất, biết chải chuốt một tý dù chẳng quen biết mấy

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios2" value="2">
                                                    Người nói chuyện rất nhạt nhẽo nhưng ít nhất đã tiếp xúc vài lần, học chung nhóm vài môn

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios3" value="3">
                                                    Người ngoại hình dưới trung bình, biết nói chuyện nhưng luôn tươi cười tới mức trò thấy có vấn đề

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question12" id="optionsRadios4" value="4">
                                                    Người nào chẳng được, trò sẽ không tham gia khiêu vũ hay những trò kiểu thế tối nay đâu mà
                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 13 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Bạn nhảy của trò cuối cùng đã khiến trò rất khó chịu vì

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios1" value="1">
                                                    Ăn nói, cử chỉ vô duyên

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios2" value="2">
                                                    Liên tục yêu cầu trò phải làm gì

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios3" value="3">
                                                    Chảnh

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios4" value="4">
                                                    Nói chuyện nhạt nhẽo, hiểu biết nông cạn

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios5" value="5">
                                                    Khó chịu ra mặt vì chính trò không hào hứng tham gia khiêu vũ cùng bạn ấy
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios6" value="6">
                                                    Luôn đi tìm trò trong khi trò muốn tránh mặt
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios7" value="7">
                                                    Không có gì phải khó chịu vì trò vốn không kỳ vọng gì ở họ
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios8" value="8">
                                                    Không có gì phải khó chịu, trò thiếu gì niềm vui khác
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question13" id="optionsRadios9" value="9">
                                                    Không có gì phải khó chịu, mỗi người có cá tính riêng mà
                                                </label><br>

                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 14 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trong buổi Dạ vũ trò dành thời gian nhiều nhất

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios1" value="1">
                                                    Trên sàn khiêu vũ

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios2" value="2">
                                                    Làm quen với bạn bè mới
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios3" value="3">
                                                    Bên bàn uống nước
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios4" value="4">
                                                    Ở những nơi ít ai để ý

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios5" value="5">
                                                    Bên ngoài khán phòng
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question14" id="optionsRadios6" value="6">
                                                    Né tránh người bạn nhảy khó chịu
                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <!-- Question 15 -->
                                        <div class="questions">
                                            <label for="bg" class="font-weight-bold control-label">
                                                Trò nhớ nhất điều gì trong cả chuyến đi?

                                            </label>
                                            <form class="options" autocomplete="off">
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios1" value="1">
                                                    Những kỷ niệm vui với bạn bè

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios2" value="2">
                                                    Những điều kỳ thú trò khám phá ra ở nơi đây
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios3" value="3">
                                                    Lần đầu tiên được cưỡi thảm bay hay độn thổ kèm theo
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios4" value="4">
                                                    Sự cố Tình dược

                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios5" value="5">
                                                    Trò lãng mạn vụng trộm của gã TLNS và cô bồ
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios6" value="6">
                                                    Thời gian vui vẻ với bạn trai/bạn gái của trò
                                                </label><br>
                                                <label>
                                                    <input class="option" type="radio" name="question15" id="optionsRadios7" value="7">
                                                    Đêm Dạ vũ với người bạn nhảy khó chịu ngoài mức tưởng tượng

                                                </label><br>
                                                <br>
                                            </form>
                                        </div>

                                        <div class="w-100"></div>

                                        <!-- Next button -->
                                        <div class="form-group">
                                            <input type="button" id="next" value="Next" onclick="sum_values()">
                                        </div>
                                    </div>
                                </div>

                                <!-- Column 2 -->

                            </div>
                        </div>

                    </div>


<!--  <img style="display: none" src="" class="row" width="80%" height="80%" download="myImage"/>-->


                </div>

            </div>

            <!--    <div style="position: relative; margin-left: 0.1%; margin-top: 0.01%">
                    <text style="color: #FFFFFF; font-size: 13px">Developed by Lincoln Nguyen and Quy Le Anh</text>
                </div> -->
        </div>




    </body>
</html>
