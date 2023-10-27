<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <?php include "../include/head.php"?>
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
                <h3>블로그 글쓰기</h3>
                <p>블로그와 관련된 글을 쓸 수 있습니다.</p>
            </div>
        </div>

        <div class="blog__layout container">
            <div class="blog__contents">
                <section class="blog__write">
                    <form action="blogWriteSave.php" name="blogWriteSave" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="blind">게시글 작성하기</legend>
                            <div>
                                <label for="blogCategory" class="blind">카테고리</label>
                                <select name="blogCategory" id="blogCategory">
                                    <option value="자유글">잡담</option>
                                    <option value="자격증정보">자격증정보</option>
                                    <option value="공부정보">공부정보</option>
                                </select>
                            </div>
                            <div>
                                <label for="blogTitle" class="blind">제목</label>
                                <input type="text" id="blogTitle" name="blogTitle" placeholder="제목을 적어주세요." class="input__style" required>
                            </div>
                            <div>
                                <label for="blogContents" class="blind">내용</label>
                                <textarea id="blogContents" name="blogContents" placeholder="내용을 적어주세요."></textarea>
                            </div>
                            <div class="file">
                                <label for="blogFile" class="blind">파일</label>
                                <!-- accept=".jpg, .jpeg, .png, .gif, .webp" -->
                                <input type="file" id="blogFile" name="blogFile" class="blogFile">
                                <p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                            </div>
                            <div class="btn">
                                <button type="submit" class="btn__style3">저장하기</button>
                            </div>
                        </fieldset>
                    </form>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/ko.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#blogContents'), {
                language: 'ko' 
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>