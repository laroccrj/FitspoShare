$("#leftArrow").click(function () {
        console.log($("body").scrollTop());
    }
);

$(function () {
    
        $(window).scroll(
                function(){
                    $(".arrow").css("top", $(window).scrollTop() + "px");
                }
        );
        
    });

