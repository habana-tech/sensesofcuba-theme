<?php
/*
* Template Name: Full Width
*/
 
// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
 
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo( 'charset' );?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
<?php    
  $newsQuery=new WP_Query(array('category_name'  => 'News'));
  $eventsQuery=new WP_Query(array('category_name'  => 'Events'));
?>
<!-- MENU -->
<div class="menu-container menu-bar">
<div style="position: fixed;top:6px;z-index: 25000;right: 0;margin-right: 5%;cursor: pointer;" onclick="myFunction(this)">
  <div class="bar1" style=" z-index: 25000"></div>
  <div class="bar2" style="z-index: 25000"></div>
  <div class="bar3" style="z-index: 25000"></div>
</div>
</div>

<div id="mySidenav" style="z-index: 1500" class="container sidenav shadow" >
  <a href="http://sensesofcuba.com" class="menuActive" >Home</a>
  <a href="http://sensesofcuba.com/#Profile" >About Us</a>
  <a href="http://sensesofcuba.com/#ourTeam" >Our Team</a>
  <a href="http://sensesofcuba.com/#ProductSection" >Products</a>
  <a href="http://sensesofcuba.com/#MeetUs" >Meet Us</a>
  <a href="http://sensesofcuba.com/#Jobs" >Jobs</a>
  <?php if($eventsQuery->have_posts()):?>  
  <a href="http://sensesofcuba.com/#Events" onclick="activeMenuFunction(this)">Events</a>
  <?php endif;?>
  <?php if($newsQuery->have_posts()):?>  
  <a href="http://sensesofcuba.com/#News" onclick="activeMenuFunction(this)">News</a>
  <?php endif;?>
  <a href="http://sensesofcuba.com/#Testimonial" onclick="activeMenuFunction(this)">Testimonial</a>
  
  <a href="http://sensesofcuba.com/#ContactUs" onclick="activeMenuFunction(this)">Contact Us</a> 
</div>
<div id="logo_img" style=" position:fixed;left: 50%;transform: translate(-50%, 0px);z-index:3000" class="logoImg">
  			<img id="img_logo"  class="mx-auto" src="
<?php  echo get_template_directory_uri() . '/assets/images/soc.png'?>
  			" alt="SenseOfCubaLogo">
  			
		</div>
<!-- END MENU -->

 
<?php wp_head();?>
</head>
 

<body <?php body_class();?>>
<?php if(get_posts('cat=11')):?>
<section  id="News" style="padding-top:50px" >
<div class="fluid-container pb-5 ">
	<div style="text-align: center;margin-top:20px; ">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >ALL </h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">NEWS</h2>
	</div>
	<div class="row mx-auto  p-3">
    <?php		
	foreach (get_posts('cat=11') as $post) {?>

	<div class="col-lg-5 col-md-12 pt-2">
	<section id="<?php echo "new_slider".$post->ID; ?>"  class="carousel slide carousel-fade" data-ride="carousel" >
  <div class="carousel-inner">
	<div class="carousel-item active">
	<?php 
	$image = get_field('image_1');
	$image2 = get_field('image_2');
	$image3 = get_field('image_3');
	if( !empty($image) ): ?>
	<div class="carousel-caption" style="text-shadow:2px 1px 1px #000000">
	  <h5><?php echo $image['caption']; ?></h5>
	</div>
    	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	<?php endif; ?>
	</div>

<?php if( !empty($image2) ): ?>
<div class="carousel-item">
	<div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
		<h5><?php echo $image2['caption']; ?></h5>
	</div>
    <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
</div>
<?php endif; ?>
<?php if( !empty($image3)): ?>
<div class="carousel-item ">
	<div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
	<h5><?php echo $image3['caption']; ?></h5>
	</div>
    	<img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?> " />
	</div>
<?php endif; ?>

</div>
<?php if( !empty($image2) ||!empty($image3) ): ?>
<a class="carousel-control-prev" href="<?php echo "#new_slider".$post->ID; ?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="<?php echo "#new_slider".$post->ID; ?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <?php endif; ?>
</section>
	</div>

	<div class="col-lg-7 col-md-12 pt-2">
	<?php $dateformatstring = "d F, Y";
    $unixtimestamp = strtotime(get_field('new_date'));
    $datePublished=date_i18n($dateformatstring, $unixtimestamp);
	$desc=custom_excerpt(get_post_field('post_content',$post->ID), 125);
	 echo '<h2 style="font-size:20px" class="yellowTitle">'.get_the_title().'</h2>'
	 .'<span style="font-size:10px;color:grey">Published: '.$datePublished.'</span>'.
	  '<p class="card-text" >'.get_post_field('post_content',$post->ID).'</p>'?>
    
	</div>
    

    	<?php } ?>
		<hr/>
	</div>
    
</div>
</section>
<?php endif;?>

<!-- FOOTER -->

<div>
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/up_black.png' ?>" style="width:100%;margin-top: 0px" >
</div>

