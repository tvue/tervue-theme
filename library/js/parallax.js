( function( $ ) {

  /***** Main Parallax/position functions ******/


       function parallaxIt(obj,ratio,imgtype,following,header) {
           if(!header) {
             header = false;
           }

          //console.log("parallaxit running");

           $(window).scroll(function() {
             //var followingObj = following;
             var offset = obj.offset().top;
             var objH = obj.height();
             var wH = $(window).height();
             var newtop = $(window).scrollTop();
             //newtophalf = ""+(((newtop+(wH/2))-offset) * ratio) +"px";
             //console.log(newtophalf);

             if(imgtype == "background") {
               if(header) {
                 newtophalf = ""+(50 - ((newtop-offset) * ratio)) +"%";
                 headertranslate = "50% "+newtophalf+"";
               } else {
                 newtophalf = ""+((newtop-offset) * ratio) +"px";
                 headertranslate = "0px "+newtophalf+"";
               }

               if(offset<(newtop+wH) && (offset+objH)>(newtop-objH)) {
                 //console.log("in view");
                 $(obj).css("background-position",headertranslate);
                 $(following).css("background-position",headertranslate);
               }
             } else {
                 //console.log(header);
                 //newtophalf = ""+(((newtop+(wH/2))-offset) * ratio) +"px";
                 //headertranslate = "translate(0px,"+newtophalf+")";

                 if(offset<(newtop+wH) && (offset+objH)>(newtop-objH)) {
                   //console.log("in view");


                   if(header) {
                     //$(obj).css("position","fixed");
                     //$(".headerFeatures").css("height","400");

                     //console.log(headertranslate)
                     if($(obj).next().attr("id") == "cholder") {
                       //console.log("found cholder");
                       //$("#main #cholder").css("transform",headertranslate);
                       //$("#main3 #cholder").css("transform",headertranslate);
                     } else {
                       newtophalf = ""+(newtop / (1+ratio)) +"px";
                       newtop = "-"+newtop+"px";
                       newtranslate = "translate3d(0px,"+newtop+",0px)";
                       headertranslate = "translate3d(0px,"+newtophalf+",0px)";

                       $(obj).css("transform",headertranslate);
                       $(following).css("transform",headertranslate);
                     }


                   } else {
                     $(obj).css("transform",headertranslate);
                     $(following).css("transform",headertranslate);
                   }
                 }


             }

           });
       }




       function inView(obj,threshholdBottom,threshholdTop) {
           var offset = $("#container " + obj).offset().top;
           var objH = $("#container " + obj).height();


           function calcView() {
             var wH = $(window).height();
             var newtop = $(window).scrollTop();

                //console.log("object: "+offset + " " + (newtop+wH) + "   maxobj: " + (offset+objH)+" "+(newtop-objH));
               if(((offset+threshholdBottom)<(newtop+wH)) && ((offset-threshholdTop)>(newtop-objH))) {

                 $(obj).addClass("inView");

               } else {

                 $(obj).removeClass("inView");
               }
           }

           $(window).scroll(function() {
             calcView();

           });

           calcView();
       }


       parallaxIt($(".site-branding"),0.13,'background','',true);


} )( jQuery );
