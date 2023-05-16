<?php defined('ABSPATH') or die('No script kiddies please!');?>
 
<?php get_header();?>
<!---->
<!-- <div id="logo_img" style=" position:fixed;left: 50%;transform: translate(-50%, 0px);" class="logoImg">-->
<!--            <img id="img_logo"  class="mx-auto" src="-->
<?php // echo get_template_directory_uri() . '/assets/images/logo.png'?>
<!--            " alt="SenseOfCubaLogo">-->
<!--        </div>-->

<!--MAIN SLIDER SECTION -->
<?php
    include __DIR__ . '/partials/_headerSlider.php';
?>
<!--END MAIN SLIDER  -->

<!--PROFILE SECTION-->

    <div id="Profile" >
        <div>
            <img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;" >
        </div>
        <div>
            <section id="profile-container" class=" pt-0 yellowBackground" >

                <div class="container profile-container pb-5" style="margin-top: -1px" >

                    <div style="text-align: center;margin-bottom:29px" >

                        <h2 class="mx-auto text-black"><?php echoTranslatedString('homeAboutUsTitleL1'); ?></h2>
                        <h2 class="mx-auto text-white"><?php echoTranslatedString('homeAboutUsTitleL2'); ?></h2>

                    </div>
                    <div class="row yellowBackground profile-text">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <b style="text-transform: uppercase;">Senses of Cuba</b>
                            <?php echoTranslatedString('homeAboutUsText1'); ?>

                            <a target="_blank" href="<?php
    if($fileURL = getIncentivesFileURL())
    {
        echo $fileURL;
    }
    else echo '#'; ?>" style="color: black; font-weight: 600; text-underline: black; text-decoration: underline">
                                <?php echoTranslatedString('homeAboutUsIncentive'); ?></a>,
                            <?php echoTranslatedString('homeAboutUsText2'); ?>
                        </div>
                        <div class="col-sm-6  col-md-6 col-lg-4">
                            <?php echoTranslatedString('homeAboutUsText3'); ?>
                        </div>
                        <div class="col-sm-6  col-md-6 col-lg-4">
                            <?php echoTranslatedString('homeAboutUsText4'); ?>
                            <b><?php echoTranslatedString('homeAboutUsText5'); ?></b>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="elipse-up m-0" style="bottom: 17px;margin-bottom: -100px !important;width: 100%;">
            <img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: 0px" >
        </div>
    </div>
<!--END PROFILE SECTION-->


<!--TEAM PRESENTATION IMAGE-->
<section  id="teamPresentation">
    <img class="team-image" src="<?php echo get_template_directory_uri() . '/assets/images/team.jpg' ?>">
    <style>
        /*    media query for small devices*/
        @media (max-width: 992px) {
            .team-image {
                width: 100%;
                object-fit: cover;
                object-position: 0 0;
                margin-top: 2rem;
            }
        }
    /*    media qquery for desktop*/
        @media (min-width: 992px) {
            .team-image {
                width: 100%;
                object-fit: cover;
                object-position: 0 0;
                margin-top: -1rem;
            }
        }
    </style>
</section>
<!--END PRESENTATION IMAGE-->

<!--THIS IS OUR TEAM SECTION-->
    <?php
        include __DIR__ . '/partials/_ourTeam.php';
    ?>
<!--END THIS IS OUR TEAM SECTION-->

<!--SECTION PRODUCTS-->
<?php
    include __DIR__ . '/partials/_products.php';
?>

<!--END SECTION PRODUCTS-->

<!--MEET US SECTION-->
<?php
    include __DIR__ . '/partials/_meetUs.php';
?>
<!--END MEET US SECTION-->

<!--JOB SECTION-->
<?php
    include __DIR__ . '/partials/_jobs.php';
?>
<!--END JOB SECTION-->

<!--EVENT SECTION-->
<?php
    include __DIR__ . '/partials/_events.php';
?>
<!--END EVENT SECTION-->

<!--NEWS SECTION-->

<?php
    include __DIR__ . '/partials/_news.php';
?>
<!--END NEWS SECTION-->




<!--TESTIMONIAL SECTION-->
<?php
    include __DIR__ . '/partials/_testimonials.php';
?>
<!--END TESTIMONAIL SECTION-->
<?php get_footer();?>
