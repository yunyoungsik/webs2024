<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // 데이터베이스 연결 및 세션 시작
        include "../connect/connect.php";
        include "../connect/session.php";

        // 데이터 가져오기
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $memberID = $_SESSION['memberID'];
        $boardID = $_POST['boardID'];
        $boardPass = $_POST['boardPass']; // 사용자가 입력한 비밀번호

        echo $boardID, $boardTitle, $boardContents, $boardPass, $memberID;

        // 입력값을 이스케이프하여 SQL 인젝션 방어
        $boardTitle = $connect->real_escape_string($boardTitle);
        $boardContents = $connect->real_escape_string($boardContents);
        $boardPass = $connect->real_escape_string($boardPass);

        $sql = "SELECT * FROM members WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $info = $result -> fetch_array(MYSQLI_ASSOC);

            if($info['memberID'] === $memberID && $info['youPass'] === $boardPass){
                // 수정
                $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = {$boardID}";
                $connect -> query($sql);
                echo "<script>alert('게시글이 성공적으로 수정되었습니다.')</script>";
                echo "<script>window.location.href = 'board.php';</script>";
            } else {
                echo "<script>alert('비밀번호가 틀렸습니다. 다시 한번 확인해 주세요!')</script>";
                echo "<script>window.history.back()</script>";
            } 
        } else {
            echo "<script>alert('관리자에게 문의하세요!')</script>";
        }
    ?>
</body>
</html>