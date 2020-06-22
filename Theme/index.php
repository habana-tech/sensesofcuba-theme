<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
 
<?php get_header();?>

 <div id="logo_img" style=" position:fixed;left: 50%;transform: translate(-50%, 0px);" class="logoImg">
  			<img id="img_logo"  class="mx-auto" src="
<?php  echo get_template_directory_uri() . '/assets/images/logo.png'?>
  			" alt="SenseOfCubaLogo">

		</div>

<!--MAIN SLIDER SECTION -->
<section id="home_slider"  class="carousel slide carousel-fade" data-ride="carousel" >
  <!-- Indicators -->
  <ul class="carousel-indicators indicator-position">
    <li data-target="#home_slider" data-slide-to="0" class="active"></li>
    <li data-target="#home_slider" data-slide-to="1"></li>
    <li data-target="#home_slider" data-slide-to="2"></li>
  </ul>

<div class="carousel-inner">
<?php	
$posts=query_posts(array(
    'category_name'  => 'Home Slider',
    'posts_per_page' => 3
));

?>
<?php while ( have_posts() ) : the_post();?>



<div class="carousel-item active">
<?php if( !empty(get_field('slider1_link')) ): ?>
<a href="#News">
<?php endif; ?>
	<div class="carousel-caption" style="padding-bottom:  12%">
	<h2 class="text-white" ><?php echo the_field('slider_title_1'); ?></h2>
	<h2 class="yellowTitle" ><?php echo the_field('slider_content_1'); ?></h2>	
	</div>
	<?php if( !empty(get_field('slider1_link')) ): ?>
	</a>
	<?php endif; ?>	
	
<?php 
$image = get_field('slider_image_1');
$image2 = get_field('slider_image_2');
$image3 = get_field('slider_image_3');
if( !empty($image) ): ?>
<?php if( !empty(get_field('slider1_link')) ): ?>
<a href="#News">
<?php endif; ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo the_field('slider_title_1'); ?>" />
	<?php if( !empty(get_field('slider1_link')) ): ?>
	</a>
	<?php endif; ?>	
<?php endif; ?>
</div>


<div class="carousel-item">
<?php if( !empty(get_field('slider2_link')) ): ?>
<a href="#News">
<?php endif; ?>
	<div class="carousel-caption" style="padding-bottom:  12%" >
	
	<h2 class="text-white" ><?php echo the_field('slider_title_2'); ?></h2>
	<h2 class="yellowTitle" ><?php echo the_field('slider_content_2'); ?></h2>	
	<?php if( !empty(get_field('slider1_link')) ): ?>
	</a>
<?php endif; ?>
	</div>
	<?php if( !empty(get_field('slider2_link')) ): ?>
		<a href="#News">
	<?php endif; ?>
    	<img src="<?php echo $image2['url']; ?>" alt="<?php echo the_field('slider_title_2'); ?>" />
		<?php if( !empty(get_field('slider1_link')) ): ?>
		</a>
		<?php endif; ?>
		
</div>

<div class="carousel-item ">
	<?php if( !empty(get_field('slider2_link')) ): ?>
		<a href="#News">
	<?php endif; ?>
	<div class="carousel-caption" style="padding-bottom:  12%"  >
	<h2 class="text-white"><?php echo the_field('slider_title_3'); ?></h2>
	<h2 class="yellowTitle" ><?php echo the_field('slider_content_3'); ?></h2>	
	<?php if( !empty(get_field('slider2_link')) ): ?>
		</a >
	<?php endif; ?>
	</div>
		<?php if( !empty(get_field('slider2_link')) ): ?>
			<a href="#News">
		<?php endif; ?>
    		<img src="<?php echo $image3['url']; ?>" alt="<?php echo the_field('slider_title_3'); ?>" />
		<?php if( !empty(get_field('slider2_link')) ): ?>
			</a>
		<?php endif; ?>
</div>

<?php endwhile; ?>
</div>
 
</section>
<!--END MAIN SLIDER  -->