<div class="container-fluid pt-5 pb-5 pl-1 pr-1 " style="background: url(<?php echo get_template_directory_uri() . '/assets/images/contact_us_Background.jpg'?>); margin-top: -2px" >
	<div class="mx-auto" id="ContactUs">
		
		<div style="text-align: center;margin-bottom:29px; ">
		<h2 class="mx-auto text-white" style="line-height: 25px;" >CONTACT</h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">US</h2>
	</div>
	<div class="container">
		<div class="row col-12 mx-auto">
			<div  class="col-md-6" id="first-item">
				<div style="" class="pb-3 ">
					<span class="titleLeft text-greyColor d-block " >ADDRESS</span>
					<span class="text-light d-block contentLeft" style="font-size: 13px">Bacardi Building-Office 404 Monserrate st.<span>
					<span class="text-light d-block contentLeft" style="font-size: 13px"> -Old Havana, Habana, Cuba.</span>

				</div>
				<div  class="pb-3">
					<span class=" titleLeft d-block text-greyColor " >PHONE</span>
					<span class="text-light d-block contentLeft" style="font-size: 13px" >+53 (0)7866 4734</span>
				</div>
				
				
			</div>

			<div id="company-info" class="col-md-6" >
				<div class="pb-3">
				<span class="text-greyColor-Right d-block" >GENERAL CONTACT</span>
				<span class="text-light d-block dataContact" style="font-size: 13px">info@sensesofcuba.com</span>
				</div>
				
				<div class="pb-3">
				<span class="text-greyColor-Right d-block">SALES</span>
				<span class="text-light d-block dataContact" style="font-size: 13px">sales@sensesofcuba.com</span>
				</div>
				<div class="pb-3">
				<span class="text-greyColor-Right d-block">PRODUCT MANAGEMENT</span>
				<span class="text-light d-block dataContact" style="font-size: 13px">product@sensesofcuba.com</span>
				</div>
			</div>
			<div>
				
			</div>
		</div>
		<div class="mx-auto" style="width: 300px">
		<p class="text-white" style="font-size: 14px;text-align: center;" class="regularText"></p>
		<ul style="width: 300px;text-align: center;margin: auto;font-size: 13px" class="text-white">
			<li class="text-grey" >OPENNING HOURS</li>
			<li>Monday-Sunday: 09:00-17:00</li>
			<li>Saturday-Sunday(and public holiday): </li>
			<li> 10:00-16:00</li>
		</ul>
		
		</div>
		</div>
	</div>

</div>
<!--TIRA HAVANA-->

<div>
	<img style="width: 100%" src="<?php echo get_template_directory_uri() . '/assets/images/Tira-Habana.jpg' ?>" alt="Havana">
</div>

<!--END TIRA HAVANA-->


<div class="yellowBackground container-fluid" class="p-5">

	<span class="mx-auto d-block pt-4" style="width: 175px">© All rights reserved</span>
	<div id="inline" class="mx-auto" style="width: 315px">
		<a  id="fancybox" class="fancy">Imprint</a> | <a class="fancy"  id="fancybox-Date">Privacy Policy</a> | <a class="fancy"  id="fancybox-Cooperators">Cooperations</a> 
	</div>
	<div id="inline" class="mx-auto pb-1" style="width: 315px;text-align:center">
		<a  id="fancybox-general" class="fancy">General Terms and Conditions</a>
	</div>
</div>

<?php wp_footer();?>

<!-- END FOOTER -->

<script>
$(function () {
		$('li.indicatorCarrusel:first-child').addClass('active');
        $('#testimonial .item.carousel-item:first-child').addClass('active');
        $('[data-toggle="tooltip"]').tooltip();
        $("#data").fancybox(); 
        $("#fancybox-general").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_generalConditions.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});
        $("#fancybox").click(function(){
            $.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_impresum.html"?>',
            type:'iframe',
            padding:15,
            openEffect:'elastic',
            openSpeed:150,
            closeEffect:'elastic',
            closeSpeed:150,closeClick:true});
            });

            $("#fancybox-Date").click(
                function(){
                    $.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_datens.html"?>',
                    type:'iframe',
                    padding:15,
                    openEffect:'elastic',
                    openSpeed:150,
                    closeEffect:'elastic',
                    closeSpeed:150,
                    closeClick:true});
                    });
                    $("#fancybox-Cooperators").click(function(){
                        $.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_colaborators.html"?>',
                        type:'iframe',
                        padding:15,
                        openEffect:'elastic',openSpeed:150,
                        closeEffect:'elastic',closeSpeed:150,
                        closeClick:true});});
                        
                        
	});

    


$(function () {
		$('li.indicatorCarrusel:first-child').addClass('active');$('#testimonial .item.carousel-item:first-child').addClass('active');$('[data-toggle="tooltip"]').tooltip();$("#data").fancybox(); $("#fancybox").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_impresum.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});$("#fancybox-Date").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_datens.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});$("#fancybox-Cooperators").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_colaborators.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});
        
	});
    


function openNav() {
    document.getElementById("mySidenav").style.right = "0px";
}
function myFunction(x) {
    x.classList.toggle("change");x.classList.toggle("text-dark");if (x.classList[0]=="change")document.getElementById("mySidenav").style.right = "0px";else document.getElementById("mySidenav").style.right = "-250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.right = "-250px";
}
$(document).scroll(
    function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop >= 0 ) 
        {
           
            $('.menu-container').addClass('menu-bar');
            var logotext=$('#img_logo').attr('src').split('/')[$('#img_logo').attr('src').split('/').length-1];
            if (logotext="logo.png" ) 
            {
                $('#img_logo').attr('src',$('#img_logo').attr('src').replace('logo','soc'));
            }
            
            // $('#logo_img').removeClass('ImgBar').addClass('logoImgBar');
            // $('#img_logo,#logo_img').css('top','8px');
        }
       
    });
</script>