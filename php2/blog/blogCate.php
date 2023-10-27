<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header("Location: blog.php");
    }

    $categorySql = "SELECT * FROM blog WHERE blogDelete = 1 AND blogCategory = '$category' ORDER BY blogId DESC";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <!-- css -->
    <?php include "../include/head.php" ?>
</head>
<body class="white"> 
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner blogStyle bmStyle container">
            <div class="intro__img main">
                <img srcset="../asset/img/img01.jpg 1x, ../asset/img/img01@2x.jpg 2x, ../asset/img/img01@3x.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
                <h3><?=$category?></h3>
                <p> 자격증 및 공부하며 정보를 공유하는 사이트입니다.<br>다양한 <?=$category?>를 확인하세요.</p>
            </div>
        </div>

        <div class="blog__layout container">
            <div class="blog__contents">
                <section class="blog__card card__wrap">
                        <h2><?=$category?></h2>
                        <div class="card__inner column3">

    <?php foreach($categoryResult as $blog){ ?>
        <div class="card">
            <figure class="card__img">
                <a href="blogView.php?blogId=<?=$blog['blogId']?>">
                    <img src="../asset/blog/<?=$blog['blogImgFile']?>" alt="<?=$blog['blogTitle']?>">
                </a>
            </figure>
            <div class="card__text">
                <h3>
                    <a href="blogView.php?blogId=<?=$blog['blogId']?>">
                        <span><?=$blog['blogTitle']?></span>
                    </a>
                </h3>
                <p>
                    <?=substr($blog['blogContents'], 0, 100)?>
                </p>
            </div>
        </div>
    <?php } ?>

                    </div>
                </section>
                <section class="blog__pages">blog__pages</section>
                <section class="blog__index">blog__index</section>
                <section class="blog__relate">blog__relate</section>
                <section class="blog__view">blog__view</section>
                <section class="blog__write">blog__write</section>
            </div>
            <div class="blog__aside">
                <?php include "blogAd.php" ?>
                <!-- //blog__ad -->

                <?php include "blogIntro.php" ?>
                <!-- //blogIntro -->

                <?php include "blogCategory.php" ?>
                <!-- //blogCategory -->

                <?php include "blogPopular.php" ?>
                <!-- //blogPopular -->
                
                <?php include "blogComment.php" ?>
                <!-- //blogComment -->
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //foter -->
</body>
</html>