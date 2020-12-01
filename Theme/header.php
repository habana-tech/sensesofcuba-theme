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

<?php echo getGoogleTagManagerHeader(); ?>

<?php wp_head();?>
</head>
 

<body <?php body_class();?>>

<?php echo getGoogleTagManagerBody(); ?>

<?php    
  $newsQuery=new WP_Query(array('category_name'  => 'News'));
  $eventsQuery=new WP_Query(array('category_name'  => 'Events'));
?>
    


<div class="menu-container">
    <div style="position: fixed;top:6px;z-index: 25000;right: 0;margin-right: 5%; display: flex ">


        <div style="cursor: pointer;" onclick="myFunction(this)">
            <div class="bar1" style=" z-index: 25000"></div>
            <div class="bar2" style="z-index: 25000"></div>
            <div class="bar3" style="z-index: 25000"></div>
        </div>
    </div>


</div>



<div id="mySidenav" style="z-index: 1500" class="container sidenav shadow" >

    <div aria-haspopup="true" class="dropdown text-primary" style=" color: #fdc416 !important;">
        <a data-toggle="dropdown" class="dropdown-toggle nav-link">
            <i class="flag-icon flag-icon-en"></i>
            <span class="no-icon">   <?php

//                echo (new PLL_Language(pll_current_language()))->flag;
$currentLang = pll_current_language('OBJECT');
echo  $currentLang->name. " " .$currentLang->flag. " ";

//                var_dump();
                ?>
            </span></a>
        <!---->
        <ul class="dropdown-menu" style="background: rgba(0,0,0,.9);">

            <!--            <li data-v-551e5a="" class="dropdown-item"><span data-v-551e5a=""><i data-v-551e5a="" class="mr-2 flag-icon flag-icon-en"></i> English</span></li><li data-v-551e5a="" class="dropdown-item"><span data-v-551e5a=""><i data-v-551e5a="" class="mr-2 flag-icon flag-icon-de"></i> German</span></li></ul></div>-->


            <?php pll_the_languages(['show_flags' => true, 'show_names'=> true ]); ?>

        </ul>
    </div>

  <a href="#" class="menuActive" onclick="activeMenuFunction(this);">Home</a>
  <a href="#Profile" onclick="activeMenuFunction(this);"><?php echoTranslatedString('navAboutUs'); ?></a>
  <a href="#ourTeam" onclick="activeMenuFunction(this);"><?php echoTranslatedString('navOurTeam'); ?></a>
  <a href="#ProductSection" onclick="activeMenuFunction(this);"><?php echoTranslatedString('navProductsLeisure'); ?></a>

    <?php
    if($fileURL = getIncentivesFileURL())
    {
        ?>
        <a href="<?php echo $fileURL; ?>" target="_blank" onclick="activeMenuFunction(this);"><?php echoTranslatedString('navProductsMICE'); ?></a>
    <?php
    }
    ?>
  <a href="#MeetUs" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navProductsMICE'); ?></a>
  <a href="#Jobs" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navJobs'); ?></a>
  <?php if($eventsQuery->have_posts()):?>  
  <a href="#Events" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navEvents'); ?></a>
  <?php endif;?>
  <?php if($newsQuery->have_posts()):?>  
  <a href="#News" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navNews'); ?></a>
  <?php endif;?>
  <a href="#Testimonial" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navTestimonial'); ?></a>
  
  <a href="http://infonet.tourcomcuba.com/" onclick="activeMenuFunction(this)">Infonet</a>
  <a href="#ContactUs" onclick="activeMenuFunction(this)"><?php echoTranslatedString('navContactUs'); ?></a>

    <div class="social-btn">
        <a href="https://www.instagram.com/sensesofcuba/" title="Follow us on Instagram">
             <i class="demo-icon socialicon-instagram">
             </i>
        </a>
        <a href="https://www.facebook.com/Senses-of-Cuba-112770987041244/" title="Follow us on Facebook">
             <i class="demo-icon socialicon-facebook"></i>
        </a>
    </div>
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

