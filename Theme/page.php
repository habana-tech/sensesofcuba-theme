<?php
/*
* Plantilla para todas las páginas
*/
 
// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
 
<?php get_header();?>


<main class="main-content" style="margin-top: clamp(100px, 30vh, 170px);">

    <?php if (have_posts()) :


        while (have_posts()) : the_post();?>
 
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <article id="post-<?php the_ID();?>" <?php post_class();?>>
                            <h1><?php the_title();?></h1>
 
                            <div class="entry-content">
                                <?php the_content();?>

                            </div><!-- entry-content -->
                        </article>
                    </div>
 
                
                </div><!-- row -->
            </div><!-- container -->
 
        <?php endwhile;
    endif;?>
 
</main>
 
<?php get_footer();?>