<!--PROFILE SECTION-->

	<div id="Profile" >
		<div><img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;" ></div>
		<div>
			<section id="profile-container" class=" pt-0 yellowBackground" >

		<div class="container profile-container pb-5" style="margin-top: -1px" >
		
		<div style="text-align: center;margin-bottom:29px" >
		
		<h2 class="mx-auto text-black">ABOUT</h2>
		<h2 class="mx-auto text-white">US</h2>
		</div>
	<div class="row yellowBackground profile-text">
		<div class="col-sm-6 col-md-6 col-lg-4">
			<b style="text-transform: uppercase;">Senses of Cuba</b> is your European DMC with a main office in the heart of Havana, close to all important sights and hotels. Focussing on a sophisticated upmarket clientele with tailormade programs for FITs, luxury travellers, special interest groups, incentive groups and more. Profit from more than 16 years of experience in Cuba, a complex but fascinating destination. With a mixed European and Cuban team of about 30 professionals, we create unique programs and experiences for travellers showing both, the “nostalgic” and the “New Cuba”.
		</div>
		<div class="col-sm-6  col-md-6 col-lg-4">
			Bernd Herrmann (general manager and owner) living in Havana since 2001, and his team have created and managed a growing number of incentive- and tailormade programs in Cuba with clients from world renowned international companies reaching from the auto, finance, construction and food sector to the IT, insurance and pharmaceutical industry.
		</div>
		<div class="col-sm-6  col-md-6 col-lg-4">
			 The Senses of Cuba team is here to share it’s passion with you by offering different aspects of Cuba that do not follow the mass tourism. Working with one collective mission. <b>Because Cuba is more than our job, it’s our passion.</b> 
		</div>
		</div>
	</div>
</section>
</div>
<div>
	<div class="elipse-up m-0" style="bottom: 17px;margin-bottom: -100px !important;width: 100%;">
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: 0px" >
	</div>
</div>
	</div>
	</div>
<!--END PROFILE SECTION-->

<!--TEAM PRESENTATION IMAGE-->
<section  id="teamPresentation">
	<img class="" src="<?php echo get_template_directory_uri() . '/assets/images/team.jpg' ?>" style="width:100%;margin-top: -3px" >
</section>
<!--END PRESENTATION IMAGE-->

<!--THIS IS OUR TEAM SECTION-->
	<?php    
	$mp=new WP_Query(array(
    	'category_name'  => 'OurTeam',
    	'posts_per_page' => 100,
    	'meta_key' => 'order',
	    'order_by' => 'meta_value_num',
	    'order'=>'ASC',
         ));

		$count =0;?>
		<?php if($mp->have_posts()):?>

<div style="height:  50px" id="ourTeam"></div>
<div class="container" >
	 <div class="gallery" style="text-align: center; " class="pb-5">
			<h2 class="mx-auto text-black" style="line-height: 25px;" >THIS IS </h2>
			<h2 class="mx-auto yellowTitle" style="line-height: 25px;">OUR TEAM</h2>
	</div>
	<div class="text-center pt-5 pb-3"  >
		 <button class="btn btn-filter filter-button" data-filter="All" onclick="filterTeam(this)">All</button>
      <button class="btn filter-button" data-filter="Direction" onclick="filterTeam(this)">GM</button>
      <button class="btn filter-button" data-filter="Sales" onclick="filterTeam(this)">Sales </button>
      <button class="btn filter-button" data-filter="ProductManagement" onclick="filterTeam(this)">Product</button>
      <button class="btn filter-button" data-filter="Reservations" onclick="filterTeam(this)">Reservations</button>
      <button class="btn  filter-button" data-filter="Database" onclick="filterTeam(this)">Database</button>
	  <button class="btn filter-button" data-filter="Operations" onclick="filterTeam(this)">Operations</button>
	  <button class="btn filter-button" data-filter="ClientsAssistance" onclick="filterTeam(this)">Clients Assistance </button>
	  <button class="btn filter-button" data-filter="Accounting" onclick="filterTeam(this)">Accounting</button>
	  
    </div>
    <div class="row" data-aos="zoom-in" >

  <?php while ( $mp->have_posts() ) : $mp->the_post();?>

	<div class="mx-auto col-12 col-md-12 col-lg-3 text-center pb-5 filter <?php foreach(wp_get_post_tags($post->ID) as $tag) echo " ".$tag->name;?>">
		<img src="<?php echo get_field("image")["url"]?>"  width="150" height="150" class="rounded-circle text-center" alt="<?php echo get_field('name')?>"/>
		<div class="subtitleTeam">
			<p class="boldText"><?php echo the_field('name')?></p>
			<p class="regularText"><?php echo the_field('onchargeof')?></p>
		</div>
	</div>
