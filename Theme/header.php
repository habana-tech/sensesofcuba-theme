<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<link href='' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' );?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="Senses of Cuba is your European DMC with a main office in the heart of Havana, close to all important sights and hotels. Focussing on a sophisticated upmarket clientele with tailormade programs for FITs, luxury travellers, special interest groups, incentive groups and more.">
<meta name="keywords" content="Tailormade FITs & Groups, Special Interest Tours, Luxury Travel, Incentives & Events, Meeting & Conferences, Vips & Delegations, Accomodation, Excursion, Rental Cars, Cuba Excursions, Cuba Experiencies.">
<meta name="author" content="Alejandro de Hombre Madrigal">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 
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
  <a href="#" class="menuActive" onclick="activeMenuFunction(this);">Home</a>
  <a href="#Profile" onclick="activeMenuFunction(this);">About Us</a>
  <a href="#ourTeam" onclick="activeMenuFunction(this);">Our Team</a>
  <a href="#ProductSection" onclick="activeMenuFunction(this);">Products</a>
  <a href="#MeetUs" onclick="activeMenuFunction(this)">Meet Us</a>
  <a href="#Jobs" onclick="activeMenuFunction(this)">Jobs</a>
  <?php if($eventsQuery->have_posts()):?>  
  <a href="#Events" onclick="activeMenuFunction(this)">Events</a>
  <?php endif;?>
  <?php if($newsQuery->have_posts()):?>  
  <a href="#News" onclick="activeMenuFunction(this)">News</a>
  <?php endif;?>
  <a href="#Testimonial" onclick="activeMenuFunction(this)">Testimonial</a>
  
  <a href="#ContactUs" onclick="activeMenuFunction(this)">Contact Us</a>
</div>


<!--<div>
<?php echo do_shortcode('[searchandfilter fields="search,category,post_tag"]');?>
</div>-->
<!--<nav class="navbar navbar-expand-sm  bg-warning" role="navigation">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"  role="navigation" >
  <span class="navbar-toggler-icon " >
  	
  	<img src='<?php echo get_template_directory_uri()."/assets/images/more.png" ?>' width="50" style="position:absolute;margin-left:-30px;top:0px" >

  </span>
  <span >Travel</span>
  </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent" >
	<a>Logo</a>
    <?php
        wp_nav_menu( array(
                'menu'              => 'header_Menu',
                'theme_location'    => 'header_Menu',
                'depth'             => 2,
                'container'         => '',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker())
            );
        ?>
    </div>
    </nav>-->

