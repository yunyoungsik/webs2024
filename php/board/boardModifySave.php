<?php
    // 데이터베이스 연결 및 세션 시작
    include "../connect/connect.php";
    include "../connect/session.php";

    // boardID와 boardPass 가져오기
    $boardID = $_POST['boardID'];
    $boardPass = $_POST['boardPass']; // 사용자가 입력한 비밀번호

    // 게시글 정보 및 현재 사용자 정보 가져오기
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $memberID = $_SESSION['memberID'];

    // 입력값을 이스케이프하여 SQL 인젝션 방어
    $boardTitle = $connect->real_escape_string($boardTitle);
    $boardContents = $connect->real_escape_string($boardContents);

    // 사용자의 비밀번호를 데이터베이스에서 가져옵니다.
    $sql = "SELECT youPass, memberID FROM members WHERE memberID = '$memberID'";
    $result = $connect->query($sql);

    if ($result) {
        $info = $result->fetch_array(MYSQLI_ASSOC);
        $userPass = $info['youPass'];
        $userID = $info['memberID'];

        // 입력한 비밀번호와 저장된 비밀번호를 직접 비교합니다.
        if ($boardPass === $userPass) {
            // 비밀번호가 일치하면 게시물의 작성자와 현재 사용자를 비교하여 글 작성자인지 확인합니다.
            $sql = "SELECT memberID FROM board WHERE boardID = '$boardID'";
            $CheckAuthor = $connect->query($sql);

            if ($CheckAuthor) {
                $Info = $CheckAuthor->fetch_array(MYSQLI_ASSOC);
                $authorID = $Info['memberID'];

                if ($authorID === $userID) {
                    // 현재 사용자가 글 작성자인 경우에만 수정을 허용합니다.

                    // 게시물 수정 쿼리
                    $sql = "UPDATE board SET boardTitle = '$boardTitle', boardContents = '$boardContents' WHERE boardID = '$boardID'";
                    
                    if ($connect->query($sql)) {
                        // 성공적으로 수정되었을 때 경고 메시지 표시 및 페이지 리디렉션
                        echo "<script>alert('글이 성공적으로 수정되었습니다.'); window.location.href = 'board.php';</script>";
                    } else {
                        // 수정 실패 시 오류 메시지 표시
                        echo "<script>alert('글 수정에 실패했습니다.'); window.location.href = 'board.php';</script>";
                    }
                } else {
                    // 글 작성자가 아닌 경우 메시지 표시
                    echo "<script>alert('글 작성자만 수정할 수 있습니다.'); window.location.href = 'board.php';</script>";
                }
            } else {
                // 쿼리 오류 처리
                echo "<script>alert('글 수정에 실패했습니다.'); window.location.href = 'board.php';</script>";
            }
        } else {
            // 비밀번호가 일치하지 않으면 오류 메시지 표시
            echo "<script>alert('비밀번호가 일치하지 않습니다.'); window.location.href = 'board.php';;</script>";
        }
    } else {
        // 쿼리 오류 처리
        echo "<script>alert('글 수정에 실패했습니다.'); window.location.href = 'board.php';</script>";
    }

    //수정하기 버튼을 작성자만 누를수 있게


//     include "../connect/connect.php";
//     include "../connect/session.php";

//     $boardID = $_POST['boardID'];
//     $boardTitle = $_POST['boardTitle'];
//     $boardContents = $_POST['boardContents'];
//     $memberID = $_SESSION['memberID'];

// echo "boardID: " . $boardID . "<br>";
// echo "boardTitle: " . $boardTitle . "<br>";
// echo "boardContents: " . $boardContents . "<br>";
// echo "memberID: " . $memberID . "<br>";

//     // 사용자의 ID와 비밀번호를 이용하여 인증
//     $boardPass = $connect->real_escape_string($_POST['boardPass']); // 사용자가 입력한 비밀번호

//     $sql = "SELECT * FROM members WHERE memberID = '$memberID' AND youPass = '$boardPass'";
//     $result = $connect->query($sql);

//     if($result->num_rows > 0) {
//         // 비밀번호가 일치하면 해당 boardID의 게시글을 수정합니다.
//         $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = {$boardID}";
//         $connect->query($sql);
//         echo "<script>alert('게시글이 수정되었습니다.');</script>";
//     } else {
//         echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
//     }
//     // echo "<script>location.href = 'board.php';</script>";
?>