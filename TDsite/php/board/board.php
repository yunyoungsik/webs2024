<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardSql = "SELECT * FROM FBoard WHERE fDelete = 1 ORDER BY blogId DESC";
    $FboardInfo = $connect -> query($boardSql);

    // 현재 시간과의 차이 계산
    $currentTimestamp = time(); // 현재 시간의 타임스탬프
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
                    <a href="boardWrite.php" class="bw__btn__style">글쓰기</a>
                </div>
                <div class="board__search">
                    <form action="boardSearch.html" name="boardSearch" method="post">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                        </fieldset>
                        <div class="search__bar">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z " fill="#59595A"/></svg>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색" required>
                        </div>
                    </form>    
                </div>
                <div class="board__pages">
                    <ul>
                        <li class="prev"><a href="#">이전</a></li>
                        <li class="next"><a href="#">다음</a></li>
                    </ul>
                </div>
                <div class="board__table">
                    <table>
                        <!-- <colgroup>
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col>
                        </colgroup> -->
                        <thead class="blind">
                            <tr>
                                <th>프로필 이미지</th>
                                <th>게시글 제목</th>
                                <th>등록일</th>
                                <th>공감</th>
                                <th>조회수</th>
                                <th>작성자</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach($FboardInfo as $board){ ?>
        <tr>
            <td rowspan="2" style="width: 5%"><img src="../../assets/img/profile.png" alt="프로필 이미지"></td>
            <td colspan="5"><a href="boardView.php?blogId=<?=$board['blogId']?>"><?=$board['fTitle'] ?></a></a></td>
        </tr>
        <tr class="fG">
            <td>
                <?php
                    $timeDifference = $currentTimestamp - $board['fRegTime'];

                    if ($timeDifference < 60) {
                        $timeAgo = $timeDifference." 초 전";
                    } elseif ($timeDifference < 3600) {
                        $minutes = floor($timeDifference / 60);
                        $timeAgo = $minutes." 분 전";
                    } elseif ($timeDifference < 86400) {
                        $hours = floor($timeDifference / 3600);
                        $timeAgo = $hours." 시간 전";
                    } else {
                        $days = floor($timeDifference / 86400);
                        $timeAgo = $days." 일 전";
                    }

                    echo $timeAgo;
                ?>
            </td>
            <td>공감 <em><?=$board['fLike']?></em></td>
            <td>조회수 <em><?=$board['fView']?></em></td>
            <td>작성자 <em><?=$board['fAuthor']?></em></td>
            <td style="width: 50%"></td>
        </tr>
        <!-- //td -->
<?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
                        <li class="prev"><a href="#">이전</a></li>
                        <li class="next"><a href="#">다음</a></li>
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