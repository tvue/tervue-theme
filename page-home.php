<?php /**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tervue-theme
 */
?>
<body class = "mainPage">
<div class="page">

<?php get_header('home'); ?>

      <div class="row hidden">
        <div class="column">
          <a href="http://www.tervue.com/about/"><div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/library/images/aboutMe.png" alt="About"></div></a>
          <h2>ABOUT ME</h2>
          <p>I am a web designer/developer at CALS IT</p>
        </div>

        <div class="column">
          <a href="http://www.tervue.com/projects/"><div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/library/images/projects.png" alt="Projects"></div></a>
          <h2>PROJECTS</h2>
          <p>Find out more about my work and personal projects</p>
        </div>
        <div class="column">
          <a href="http://www.tervue.com/contact/"><div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/library/images/contact.png" alt="Contact"></div></a>
          <h2>CONTACT</h2>
          <p>Message me!</p>
        </div>
      </div>
    <!-- <div class="imageFooter">
<img src="<?php echo get_template_directory_uri(); ?>/library/images/hmongSwirl.png" alt=" ">
    </div> -->

<!--PARALLAX SCROLLING!-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
         function parallaxIt(obj,ratio,imgtype,following,header) {
           if(!header) {
             header = false;
           }

           $(window).scroll(function() {
             var offset = obj.offset().top;
             var objH = obj.height();
             var wH = $(window).height();
             var newtop = $(window).scrollTop();

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
                 if(offset<(newtop+wH) && (offset+objH)>(newtop-objH)) {


                   if(header) {

                     
                     if($(obj).next().attr("id") == "cholder") {
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
           var offset = $(".header " + obj).offset().top;
           var objH = $(".header " + obj).height();


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
</script>
  

<?php get_footer(); ?>
</div>
<div class="sideMenu">
   <div class ="close"><img src="<?php echo get_template_directory_uri(); ?>/library/images/closeButton.svg" alt=" "></div>
      <div class="sideMenuNav">
        <h2>MENU</h2>
    <?php //Get wp_nav
    wp_nav_menu( array( 'menu' => 'primary' ) ); ?>
 </div>
</div>
</body>