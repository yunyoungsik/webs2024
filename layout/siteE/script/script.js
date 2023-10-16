$(function(){
    // 슬라이드
    let currentIndex = 0; // 현재 슬라이드
    $(".sliderWrap").append($(".slider").first().clone(true));

    setInterval(() => {
        currentIndex ++;
        $(".sliderWrap").animate({marginLeft: -100 * currentIndex + "%"});

        if(currentIndex == 3){
            setTimeout(() => {
                $(".sliderWrap").animate({marginLeft:0}, 0);
                currentIndex = 0;
            }, 600);
        }
    }, 3000);

    // 메뉴
    $(".nav > ul > li").mouseover(function(){
        $(this).find(".submenu").stop().slideDown();
    });
    $(".nav > ul > li").mouseout(function(){
        $(this).find(".submenu").stop().slideUp(100);
    });

    // 팝업
    $(".popup-btn").click(function(){
        $(".popup-view").show();
    });
    $(".popup-close").click(function(){
        $(".popup-view").hide();
    });
});