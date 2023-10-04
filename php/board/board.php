<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo"<pre>";
    // var_dump($_SESSION);
    // echo"</pre>";
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
<body class="gray">
    <?php include "../include/skip.php"?>
    <!-- //skip -->

    <?php include "../include/header.php"?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img small">
                <img srcset="../asset/img/intro03-min.jpg 1x, ../asset/img/intro03@2x-min.jpg 2x, ../asset/img/intro03@3x-min.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
                <h2>게시판</h2>
                <p>
                    웹디자이너, 웹퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>관련된 문의사항은 여기서 확인하세요!
                </p>
            </div>
        </div>
        <section class="board__inner container">
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="boardView">게시판 제목</a></td>
                            <td>yys</td>
                            <td>2023-10-04</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>