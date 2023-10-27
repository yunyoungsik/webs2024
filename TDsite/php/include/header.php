<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>
<header id="header">
    <div class="container">
        <div class="header__menu">
            <div class="header__ham">
                <div class="ham">
                    <a href="#">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
        <h1><a href="../main/main.php">Trend Device</a></a></h1>
        <div class="header__etc">
           
<?php   if(isset($_SESSION['youName'])){ ?>
            <div><?php echo$_SESSION['youName'] ?> 님 어서오세요.</div>
            <div class="header__user">
                <a href="../mypage/mypage.php"><img src="../../assets/img/user.png" alt="마이페이지"></a>
            </div>
<?php   }else{ ?>
            <div class="header__user">
                <a href="../join/join.php"><img src="../../assets/img/user.png" alt="회원"></a>

            </div>                    
 <?php  }?>
            
                
          
        </div>
        <?php
            $currentURL = $_SERVER['REQUEST_URI'];

            if (strpos($currentURL, 'login.php') !== false) {
                $pageTitle = '로그인';
            } elseif (strpos($currentURL, 'join.php') !== false) {
                $pageTitle = '회원가입';
            } elseif (strpos($currentURL, 'joinSuccess.php') !== false) {
                $pageTitle = '회원가입';
            }
        ?>
        <div class="board__name">
            <?php echo $pageTitle; ?>
        </div>
    </div>
</header>