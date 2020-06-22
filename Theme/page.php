<?php
/*
* Plantilla para todas las páginas
*/
 
// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
 
<?php get_header();?>
 
<main class="main-content">
 
    <?php if (have_posts()) :
 
        while (have_posts()) : the_post();?>
 
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <article id="post-<?php the_ID();?>" <?php post_class();?>>
                            <h1><?php the_title();?></h1>
 
                            <div class="entry-content">
                                <?php the_content();?>

                                 <?php
                                  //retrieve all Attachments for the 'attachments' instance of post 123
                                $attachments = new Attachments( 'attachments' );?>
                                <?php if( $attachments->exist()) : ?>
                                <h3>Attachments</h3>

                                  <div class="row">
                                    <?php while( $attachment = $attachments->get() ) : ?>
                                        <div class="col-sm-4">
                                        <figure class="figure ">
                                        <img class=" figure-img mw-100 img-thumbnail w-100 h-25"  src="<?php echo $attachments->url() ?>" >
                                            <figcaption class="figure-caption"><?php echo $attachments->field( 'caption' ) ?></figcaption>
                                    </figure>
                                    </div>
                                    <?php endwhile; ?>
                                  </div>
                                <?php endif; ?>
                            </div><!-- entry-content -->
                        </article>
                    </div>
 
                
                </div><!-- row -->
            </div><!-- container -->
 
        <?php endwhile;
    endif;?>
 
</main>
 
<?php get_footer();?>