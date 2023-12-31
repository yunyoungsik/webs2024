<nav id="nav">
    <div class="container">
        <ul>
            <li>
                스마트폰
                <ul class="submenu">
                    <li><a href="../phone/phone.php">삼성</a></li>
                    <li><a href="../phone/phone.php">애플</a></li>
                    <li><a href="../phone/compare.php">제품비교하기</a></li>
                    <li><a href="../phone/review.php">제품리뷰</a></li>
                </ul>
            </li>
            <li>
                커뮤니티
                <ul class="submenu">
                    <li><a href="../notice/notice.php">공지사항</a></li>
                    <li><a href="../board/board.php">자유게시판</a></li>
                </ul>
            </li>
            <li>
                고객센터
                <ul class="submenu">
                    <li><a href="../support/support.php">문의하기</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    // 메뉴
    let header = document.querySelector("#header");
    let nav = document.querySelector("#nav");
    let hamMenu = document.querySelector("#header .header__ham");
    let hamShape = document.querySelector("#header .header__ham div");
    function showNav() {
        nav.style.height = "360px";
        hamShape.classList.add("hamX");
        hamShape.classList.remove("ham");
    };
    function hideNav() {
        nav.style.height = "0";
        hamShape.classList.add("ham");
        hamShape.classList.remove("hamX");
    };
    hamMenu.addEventListener("mouseover", showNav);
    hamMenu.addEventListener("mouseout", hideNav);
    nav.addEventListener("mouseover", showNav);
    nav.addEventListener("mouseout", hideNav);
</script>