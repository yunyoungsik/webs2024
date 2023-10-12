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


        $boardID = $_POST['boardID'];
        $boardPass = $_POST['boardPass'];
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $memberID = $_SESSION['memberID'];

        echo $boardID, $boardPass, $boardTitle, $boardContents, $memberID;

        $boardTitle = $connect->real_escape_string($boardTitle);
        $boardContents = $connect->real_escape_string($boardContents);
        $boardPass = $connect->real_escape_string($boardPass);
    ?>
</body>
</html>