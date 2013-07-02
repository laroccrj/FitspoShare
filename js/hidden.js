$(function(){
   $(".show").click(function(){
       $(this).parent().find(".hidden").css("display", "block");
       $(this).css("display", "none");
   });
});