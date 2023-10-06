<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // $boardTitle = $_POST['boardTitle'];
    // $boardContents = $_POST['boardContents'];
    // $memberID = $_SESSION['memberID'];

    // $boardTitle = $connect -> real_escape_string($boardTitle);
    // $boardTitle = $connect -> real_escape_string($boardContents);

    
    // $sql = "";
    // $connect -> query($sql);

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $memberID = $_SESSION['memberID'];
    $memberPass = $connect->real_escape_string($_POST['boardPass']); // 사용자가 입력한 비밀번호

    // 사용자의 ID와 비밀번호를 이용하여 인증
    $sql = "SELECT * FROM member WHERE memberID = '$memberID' AND youPass = '$memberPass'";
    $result = $connect -> query($sql);

    if($result->num_rows > 0) {
        // 비밀번호가 일치하면 게시글을 수정합니다.
        $boardID = $connect->real_escape_string($_GET['boardID']);

        $sql = "UPDATE board SET boardTitle = '$boardTitle', boardContents = '$boardContents' WHERE boardID = $boardID";
        $connect->query($sql);

        echo "<script>alert('게시글이 수정되었습니다.');</script>";
    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
    }
    
    echo "<script>location.href = 'board.php';</script>";
?>