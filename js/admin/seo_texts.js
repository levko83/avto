$(document).ready(function(){
   $("div.region").toggle(
       function(){
           var region = $(this).attr("region");
           $("ul[region=" + region + "]").show(150);
       },
       function(){
           var region = $(this).attr("region");
           $("ul[region=" + region + "]").hide(150);
       }
   );
});
