$(function(){
    // 이미지 슬라이드
    let currentIndex = 0; // 현재 이미지 설정
    $(".sliderWrap").append($(".slider").first().clone(true)); // 첫번째 이미지 복사
    
    setInterval(() => {
        currentIndex ++;
        $(".sliderWrap").animate({marginTop: -350 * currentIndex + "px"}, 600);
        
        if(currentIndex == 3){
            setTimeout(() => {
                $(".sliderWrap").animate({marginTop: 0}, 0);
                currentIndex = 0;
            }, 700);
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