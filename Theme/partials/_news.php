<?php
$new=new WP_Query(array(
    'category_name'  => 'News',
    'posts_per_page' => 3,
    'lang' => 'en'));
if ($new->have_posts()):?>
    <section  id="News" class="pt-5" >
        <div class="fluid-container ">
            <div style="text-align: center;margin-bottom:29px; ">
                <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echoTranslatedString('newsTitleL1'); ?> </h2>
                <h2 class="mx-auto yellowTitle" style="line-height: 25px;"><?php echoTranslatedString('newsTitleL2'); ?> </h2>
            </div>

            <?php
            while ($new->have_posts()) : $new->the_post();?>
                <div class="row mx-auto">


                    <div class="col-lg-5 col-md-12 pt-2">
                        <section id="<?php echo "new_slider".$post->ID; ?>"  class="carousel slide carousel-fade" data-ride="carousel" >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                    $image = get_field('image_1');
                                    $image2 = get_field('image_2');
                                    $image3 = get_field('image_3');
                                    if (!empty($image)): ?>
                                        <div class="carousel-caption" style="text-shadow:2px 1px 1px #000000">
                                            <h5><?php echo $image['caption']; ?></h5>
                                        </div>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($image2)): ?>
                                    <div class="carousel-item">
                                        <div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
                                            <h5><?php echo $image2['caption']; ?></h5>
                                        </div>
                                        <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($image3)): ?>
                                    <div class="carousel-item ">
                                        <div class="carousel-caption "  style="text-shadow:2px 1px 1px #000000" >
                                            <h5><?php echo $image3['caption']; ?></h5>
                                        </div>
                                        <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?> " />
                                    </div>
                                <?php endif; ?>

                            </div>
                            <?php if (!empty($image2) || !empty($image3)): ?>
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


                        $postContent = get_post_field('post_content', $post->ID);

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
                            <!--              <a href="--><?php //echo get_permalink(get_the_ID());?><!--">-->
                            <!--                  -->
                            <!--              </a>-->

                        </h2>

                        <span style="font-size:10px;color:grey">Published: <?php echo $datePublished; ?></span>

                        <ul class="translations_list">
                            <?php pll_the_languages(['post_id' => $post->ID, 'hide_if_empty' => true, 'show_flags'=>true, 'hide_if_no_translation'=>true]); ?>

                        </ul>

                        <div class="card-text"><?php echo $postIntro; ?></div>
                        <div class="read-more pt-1">
                            <a class="btn btn-warning btn-sm" role="button" href="<?php echo get_permalink(get_the_ID()); ?>">Read more</a>
                        </div>



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