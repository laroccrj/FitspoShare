$(function(){
    $(".input").click(function() {
      $(this).find(".overlayed").focus();
    });
    
    $(".overlayed").on("focus", function(){
        $(this).css('position', 'relative');
        $(this).css('z-index', 1);
    })
    
    $(".overlayed").on("focusout", function(){
        if($(this).val() == "")
            $(this).css('z-index', 0);
    })
    
    $(".overlayed").on("change", function(){
        $(this).css('position', 'relative');
        $(this).css('z-index', 1);
    })
});