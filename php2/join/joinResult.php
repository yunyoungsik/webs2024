<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youId = mysqli_real_escape_string($connect, $_POST['youId']);
    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);
    $youPass = mysqli_real_escape_string($connect, $_POST['youPass']);
    $youPhone = mysqli_real_escape_string($connect, $_POST['youPhone']);
    $youAddress1 = mysqli_real_escape_string($connect, $_POST['youAddress1']);
    $youAddress2 = mysqli_real_escape_string($connect, $_POST['youAddress2']);
    $youAddress3 = mysqli_real_escape_string($connect, $_POST['youAddress3']);
    $youAddress = $youAddress1 . " " . $youAddress2 . " " . $youAddress3;
    $youRegTime = time();

    $sql = "INSERT INTO myMembers(youId, youName, youEmail, youPass, youPhone, youAddress, youRegTime) VALUES ('$youId', '$youName', '$youEmail', '$youPass', '$youPhone', '$youAddress', '$youRegTime')";

    $connect -> query($sql);

    // 데이터 베이스 연결 닫기
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
    <!-- CSS -->
    <?php include "../include/head.php"?>
</head>
<body class="white">
    <?php include "../include/skip.php"?>
    <!-- //skip -->

    <?php include "../include/header.php"?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img main">
                <img srcset="../asset/img/img01.jpg 1x, ../asset/img/img01@2x.jpg 2x, ../asset/img/img01@3x.jpg 3x" alt="인트로 이미지">
            </div>
        </div>
        
        <section class="join__inner container">
            <h2>회원가입 완료</h2>
            <div class="join__index">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li class="active">3</li>
                </ul>
            </div>
            <div class="result__inner">
                <p>
                    회원가입을 축하드립니다.<br>
                    로그인을 해주세요!
                </p>
                <div id="container" background="https://wallpaperscraft.com/image/mountains_night_sky_road_bends_darkness_63269_1920x1080.jpg"></div>
                <div class="intro__btn">
                    <a href="login.php">로그인</a>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <footer id="footer" role="contentinfo">
        <div class="footer__inner container btStyle">
            <div>Copyright 2023 yunyoungsik</div>
            <div>blog by yys</div>
        </div>
    </footer>
    <!-- //footer -->

    <script>
        var bits=80; // how many bits
        var speed=45; // how fast - smaller is faster
        var bangs=5; // how many can be launched simultaneously (note that using too many can slow the script down)
        var colours=new Array("#03f", "#f03", "#0e0", "#93f", "#0cf", "#f93", "#f0c"); 
        //                     blue    red     green   purple  cyan    orange  pink

        /****************************
        *      Fireworks Effect     *
        *(c)2016 https://codepen.io/HarshHS/ *

        ****************************/
        var bangheight=new Array();
        var intensity=new Array();
        var colour=new Array();
        var Xpos=new Array();
        var Ypos=new Array();
        var dX=new Array();
        var dY=new Array();
        var stars=new Array();
        var decay=new Array();
        var swide=800;
        var shigh=600;
        var boddie;

        if (typeof('addRVLoadEvent')!='function') function addRVLoadEvent(funky) {
        var oldonload=window.onload;
        if (typeof(oldonload)!='function') window.onload=funky;
        else window.onload=function() {
            if (oldonload) oldonload();
            funky();
        }
        }

        addRVLoadEvent(light_blue_touchpaper);

        function light_blue_touchpaper() { if (document.getElementById) {
        var i;
        boddie=document.createElement("div");
        boddie.style.position="fixed";
        boddie.style.top="0px";
        boddie.style.left="0px";
        boddie.style.overflow="visible";
        boddie.style.width="1px";
        boddie.style.height="1px";
        boddie.style.backgroundColor="transparent";
        document.body.appendChild(boddie);
        set_width();
        for (i=0; i<bangs; i++) {
            write_fire(i);
            launch(i);
            setInterval('stepthrough('+i+')', speed);
        }
        }}

        function write_fire(N) {
        var i, rlef, rdow;
        stars[N+'r']=createDiv('|', 12);
        boddie.appendChild(stars[N+'r']);
        for (i=bits*N; i<bits+bits*N; i++) {
            stars[i]=createDiv('*', 13);
            boddie.appendChild(stars[i]);
        }
        }

        function createDiv(char, size) {
        var div=document.createElement("div");
        div.style.font=size+"px monospace";
        div.style.position="absolute";
        div.style.backgroundColor="transparent";
        div.appendChild(document.createTextNode(char));
        return (div);
        }

        function launch(N) {
        colour[N]=Math.floor(Math.random()*colours.length);
        Xpos[N+"r"]=swide*0.5;
        Ypos[N+"r"]=shigh-5;
        bangheight[N]=Math.round((0.5+Math.random())*shigh*0.4);
        dX[N+"r"]=(Math.random()-0.5)*swide/bangheight[N];
        if (dX[N+"r"]>1.25) stars[N+"r"].firstChild.nodeValue="/";
        else if (dX[N+"r"]<-1.25) stars[N+"r"].firstChild.nodeValue="\\";
        else stars[N+"r"].firstChild.nodeValue="|";
        stars[N+"r"].style.color=colours[colour[N]];
        }

        function bang(N) {
        var i, Z, A=0;
        for (i=bits*N; i<bits+bits*N; i++) { 
            Z=stars[i].style;
            Z.left=Xpos[i]+"px";
            Z.top=Ypos[i]+"px";
            if (decay[i]) decay[i]--;
            else A++;
            if (decay[i]==15) Z.fontSize="7px";
            else if (decay[i]==7) Z.fontSize="2px";
            else if (decay[i]==1) Z.visibility="hidden";
            if (decay[i]>1 && Math.random()<.1) {
            Z.visibility="hidden";
            setTimeout('stars['+i+'].style.visibility="visible"', speed-1);
            }
            Xpos[i]+=dX[i];
            Ypos[i]+=(dY[i]+=1.25/intensity[N]);

        }
        if (A!=bits) setTimeout("bang("+N+")", speed);
        }

        function stepthrough(N) { 
        var i, M, Z;
        var oldx=Xpos[N+"r"];
        var oldy=Ypos[N+"r"];
        Xpos[N+"r"]+=dX[N+"r"];
        Ypos[N+"r"]-=4;
        if (Ypos[N+"r"]<bangheight[N]) {
            M=Math.floor(Math.random()*3*colours.length);
            intensity[N]=5+Math.random()*4;
            for (i=N*bits; i<bits+bits*N; i++) {
            Xpos[i]=Xpos[N+"r"];
            Ypos[i]=Ypos[N+"r"];
            dY[i]=(Math.random()-0.5)*intensity[N];
            dX[i]=(Math.random()-0.5)*(intensity[N]-Math.abs(dY[i]))*1.25;
            decay[i]=16+Math.floor(Math.random()*16);
            Z=stars[i];
            if (M<colours.length) Z.style.color=colours[i%2?colour[N]:M];
            else if (M<2*colours.length) Z.style.color=colours[colour[N]];
            else Z.style.color=colours[i%colours.length];
            Z.style.fontSize="13px";
            Z.style.visibility="visible";
            }
            bang(N);
            launch(N);
        }
        stars[N+"r"].style.left=oldx+"px";
        stars[N+"r"].style.top=oldy+"px";
        } 

        window.onresize=set_width;
        function set_width() {
        var sw_min=999999;
        var sh_min=999999;
        if (document.documentElement && document.documentElement.clientWidth) {
            if (document.documentElement.clientWidth>0) sw_min=document.documentElement.clientWidth;
            if (document.documentElement.clientHeight>0) sh_min=document.documentElement.clientHeight;
        }
        if (typeof(self.innerWidth)!="undefined" && self.innerWidth) {
            if (self.innerWidth>0 && self.innerWidth<sw_min) sw_min=self.innerWidth;
            if (self.innerHeight>0 && self.innerHeight<sh_min) sh_min=self.innerHeight;
        }
        if (document.body.clientWidth) {
            if (document.body.clientWidth>0 && document.body.clientWidth<sw_min) sw_min=document.body.clientWidth;
            if (document.body.clientHeight>0 && document.body.clientHeight<sh_min) sh_min=document.body.clientHeight;
        }
        if (sw_min==999999 || sh_min==999999) {
            sw_min=800;
            sh_min=600;
        }
        swide=sw_min;
        shigh=sh_min;
        }
        // ]]>
    </script>
</body>
</html>