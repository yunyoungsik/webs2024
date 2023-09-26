<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>

       <!-- CSS -->
       <?php include "../include/head.php"?>
</head>
<body class="gray">
    <?php include "../include/skip.php"?>
    <!-- //skip -->

    <?php include "../include/header.php"?>
    <!-- //header -->
    <main id="main" role="main">
        <div class="intro__inner container">
            <div class="intro__img">
                <img srcset="../asset/img/intro01-min.jpg 1x, ../asset/img/intro01@2x-min.jpg 2x, ../asset/img/intro01@3x-min.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
                <?php
                    include "../connect/connect.php";

                    $youEmail = $_POST['youEmail'];
                    $youName = $_POST['youName'];
                    $youPass = $_POST['youPass'];
                    $youPassC = $_POST['youPassC'];
                    $youPhone = $_POST['youPhone'];
                    $regTime = time();

                    // echo $youEmail, $youName, $youPass, $youPassC, $youPhone, $regTime;

                    // 메세지 출력
                    function msg($alert){
                        echo "<p>$alert</p>";
                    }

                    // 이메일 유효성 검사
                    $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);
                    if($check_mail == false){
                        msg("이메일 형식이 잘못되었습니다. 다시 한번 확인해주세요.");
                    }

                    // 이름 유효성 검사
                    $check_name = preg_match("/^[가-힣]{9,15}$/", $youName);
                    if($check_name == false){
                        msg("이름은 한글만 가능합니다. 또는 3~5글자만 가능합니다.");
                        exit;
                    }

                    // 비밀번호 유효성 검사
                    if($youPass !== $youPassC){
                        msg("비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요!");
                    }


                    // 휴대폰 번호 유효성 검사
                    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);
                    if($check_number == false){
                        msg("번호가 정확하지 않습니다. 올바른 번호(000-0000-0000) 형식으로 작성해주세요!");
                        exit;
                    }

                    // 이메일 중복 검사
                    $isEmailCheck = false;
                    
                    $sql = "SELECT youEmail FROM members WHERE youEmail = '$youEmail'";
                    $result = $connect -> query($sql);

                    if($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isEmailCheck = true;
                        } else {
                            msg("이미 회원가입이 되어 있습니다! 로그인을 해주세요!");
                        }
                    } else {
                        msg("에러 발생1: 관리자에게 문의하세요.");
                    }

                    //핸드폰 중복 검사
                    $isPhoneCheck = false;

                    $sql = "SELECT youPhone FROM members WHERE youPhone = '$youPhone'";
                    $result = $connect -> query($sql);

                    if($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isPhoneCheck = true;
                        } else {
                            msg("이미 회원가입이 되어 있습니다! 로그인을 해주세요!");
                        }
                    } else {
                        msg("에러 발생2: 관리자에게 문의하세요.");
                    }

                    // 회원가입
                    if($isEmailCheck == true && $isPhoneCheck == true){
                        $sql = "INSERT INTO members(youEmail, youName, youPass, youPhone, regTime) VALUES('$youEmail','$youName','$youPass','$youPhone', '$regTime')";
                        $result = $connect -> query($sql);

                        if($result){
                            msg("회원가입을 축하합니다! 로그인을 해주세요!");
                        } else {
                            msg("에러 발생3: 관리자에게 문의하세요.");
                        }
                    } else {
                        msg("이미 회원가입이 되어있습니다! 다시 한번 확인해주세요!");
                    }
                ?>
            </div>
            <div class="intro__btn">
                <a href="../main/main.php">메인으로</a>
                <a href="../login/login.php">로그인</a>
            </div>
        </div>
    </main>
    <!-- //main -->

    <footer id="footer" role="contentinfo">
        <div class="footer__inner container btStyle">
            <div>Copyright 2023 yunyoungsik</div>
            <div>blog by yys</div>
        </div>
    </footer>
    <!-- //footer -->
</body>
</html>