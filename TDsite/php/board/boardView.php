<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['blogId'])){
        $blogId = $_GET['blogId'];
    } else {
        Header("Location: board.php");
    }


    // 전체 게시물 수 가져오기
    $pageSql = "SELECT * FROM FBoard WHERE fDelete = 1";
    $pageResult = $connect -> query($pageSql);

    $allPageCount = $pageResult -> num_rows; 

    // 현재 페이지
    $pageSql2 = "SELECT * FROM FBoard WHERE blogId < '$blogId' AND fDelete = 1";
    $pageResult2 = $connect -> query($pageSql2);
    $prevPageCount = $pageResult2 -> num_rows;

    $currentPage = $allPageCount - $prevPageCount; 

    // 조회수 추가
    $updateViewSql = "UPDATE FBoard SET fView = fView + 1 WHERE blogId = '$blogId'";
    $connect -> query($updateViewSql);

    // 블로그 정보 가져오기
    $boardSql = "SELECT * FROM FBoard WHERE blogId = '$blogId'";
    $boardResult = $connect -> query($boardSql);
    $boardInfo = $boardResult -> fetch_array(MYSQLI_ASSOC);

    // 이전글 가져오기
    $prevBoardSql = "SELECT * FROM FBoard WHERE blogId > '$blogId' ORDER BY blogId ASC LIMIT 1";
    $prevBoardResult = $connect -> query($prevBoardSql);
    $prevBoardInfo = $prevBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 다음글 가져오기
    $nextBoardSql = "SELECT * FROM FBoard WHERE blogId < '$blogId' ORDER BY blogId DESC LIMIT 1";
    $nextBoardResult = $connect -> query($nextBoardSql);
    $nextBoardInfo = $nextBoardResult -> fetch_array(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Device</title>
    <!-- css -->
    <?php include "../include/head.php"?>
</head>
<body>
    <div id="wrap">
        <?php include "../include/header.php" ?>
        <!-- //header -->

        <?php include "../include/nav.php" ?>
        <!-- //nav -->

        <main id="main">
        <div class="board__inner container">
                <div class="board__top">
                    <h2>자유 게시판</h2>
                </div>
                <div class="board__View">
                    <table>
                        <colgroup>
                            <col style="width: 3%;">
                            <col style="width: 5%">
                            <col style="width: 92%">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td rowspan="2"><img src="../../assets/img/profile.png" alt="프로필 이미지"></td>
                                <td colspan="2">작성자 <em><?=$boardInfo['fAuthor']?></em></td>
                            </tr>
                            <tr>
                                <td>조회수 <em><?=$boardInfo['fView']?></em></td>
                                <td colspan="2">공감 <em><?=$boardInfo['fLike']?></em></td>
                            </tr>
                            <tr class="trPb"><td colspan="3"></td></tr>
                            <tr class="content__Title">
                                <td colspan="3">
                                    <?=$boardInfo['fTitle']?>
                                </td>
                            </tr>
                            <tr class="trPb"><td colspan="3"></td></tr>
                            <tr>
                                <td class="board_cotent" colspan="3">
                                    <?=$boardInfo['fContents']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="trDay" colspan="3">게시일 <em>2023. 10. 11 오전 02:53</em></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="board__btns">
                    <button type="submit" class="btn__style">공감</button>
                    <a href="board.html" class="btn__style2">목록</a>
                </div>
                <div class="board__pages2">
                    <ul>
                        <li class="first"><a href="#">&lt;&lt;</a></li>

                        <?php if(!empty($prevBoardInfo)) { ?>
                            <a href="boardView.php?blogId=<?=$prevBoardInfo['blogId'];?>" class="prev">&lt;</a>
                        <?php } else { ?>
                            <span></span>
                        <?php } ?>

                        <li class="pages2__select"><?=$currentPage?></li>

                        <li>/</li>

                        <li><?=$allPageCount?></li>

                        <?php if(!empty($nextBoardInfo)) { ?>
                            <a href="boardView.php?blogId=<?=$nextBoardInfo['blogId'];?>" class="next">&gt;</a>
                        <?php } else { ?>
                            <span></span>
                        <?php } ?>
                        
                        <li class="last"><a href="#">&gt;&gt;</a></li>
                    </ul>
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
</body>
</html>