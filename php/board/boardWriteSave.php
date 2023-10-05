<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../connect/connect.php";
        include "../connect/session.php";

        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $boardView = 0;
        $regTime = time();
        $memberID = $_SESSION['memberID'];

        // echo $boardTitle, $boardContents, $memberID;

        // 세션을 통해 사용자가 로그인되어 있는지 확인
        if(!isset($_SESSION['memberID'])){
            echo "<script>alert('로그인 후에 게시글을 작성할 수 있습니다.');</script>";
            echo "<script>window.history.back();</script>"; // 이전 페이지로 이동
        } else {
            if(empty($boardTitle) || empty($boardContents)){ // 제목이나 콘텐츠 내용이 없으면 등록X
                echo "<script>alert('제목과 내용을 모두 입력해주세요.');</script>";
                echo "<script>window.history.back();</script>"; // 이전 페이지로 이동
            } else {
                $boardTitle = $connect -> real_escape_string($boardTitle);
                $boardContents = $connect -> real_escape_string($boardContents);
    
                $sql = "INSERT INTO board(memberID, boardTitle, boardContents, boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$boardView', '$regTime')";
    
                $connect -> query($sql);
    
                echo "<script>alert('게시글이 성공적으로 작성되었습니다.');</script>";
                echo '<script>window.location.href = "board.php";</script>';
            }
        }
    ?>
</body>
</html>