<?php endwhile;?>
<?php endif;?>
        </div>
</div>
<div style="height: 100px;"></div>
<!--END THIS IS OUR TEAM SECTION-->

<!--SECTION PRODUCTS-->
<div style="margin-bottom: -100px;z-index: 20" id="ProductSection" >
<div >
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;margin-top: 3px" ></div>
<div style="margin-top: -2px">
<div>
<section id="profile-container" class="pb-3 yellowBackground" >
	<div class="container profile-container pb-0" style="margin-top: -1px" >
    	<div id="productText" style="" >
			<h2 class="mx-auto text-black">OUR</h2>
			<h2 class="mx-auto text-white">PRODUCTS</h2>
		</div>
	</div>
</section>
</div>
</div>
<div style="margin-top: -2px">
	<div class="elipse-up m-0" style="width: 100%;z-index: 20">
	<img  src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: -6px" >
	</div>
</div>
</div>

<section class="container-fluid">
<?php
	$prods=new WP_Query(array(
    	'category_name'  => 'Products'
         ));
	$flager=false;
	$counter =1;?>

	<?php if($prods->have_posts()):?>
		<div class="row text-center">
		 <?php while ( $prods->have_posts() ) : $prods->the_post();?>
			<div class="col-md-4 BorderLWhite">
				<img src="<?php echo get_field('product_photo')['url'];?>" style="width: 100%">
				<span class="product-text boldText"><?php echo the_field('product_description');?></span>
			</div>
			<?php if($counter=3 or ($counter=1 && $flager)):?>
			<?php endif;?>
			<?php if($counter=3){$counter=0;$flager=false;}?>
	    <?php endwhile;?>
	    </div>
	<?php endif;?>
</section>
<!--END SECTION PRODUCTS-->

<!--MEET US SECTION-->
<?php    
	$mp=new WP_Query(array(
    	'category_name'  => 'Meeting Us',
    	'posts_per_page' => 9));
		$count =0;?>
<?php if($mp->have_posts()):?>
<section id="MeetUs" >
<div class="container pt-5">
	<div style="text-align: center;margin-bottom:10px; ">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >MEET </h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">US</h2>
	</div>
	<div class="row pb-5">
		<?php while ( $mp->have_posts() ) : $mp->the_post();?>
		<div class="col-12 col-sm-12 col-md-6 pt-5 text-center"  >
			<!--<img src='<?php /*echo get_field("image")["url"]?>' alt='<?php echo  get_field("name")*/?>' class="w-75 h-50"/>-->
			<div  class="text-center ">
				<span class=" meetUsComponent name text-center uppercase d-block" style="font-size: 1.6em;" ><a class="uppercase text-dark" href="<?php echo the_field('link')?>"  target="_blank"><?php echo get_field('name')?></a> </span>
				<span class=" meetUsComponentTxt text-danger text-center d-block">
					<?php echo get_field('datetxt')?>
				</span>
				<span class=" meetUsComponentTxt text-danger text-center d-block">
					<?php echo get_field('place')?>
				</span>

			</div>
    	</div>   
    	<?php endwhile;?>
	</div>
	</div>
</section>
<?php endif;?>
<!--END MEET US SECTION-->

<!--JOB SECTION-->
<?php    
	$mp=new WP_Query(array(
    	'category_name'  => 'Jobs',
    	'posts_per_page' => 20));
		$count =0;?>
<?php if($mp->have_posts()):?>
	<div >

	<div id="Jobs" class="elipse-up m-0" style="margin-bottom: -1px !important;width: 100%;">
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;margin-top: 0px" >
	</div>
