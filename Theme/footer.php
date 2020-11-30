<?php /*
Aquí va el contenido del pie de página
*/?>
<!--<div style="height: 50px;top:-27px;">
	<img src="<?php echo  get_template_directory_uri() . '/assets/images/up_black.png'?>'" style="width: 100%" alt="border black">
</div>-->
<div  id="ContactUs">
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/up_black.png' ?>" style="width:100%;margin-top: 0px" >
</div>

<div class="container-fluid pt-5 pb-3 pl-1 pr-1" style="background-image:url('<?php echo  get_template_directory_uri() . '/assets/images/contact_us_Background.jpg'?>'); margin-top: -2px" >
	<div class="mx-auto">
		
		<div style="text-align: center;margin-bottom:29px; ">
		<h2 class="mx-auto text-white" style="line-height: 25px;" >CONTACT</h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">US</h2>
	</div>
	<div class="container">
		<div class="row col-12 mx-auto">
			<div  class="col-md-6" id="first-item">
				<div style="" class="pb-2 ">
					<span class="titleLeft text-greyColor d-block " >ADDRESS</span>
					<span class="text-light d-block contentLeft" style="font-size: 13px">Edificio Bacardí, Oficina 404, Calle Monserrate 261  </span>
					<span class="text-light d-block contentLeft" style="font-size: 13px">10100, La Habana Vieja, Havana, Cuba.</span>

				</div>
				<div  class="pb-1">
					<span class=" titleLeft d-block text-greyColor " >PHONE</span>
					<span class="text-light d-block contentLeft" style="font-size: 13px" >+53 7866 4734</span>
				</div>
				<div  class="pb-2">
					<span class=" titleLeft d-block text-greyColor " >EMERGENCY PHONE</span>
					<span class="text-light d-block contentLeft" style="font-size: 13px" >+53 5911 0796</span>
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
			<li class="text-grey" >OPENING TIMES</li>
			<li>Monday-Friday: 09:00-17:00</li>
			<li>Saturday-Sunday (and public holidays): </li>
			<li> 10:00-16:00</li>
		</ul>
		
		</div>

        <div class="mx-auto" style="width: 300px">
            <p class="text-white" style="font-size: 14px;text-align: center;" class="regularText"></p>
            <ul style="width: 300px;text-align: center;margin: auto;font-size: 13px" class="text-white">
                <li class="text-grey" >FOLLOW US ON</li>
                <li>
                    <div class="footer social-btn">
                        <a href="https://www.instagram.com/sensesofcuba/" title="Follow us on Instagram">
                             <i class="demo-icon socialicon-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/Senses-of-Cuba-112770987041244/" title="Follow us on Facebook">
                             <i class="demo-icon socialicon-facebook"></i>
                        </a>
                    </div>
                </li>
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

<script>
AOS.init();function filterTeam(element){var value = $(element).attr('data-filter');if(value == "All"){$('.filter').css('display','block').show(3000);}else{
        $(".filter").not('.'+value).hide('1000');$('.filter').filter('.'+value).show('3000');}if ($(".filter-button").removeClass("btn-filter"))$(element).removeClass("btn-filter");$(element).addClass("btn-filter");}
    
	function activeMenuFunction(el){
		console.log(el);
	  	$('#mySidenav a').removeClass('menuActive');
	  	$(el).addClass('menuActive');
	  	document.getElementById("mySidenav").style.right = "0px";
	  }   

function testimonialModal(element){
	console.log(element.getElementsByClassName('testimonialDescription')[0].innerHTML);
	var el=element;
	$.fancybox.open(
		'<div class="container col-sm-12 col-md-6">'+
		'<h3 >Testimonial</h3>'+
		'<p>'+element.getElementsByClassName('testimonialDescription')[0].innerHTML+'</p>'+
		'<span class="uppercase  text-warning" >'+element.getElementsByClassName('overview')[0].innerHTML+'</span>'+
		'</div>');
}  	  
    


$(function () {
	$('li.indicatorCarrusel:first-child').addClass('active');$('#testimonial .item.carousel-item:first-child').addClass('active');$('[data-toggle="tooltip"]').tooltip();
	$("#fancybox-general").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_generalConditions.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});
	$("#data").fancybox(); $("#fancybox").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_impresum.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});$("#fancybox-Date").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_datens.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});$("#fancybox-Cooperators").click(function(){$.fancybox.open({href:'<?php  echo get_template_directory_uri() . "/static_colaborators.html"?>',type:'iframe',padding:15,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:true});});$(document).scroll(function() {var scrollTop = $(window).scrollTop();if (scrollTop >= 100 ) {$('.menu-container').addClass('menu-bar');var logotext=$('#img_logo').attr('src').split('/')[$('#img_logo').attr('src').split('/').length-1];if (logotext="logo.png" ) {$('#img_logo').attr('src',$('#img_logo').attr('src').replace('logo','soc'));}$('#logo_img').removeClass('ImgBar').addClass('logoImgBar');$('#img_logo,#logo_img').css('top','8px');}else{$('.menu-container').removeClass('menu-bar');var logotext=$('#img_logo').attr('src').split('/')[$('#img_logo').attr('src').split('/').length-1];if (logotext="soc.png"){$('#img_logo').attr('src',$('#img_logo').attr('src').replace('soc','logo'));}$('#logo_img').removeClass('logoImgBar').addClass('logoImg');$('#img_logo,#logo_img').css('top','2%');}
	});
});

function myFunction(x) {
    x.classList.toggle("change");x.classList.toggle("text-dark");if (x.classList[0]=="change")document.getElementById("mySidenav").style.right = "0px";else document.getElementById("mySidenav").style.right = "-250px";
}

function openNav() {
    document.getElementById("mySidenav").style.right = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.right = "-250px";
}
</script>
</body>
</html>