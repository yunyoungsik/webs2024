<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    if(isset($_GET['blogId'])){
        $blogId = $_GET['blogId'];
    } else {
        Header("Location: blog.php");
    }

    // 조회수 추가
    $updateViewSql = "UPDATE blog SET blogView = blogView +1 WHERE blogId = '$blogId'";
    $connect -> query($updateViewSql);

    // 블로그 정보 가져오기
    $blogSql = "SELECT * FROM blog WHERE blogId = '$blogId'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    // 이전글 가져오기
    $prevBlogSql = "SELECT * FROM blog WHERE blogId < '$blogId' ORDER BY blogId DESC LIMIT 1";
    $prevBlogResult = $connect -> query($prevBlogSql);
    $prevBlogInfo = $prevBlogResult -> fetch_array(MYSQLI_ASSOC);

    // 다음글 가져오기
    $nextvBlogSql = "SELECT * FROM blog WHERE blogId > '$blogId' ORDER BY blogId ASC LIMIT 1";
    $nextBlogResult = $connect -> query($nextvBlogSql);
    $nextBlogInfo = $nextBlogResult -> fetch_array(MYSQLI_ASSOC);
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
                <h3>글보기 페이지</h3>
                <p> 자격증 및 공부하며 정보를 공유하는 사이트입니다.<br>다양한 정보를 확인하세요.</p>
            </div>
        </div>

        <div class="blog__layout container">
            <div class="blog__contents">
                <section class="blog__view">
                    <h3><?=$blogInfo['blogTitle']?></h3>
                    <div class="info">
                        <span class="author"><?=$blogInfo['blogAuthor']?></span>
                        <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                    </div>
                    <div class="contents">
                        <img src="../asset/blog/<?=$blogInfo['blogImgFile']?>" alt="<?=$blogInfo['blogTitle']?>">
                        <?=$blogInfo['blogContents']?>
                    </div>
                </section>

                <section class="blog__index">
                    <h4 class="blind">이전글/다음글 가기</h4>

                    <?php if(!empty($prevBlogInfo)) { ?>
                        <a href="blogView.php?blogId=<?=$prevBlogInfo['blogId'];?>" class="prev">
                            이전글[ <?=substr($prevBlogInfo['blogTitle'],0, 20);?> ]
                        </a>
                    <?php } else { ?>
                        <span class="prev">이전글이 없습니다.</span>
                    <?php } ?>
                    <!-- // 이전글 -->

                    <?php if(!empty($nextBlogInfo)) { ?>
                        <a href="blogView.php?blogId=<?=$nextBlogInfo['blogId'];?>" class="next">
                            [ <?=substr($prevBlogInfo['blogTitle'],0, 20);?> ] 다음글
                        </a>
                    <?php } else { ?>
                        <span class="prev">다음글이 없습니다.</span>
                    <?php } ?>
                    <!-- // 다음글 -->
                </section>
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