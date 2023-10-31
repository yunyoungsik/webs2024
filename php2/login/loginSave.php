<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <!-- CSS -->
    <?php include "../include/head.php"?>
</head>
<body class="white">
    <?php include "../include/skip.php"?>
    <!-- //skip -->

    <?php include "../include/header.php"?>
    <!-- //header -->
    <main id="main" role="main">
        <div class="intro__inner container">
            <div class="intro__img">
                <img srcset="../asset/img/img01.jpg 1x, ../asset/img/img01@2x.jpg 2x, ../asset/img/img01@3x.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
            <?php 
                include "../connect/connect.php";
                include "../connect/session.php";

                $youId = $_POST['youId'];
                $youPass = $_POST['youPass'];

                // echo $youEmail, $youPass;

                // 메시지 출력
                function msg($alert){
                    echo "<p>$alert</p>";
                }

                // 데이터 조회
                // members 데이터 중에 이메일,비밀번호
                $sql = "SELECT memberId, youId, youName, youPass FROM myMembers WHERE youId = '$youId' AND youPass = '$youPass'";
                $result = $connect -> query($sql);

                if($result){
                    $count = $result -> num_rows;

                    if($count == 0){
                        msg("아이디 또는 비밀번호가 틀렸습니다. 다시 한번 확인해주세요");
                    } else {
                        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

                        // echo "<pre>";
                        // var_dump($memberInfo);
                        // echo "</pre>";

                        // 로그인 성공 --> 세션 생성
                        $_SESSION['memberId'] = $memberInfo['memberId'];
                        $_SESSION['youId'] = $memberInfo['youId'];
                        $_SESSION['youName'] = $memberInfo['youName'];

                        header("Location: ../blog/blog.php");
                    }
                }
            ?>
            </div>
        </div>   
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>