<section id="" data-aos-anchor-placement="top-center" class="yellowBackground">
<div class="container pb-5">
	
	<div style="text-align: center;margin-bottom:29px; ">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >JOBS </h2>
		<span class="text-white text-center w-50 mx-auto regularText d-block" style="font-size: 20px">CUBA IS MORE THAN OUR JOB.</span>
		<span class="text-white text-center w-25 mx-auto regularText d-block" style="font-size: 20px">IT'S OUR PASSION.</span>
	</div>
	<div class="row">
	<?php $count=0; while ( $mp->have_posts() ) : $mp->the_post();?>
	<?php $file = get_field('file');
	$count++;
	if( $file ): ?>
	<div class="col-sm-12 col-md-6 mt-1 mx-auto"  data-aos-anchor-placement="top-center">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title regularText"><?php echo the_field('name')?></h5>
	        <p class="card-text"><?php echo the_field('description')?></p>
	        <a href="<?php echo $file['url']; ?>" target="_blank"><button class="btn btn-warning boldText" data-toggle="tooltip" title="View and Download File.">VIEW</button></a>
	        
	      </div>
	    </div>
	  </div>
	<?php endif; ?>
  	<?php endwhile;?>

	</div>
	</div>
</section>
<div class="elipse-up m-0" style="bottom: 17px;width: 100%;">
	<img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: 0px" >
	</div>
</div>
<?php endif;?>
<!--END JOB SECTION-->

<!--EVENT SECTION-->
<?php    
	$query=new WP_Query(array(
    	'category_name'  => 'Events',
    	'posts_per_page' => 6,
    	'order_by'=>'event_date',
    	'meta_query'=>array(
    	
    	array(
			'key'=> 'event_date',
			'value'=> '01/06/2018',
			'type'		=> 'Date',
			'compare'	=> '>'
    	))));
		$count =0;?>
<?php if($query->have_posts()):?>


<section id="Events" >
<div class="container pb-5 pt-5">
	
	<div style="text-align: center;margin-bottom:29px; ">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >NEXT</h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">EVENTS</h2>
	</div>
	<div class="row">
		<?php while ( $query->have_posts() ) : $query->the_post();
			$dateformatstring = "l d F, Y";
			$unixtimestamp = strtotime(get_field('event_date'));
			$count++;
		?>	
		<div class="mx-auto row col-12 col-sm-5 col-md-4 ml-1 mt-1" data-aos="<?php echo $count%2==0?'fade-up':'fade-down';?>" >
			<div class="text-white container-opacity"  class="row col-12 col-sm-5 col-md-4 "> 
				<img class="img-event shadow" src='<?php echo get_field("event_image")["url"]?>' alt='<?php echo  get_field("event_name")?>'/>
				
				<h5 class="event-title regularText"><?php echo get_field('event_name')?></h5>
				<span class="event-date" style="font-size: 14px;font-weight: bold" ><?php echo date_i18n($dateformatstring, $unixtimestamp);?> </span>
			</div>
    	</div>   
    	<?php endwhile;?>
	</div>
	</div>
</section>
<?php endif;?>
<!--END EVENT SECTION-->

<!--NEWS SECTION-->

<?php
$new=new WP_Query(array(
	'category_name'  => 'News',
	'posts_per_page' => 3));
	if($new->have_posts()):?>
