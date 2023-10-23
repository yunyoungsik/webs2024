<?php
    include "../connect/connect.php";
    include "../connect/session.php";

//     echo"<pre>";
//     var_dump($_SESSION);
//     echo"</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Device</title>

    <!-- css -->
    <?php include "../include/head.php"?>
    <style>
        /* main */
        #main {
            width: 100%;
            height: 1350px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <?php include "../include/header.php"?>
        <!-- //header -->
        
        <?php include "../include/nav.php"?>
        <!-- //nav -->

        <main id="main">
            <div class="join__inner container2">
                <div class="join__contents">
                    <h2>Trend ID 생성</h2>
                    <p>
                        Trend Device의 회원이 되면 모든 서비스를 이용할 수 있습니다.
                        <br>이미 회원이신가요? <a href="login.html">로그인</a>
                    </p>
                    <div class="join__form">
                        <form action="joinResult.php" name="joinResult" method="post" onsubmit="return joinChecks();">
                            <fieldset>
                                <legend class="blind">회원가입 영역</legend>
                                <div>
                                    <label for="youName" class="required">이름</label>
                                    <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요!" class="input__style" required>
                                    <p class="msg" id="memberNameMsg"></p>
                                </div>
                                <div class="join__email">
                                    <label for="youEmail" class="required">이메일</label>
                                    <div class="check">
                                        <input type="text" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요!" class="input__style" required>
                                        <div class="btn__style3" onclick="EmailChecking()">검사</div>
                                    </div>
                                    <p class="msg" id="memberEmailMsg"></p>
                                </div>
                                <div>
                                    <label for="youPass" class="required">암호</label>
                                    <input type="text" id="youPass" name="youPass" placeholder="암호를 입력해주세요!" class="input__style" required>
                                    <p class="msg" id="memberPassMsg"></p>
                                </div>
                                <div>
                                    <label for="youPassC" class="required">암호 확인</label>
                                    <input type="text" id="youPassC" name="youPassC" placeholder="암호를 확인해주세요!" class="input__style" required>
                                    <p class="msg" id="memberPassCMsg"></p>
                                </div>
                                <div>
                                    <label for="youBirth" class="required">생년월일</label>
                                    <input type="text" id="youBirth" name="youBirth" placeholder="생년월일을 입력해주세요!" class="input__style" required>
                                    <p class="msg" id="memberBirthMsg"></p>
                                </div>
                                <div>
                                    <label for="youPhone" class="required">연락처</label>
                                    <input type="text" id="youPhone" name="youPhone" placeholder="휴대전화를 입력해주세요!" class="input__style" required>
                                    <p class="msg" id="memberPhoneMsg"></p>
                                </div>
                                <button type="submit" class="btn__style">계속</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- //main -->

       <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //wrap -->

    <!-- script -->
    <script src="../assets/script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        function EmailChecking(){
            let youEmail = $("#youEmail").val();
            
            if(youEmail == null || youEmail == ''){
                $("#memberEmailMsg").text("이메일을 입력해주세요.");
            } else {
                // 이메일 유효성 검사
                let getyouEmail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-za-z0-9\-]+/);

                if(!getyouEmail.test(youEmail)){
                    $("#memberEmailMsg").text("이메일의 형식이 올바르지 않습니다.");
                    $("#youEmail").val('')
                    $("#youEmail").focus();
                    return false;
                } else {
                    $("#memberEmailMsg").text("조건에 맞는 이메일입니다.");
                    $("#memberEmailMsg").addClass("green");
                }

                $.ajax({
                    type: "POST",
                    url: "joinCheck.php",
                    data: {"youEmail": youEmail, "type": "isEmailCheck"},
                    dataType: "json",
                    success: function(data){
                        if(data.result == "good"){
                            $("#memberEmailMsg").text("사용 가능한 이메일입니다.");
                            isEmailCheck = true;
                        } else {
                            $("#memberEmailMsg").text("이미 존재하는 이메일입니다.");
                            isEmailCheck =false;
                        }
                    }
                })
            }
        }

        function joinChecks(){
            if($("#youEmail").val() == ''){
                $("#memberEmailMsg").text("이메일을 작성해주세요.");
                $("#youEmail").focus();
                return false;
            }

            // 이메일 유효성 및 중복 확인
            EmailChecking();

            return isEmailCheck; // 중복 확인 결과 반환
        }
    </script>
</body>
</html>