<?php
    include "../connect/connect.php";
    include "../connect/session.php";

//     echo"<pre>";
//     var_dump($_SESSION);
//     echo"</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <!-- CSS -->
    <?php include "../include/head.php"?>
</head>
<body class="black">
    <?php include "../include/skip.php"?>
    <!-- //skip -->

    <?php include "../include/header.php"?>
    <!-- //header -->

    <main id="main" role="main">
    <div class="intro__inner bmStyle container">
            <div class="intro__img">
                <img srcset="../asset/img/N_logo.jpg 1x, ../asset/img/N_logo@2x-min.jpg 2x, ../asset/img/N_logo@3x-min.jpg 3x" alt="인트로 이미지">
            </div>
            <div class="intro__text">
                회원가입을 해주시면 다양한 정보를 자유롭게 볼 수 있습니다.
            </div>
        </div>
        <section class="join__inner container">
            <h2>이용약관</h2>
            <div class="join__index">
                <ul>
                    <li class="active">1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="join__agree">
                <div class="agree__box">
                    <h3 class="blind">yss 블로그 이용약관</h3>
                    <div class="scroll">
                        블로그 이용약관
                        서비스 내용: 어떤 서비스를 제공할 것인지에 대한 설명
                        이용자 의무사항: 이용자가 준수해야 할 규정이나 규칙
                        서비스 이용료 및 결제 방법 (선택사항): 유료 서비스의 경우 이용자가 지불해야 할 요금과 결제 방법에 대한 내용
                        서비스 제공 중지 및 이용계약 해지 방침: 서비스 중지나 계약 해지에 대한 절차와 방법에 대한 설명

                        블로그 이용약관
                        서비스 내용: 어떤 서비스를 제공할 것인지에 대한 설명
                        이용자 의무사항: 이용자가 준수해야 할 규정이나 규칙
                        서비스 이용료 및 결제 방법 (선택사항): 유료 서비스의 경우 이용자가 지불해야 할 요금과 결제 방법에 대한 내용
                        서비스 제공 중지 및 이용계약 해지 방침: 서비스 중지나 계약 해지에 대한 절차와 방법에 대한 설명

                        블로그 이용약관
                        서비스 내용: 어떤 서비스를 제공할 것인지에 대한 설명
                        이용자 의무사항: 이용자가 준수해야 할 규정이나 규칙
                        서비스 이용료 및 결제 방법 (선택사항): 유료 서비스의 경우 이용자가 지불해야 할 요금과 결제 방법에 대한 내용
                        서비스 제공 중지 및 이용계약 해지 방침: 서비스 중지나 계약 해지에 대한 절차와 방법에 대한 설명

                        블로그 이용약관
                        서비스 내용: 어떤 서비스를 제공할 것인지에 대한 설명
                        이용자 의무사항: 이용자가 준수해야 할 규정이나 규칙
                        서비스 이용료 및 결제 방법 (선택사항): 유료 서비스의 경우 이용자가 지불해야 할 요금과 결제 방법에 대한 내용
                        서비스 제공 중지 및 이용계약 해지 방침: 서비스 중지나 계약 해지에 대한 절차와 방법에 대한 설명

                        블로그 이용약관
                        서비스 내용: 어떤 서비스를 제공할 것인지에 대한 설명
                        이용자 의무사항: 이용자가 준수해야 할 규정이나 규칙
                        서비스 이용료 및 결제 방법 (선택사항): 유료 서비스의 경우 이용자가 지불해야 할 요금과 결제 방법에 대한 내용
                        서비스 제공 중지 및 이용계약 해지 방침: 서비스 중지나 계약 해지에 대한 절차와 방법에 대한 설명
                    </div>
                    <div class="check">
                        <input type="checkbox" name="agreeCheck1" id="agreeCheck1">
                        <label for="agreeCheck1">블로그 이용약관 동의합니다.</label>
                    </div>
                </div>
                <div class="agree__box">
                    <h3 class="blind">yss 블로그 개인정보취급방침</h3>
                    <div class="scroll">
                        개인정보취급방침
                        수집하는 개인정보 항목: 어떤 종류의 개인정보를 수집하는지에 대한 설명
                        개인정보의 수집 및 이용목적: 수집한 개인정보를 어떤 목적으로 사용하는지에 대한 설명
                        개인정보의 보유 및 이용기간: 수집한 개인정보를 얼마나 오래 보유하고 사용하는지에 대한 내용
                        개인정보의 파기절차 및 방법: 개인정보를 파기하는 절차와 방법에 대한 설명
                        개인정보 제공 및 공유: 수집한 개인정보를 외부와 어떻게 공유하고 제공하는지에 대한 내용
                        이용자의 권리와 의무: 이용자가 개인정보 수집 및 이용에 대한 권리와 의무에 대한 내용
                        쿠키 및 유사 기술의 이용: 쿠키 등을 사용하는 경우에 대한 설명
                        개인정보 보호책임자 및 담당자 연락처: 개인정보 관리에 대한 책임자와 연락처 정보

                        개인정보취급방침
                        수집하는 개인정보 항목: 어떤 종류의 개인정보를 수집하는지에 대한 설명
                        개인정보의 수집 및 이용목적: 수집한 개인정보를 어떤 목적으로 사용하는지에 대한 설명
                        개인정보의 보유 및 이용기간: 수집한 개인정보를 얼마나 오래 보유하고 사용하는지에 대한 내용
                        개인정보의 파기절차 및 방법: 개인정보를 파기하는 절차와 방법에 대한 설명
                        개인정보 제공 및 공유: 수집한 개인정보를 외부와 어떻게 공유하고 제공하는지에 대한 내용
                        이용자의 권리와 의무: 이용자가 개인정보 수집 및 이용에 대한 권리와 의무에 대한 내용
                        쿠키 및 유사 기술의 이용: 쿠키 등을 사용하는 경우에 대한 설명
                        개인정보 보호책임자 및 담당자 연락처: 개인정보 관리에 대한 책임자와 연락처 정보

                        개인정보취급방침
                        수집하는 개인정보 항목: 어떤 종류의 개인정보를 수집하는지에 대한 설명
                        개인정보의 수집 및 이용목적: 수집한 개인정보를 어떤 목적으로 사용하는지에 대한 설명
                        개인정보의 보유 및 이용기간: 수집한 개인정보를 얼마나 오래 보유하고 사용하는지에 대한 내용
                        개인정보의 파기절차 및 방법: 개인정보를 파기하는 절차와 방법에 대한 설명
                        개인정보 제공 및 공유: 수집한 개인정보를 외부와 어떻게 공유하고 제공하는지에 대한 내용
                        이용자의 권리와 의무: 이용자가 개인정보 수집 및 이용에 대한 권리와 의무에 대한 내용
                        쿠키 및 유사 기술의 이용: 쿠키 등을 사용하는 경우에 대한 설명
                        개인정보 보호책임자 및 담당자 연락처: 개인정보 관리에 대한 책임자와 연락처 정보
                    </div>
                    <div class="check">
                        <input type="checkbox" name="agreeCheck2" id="agreeCheck2">
                        <label for="agreeCheck2">블로그 개인정보 수집 및 이용에 동의합니다.</label>
                    </div>
                </div>
                <button id="agreeButton" class="btn__style">동의하기</button>
            </div>
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script>
        document.getElementById("agreeButton").addEventListener("click", () => {
            const agreeCheck1 = document.getElementById("agreeCheck1");
            const agreeCheck2 = document.getElementById("agreeCheck2");

            if(agreeCheck1.checked && agreeCheck2.checked){
                window.location.href = "joinInsert.php";
            } else {
                alert("이용약관 및 개인정보취급방침을 동의해주세요.");
            }
        });
    </script>
</body>
</html>