<section  id="News" class="pt-5" >
<div class="fluid-container ">
	<div style="text-align: center;margin-bottom:29px; ">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >LATEST </h2>
		<h2 class="mx-auto yellowTitle" style="line-height: 25px;">NEWS</h2>
	</div>

	<?php		
	while ( $new->have_posts() ) : $new->the_post();?>
    <div class="row mx-auto">


        <div class="col-lg-5 col-md-12 pt-2">
            <section id="<?php echo "new_slider".$post->ID; ?>"  class="carousel slide carousel-fade" data-ride="carousel" >
              <div class="carousel-inner">
                <div class="carousel-item active">
                <?php
                $image = get_field('image_1');
                $image2 = get_field('image_2');
                $image3 = get_field('image_3');
                if(!empty($image)): ?>
                <div class="carousel-caption" style="text-shadow:2px 1px 1px #000000">
                  <h5><?php echo $image['caption']; ?></h5>
                </div>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
                </div>

            <?php if(!empty($image2)): ?>
            <div class="carousel-item">
                <div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
                    <h5><?php echo $image2['caption']; ?></h5>
                </div>
                <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
            </div>
            <?php endif; ?>
            <?php if(!empty($image3)): ?>
            <div class="carousel-item ">
                <div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
                <h5><?php echo $image3['caption']; ?></h5>
                </div>
                    <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?> " />
                </div>
            <?php endif; ?>

            </div>
            <?php if(!empty($image2) || !empty($image3)): ?>
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
                <!-- <img class="card-img-top" src='<?php echo get_field("new_images")["url"]?>' /> -->
                </div>
        <div class="col-lg-7 col-md-12 pt-2 news_text_column">
                <?php


            $postContent = get_post_field('post_content',$post->ID);

            $postContentParts = explode('<!--more-->', $postContent);

            if (count($postContentParts) > 1) {
                $postIntro = $postContentParts[0];
            } else {
                $postIntro = $postIntro = custom_excerpt($postContent, 150);
            }

            $dateformatstring = "d F, Y";
            $unixtimestamp = strtotime(get_field('new_date'));
            $datePublished=date_i18n($dateformatstring, $unixtimestamp);?>
             <h2 class="yellowTitle" style="font-size:20px">
                 <?php echo get_the_title(); ?>
<!--              <a href="--><?php //echo get_permalink(get_the_ID()); ?><!--">-->
<!--                  -->
<!--              </a>-->

             </h2>

             <span style="font-size:10px;color:grey">Published: <?php echo $datePublished; ?></span>

            <ul class="translations_list">
                <?php pll_the_languages(['post_id' => $post->ID, 'hide_if_empty' => true, 'show_flags'=>true, 'hide_if_no_translation'=>true]); ?>

            </ul>

             <div class="card-text"><?php echo $postIntro; ?></div>



            </div>
    </div>
	<?php endwhile;?>
    <div class="row mx-auto">
        <div class="pt-1 w-100" style="float:right">
            <a href=" <?php echo get_category_link('11');?> "><button class="btn btn-warning boldText" style="float:right;margin-right:25px" data-toggle="tooltip" title="View All News">All News</button></a>
        </div>
    </div>
 
</div>
</section>
<?php endif;?>
<!--END NEWS SECTION-->




<!--TESTIMONIAL SECTION-->
<?php $query=new WP_Query(array(
    	'category_name'  => 'Testimonial',
    	'posts_per_page' => 10,
    	));
		$count =0;
if($query->have_posts()):?>
<div class="pt-5" style="height: 50px" id="Testimonial"></div>
<div class="col-sm-12" id="testimonial">

	<div style="text-align: center;margin-bottom:29px;">
		<h2 class="mx-auto text-black" style="line-height: 25px;" >TESTIMONIAL</h2>
	</div>
		
			<div id="myCarousel" class="carousel slide"   data-ride="carousel" >
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<?php $counterIndicators=0;  
					for ($i=0; $i <$query->found_posts/2; $i++) { ?>
						<li class="indicatorCarrusel" data-target="#myCarousel" data-slide-to="<?php echo $i?>" class="active"></li>
					<?php }?>
				</ol>   
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
				
<?php while ( $query->have_posts() ) : $query->the_post();
				$count++;
				if($count==1):?>
					<div class="item carousel-item">
						<div class="row">
				<?php endif;?>
				<div class="col-sm-12 col-md-6">
								<div class="media">
									<div class="media-body">
										<div class="testimonial" onclick="testimonialModal(this)">
											<p style=" cursor: pointer;"><?php 
											echo custom_excerpt(get_field('description'),15)?></p>
											<p class="testimonialDescription" style="display: none;"><?php echo get_field('description')?></p>
											<p class="overview uppercase"><b><?php the_field('author')?></b></p>
										</div>
									</div>
								</div>
							</div>
				<?php if($count==2):?>
						</div>			
					</div>
				<?php $count=0; endif;?>
				<?php endwhile;?>
					</div>
			</div>
		</div>
		<?php endif;?>
	</div>
</div>
<!--END TESTIMONAIL SECTION-->
<?php get_footer();?>