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
       <div class="intro__inner bmStyle container">
            <div class="intro__img main">
                <img srcset="../asset/img/img01.jpg 1x, ../asset/img/img01@2x.jpg 2x, ../asset/img/img01@3x.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
                자격증 및 공부하며 정보를 공유하는 사이트입니다.
            </div>
        </div>
        <!-- //intro__inner -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>