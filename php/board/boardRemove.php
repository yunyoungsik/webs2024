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
        include "../connect/sessionCheck.php";
        
        $boardID = $_GET['boardID'];
        $memberID = $_SESSION['memberID'];

        // echo"<pre>";
        // var_dump($_SESSION);
        // echo"</pre>";
        
        // 게시글 소유자 확인
        $sql = "SELECT memberID FROM board WHERE boardID={$boardID}";
        $result = $connect -> query($sql);

        if($result){
            $info = $result->fetch_array(MYSQLI_ASSOC);
            // $info = $result->fetch_assoc(); // 위와 같은 기능
            $boardOwnerID = $info['memberID'];

            // 로그인 memberID 게시글 memberID 일치 여부
            if($memberID === $boardOwnerID){
                $sql = "DELETE FROM board WHERE boardID = {$boardID}";
                $connect->query($sql);
                echo "<script>alert('게시글이 삭제되었습니다.');</script>";
            } else {
                echo "<script>alert('자신이 작성한 글만 삭제할 수 있습니다.');</script>";
            }
        } else {
            echo "<script>alert('관리자에게 문의해주세요.');</script>";
        }
    ?>
    <script>
        location.href = "board.php";
    </script>
</body>
</html>