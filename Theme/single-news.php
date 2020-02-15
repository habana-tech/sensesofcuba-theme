
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
 

 
<?php wp_head();?>
</head>
 

<body <?php body_class();?>>

<?php    
  $newsQuery=new WP_Query(array('category_name'  => 'News'));
  $eventsQuery=new WP_Query(array('category_name'  => 'Events'));
?>
    


<div class="menu-container">
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

 <div style="width: 100%;">

  <?php 
                        $dateformatstring = "d F, Y";
                        $unixtimestamp = strtotime(get_field('new_date')); ?></h2>
                        <?php $image = get_field('new_images');
                        if( !empty($image) ): ?>
                            <div class="container-fluid p-0" >
                            <img class="img-responsive" src="<?php echo $image['url']; ?>" style="width: 100%;max-height: 720px" alt="<?php echo $image['alt'];; ?>" />
                          <div style="position:absolute;bottom:0px;font-size: 1.6rem;margin-left: 50px;margin-bottom: 10px" >
                            <ul >
                              <li><h3 class="text-white post-Title" style="text-shadow: 2px 2px 4px #000000;" ><?php the_title();?></h3></li>
                            <li><span style="font-size: 13px;text-shadow: 1px 1px 2px #000000;" class=" text-white" >Published: <?php echo date_i18n($dateformatstring, $unixtimestamp);?></span></li>
                        </div>

                            </div>
                        <?php endif; ?>
</div> 
<main class="main-content marginBottomFooter">


    <?php if (have_posts()) :
 
        while (have_posts()) : the_post();?>
 
            <div class="container pt-5">
                <div class="row">
                   
                      
                    <div class="col-md-8 mx-auto">
                     <?php the_content();?>


                       <article  >
          <?php
          //retrieve all Attachments for the 'attachments' instance of post 123
          $attachments = new Attachments( 'attachments' );?>
          <?php if( $attachments->exist()) : ?>
          <h3>Attachments</h3>
          <div class="row">
              <?php while( $attachment = $attachments->get() ) : ?>
              <div class="col-12">
              <figure class="figure ">
              <img class=" figure-img w-100 "  src="<?php echo $attachments->url() ?>" >
                <figcaption class="figure-caption" style="background-color: #f0f0f0;padding: 10px;margin-top: -10px;">
                <span> <?php echo $attachments->field( 'caption' );?></span>


                </figcaption>
              </figure>
              </div>
              <?php endwhile; ?>
              </div>
              <?php endif; ?>

              
              <!--  <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
              </div>-->
            </div><!-- entry-content -->
            </article>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        <?php endwhile; endif;?>
<?php
// If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
?>

</main>


 <?php get_footer();?>