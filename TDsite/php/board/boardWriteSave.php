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

    // $memberId =  $_SESSION['memberId'];
    // $boardAuthor = $_SESSION['youName'];
    $memberId = 1;
    $boardAuthor = "이이이";
    
    $boardTitle = $_POST['boardTitle'];
    $boardContents = nl2br($_POST['boardContents']);

    $boardView = 1;
    $boardLike = 0;
    $boardRegTime = time();
    $boardDelete = 1;

    $boardFile = $_FILES['boardFile'];
    $boardImgSize = $_FILES['boardFile']['size'];
    $boardImgType = $_FILES['boardFile']['type'];
    $boardImgName = $_FILES['boardFile']['name'];
    $boardImgTmp = $_FILES['boardFile']['tmp_name'];

    // echo "<pre>";
    // var_dump($boardFile);
    // echo "</pre>";


    if($boardImgType){
        $fileTypeExtension = explode("/", $boardImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        // 이미지 타입 확인
        if($fileType === "image"){
            if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                $boardImgDir = "../../assets/board/";
                $boardImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle',  '$boardContents', '보류', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', '$boardImgName', '$boardImgSize', '$boardDelete');";
                $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
            } else {
                echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
            }
            echo "<script>alert('이미지 파일 형식이 맞습니다.')</script>";
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        $sql = "INSERT INTO FBoard(memberID, fTitle, fContents, fCategory, fAuthor, fRegTime, fView, fLike, fImgFile, fImgSize, fDelete) VALUES('$memberId', '$boardTitle', '$boardContents', '보류', '$boardAuthor', '$boardRegTime', '$boardView', '$boardLike', 'Img_default.jpg', '$boardImgSize', '$boardDelete');";
    }

    // 이미지 사이즈 확인
    if($boardImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 초과되었습니다. 최대 용량은 1MB입니다.')</script>";
    }

    $result = $connect -> query($sql);

    if($result){
        echo "<script>alert('저장이 완료되었습니다.')</script>";
        echo "<script>window.location.href = 'board.php';</script>";
    }
?>
</body>
</html>