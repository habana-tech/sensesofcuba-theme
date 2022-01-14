<?php
/*
* Template Name: Full Width
*/
get_header() ?>

  <?php

  $currentId = get_the_ID();
  $translations_posts = pll_get_post_translations($currentId);
  if(isset($translations_posts[pll_default_language()]))
      $defaultLangPostId = $translations_posts[pll_default_language()];
  else $defaultLangPostId = get_the_ID();

  if($defaultLangPostId != $currentId)
  {
      $defaultLangPost = get_post($defaultLangPostId);

  }

      $defaultLangPostFields = get_fields($defaultLangPostId);

                        $dateformatstring = "d F, Y";
                        $unixtimestamp = strtotime(get_field('new_date')); ?>
                        <?php

                        $currentImage = null;
                        if(($image = get_field('new_images')) && is_array($image) && !empty($image))
                            { $currentImage = $image; }
                        elseif (isset($defaultLangPostFields['image_1']) && ($image = $defaultLangPostFields['image_1']) && !empty($image))
                        {
                            $currentImage = $image;
                        }
                        ?>

                        <div class="container-fluid p-0" >
                            <?php if(isset($currentImage['url'])): ?>
                                <img class="img-responsive" src="<?php echo $currentImage['url']; ?>" style="width: 100%;max-height: 720px"
                                <?php
                                    if(isset($currentImage['alt']))
                                    {
                                        echo  'alt="' . $currentImage['alt'] . '"';
                                    }
                                    else { echo 'alt="'. the_title() .'"'; }
                                ?>
                                 />
                            <?php endif; ?>
                            <div style="position:absolute;bottom:0px;font-size: 1.6rem;margin-left: 50px;margin-bottom: 10px" >
                                <ul >
                                  <li><h3 class="text-white post-Title" style="text-shadow: 2px 2px 4px #000000;" ><?php the_title();?></h3></li>
                                  <li><span style="font-size: 13px;text-shadow: 1px 1px 2px #000000;" class=" text-white" >Published: <?php echo date_i18n($dateformatstring, $unixtimestamp);?></span></li>
                                </ul>
                            </div>

                        </div>

<!--</div>-->
<main class="main-content marginBottomFooter">


    <?php if (have_posts()) :
 
        while (have_posts()) : the_post();?>
 
            <div class="container pt-5">
                <div class="row">

                      
                    <div class="col-md-8 mx-auto">
                     <?php the_content();?>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        <?php
        endwhile;
        endif;
        ?>


</main>


 <?php get_footer();?>