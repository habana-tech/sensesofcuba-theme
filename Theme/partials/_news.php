<?php
$news=new WP_Query(array(
    'category_name'  => 'News',
    'posts_per_page' => 3,
    'lang' => 'en'));
if ($news->have_posts()):?>
    <section  id="News" class="pt-5" >
        <div class="fluid-container ">
            <div style="text-align: center;margin-bottom:29px; ">
                <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echoTranslatedString('newsTitleL1'); ?> </h2>
                <h2 class="mx-auto yellowTitle" style="line-height: 25px;"><?php echoTranslatedString('newsTitleL2'); ?> </h2>
            </div>

            <?php
            while ($news->have_posts()) : $news->the_post();

                $originalPostId = $post->ID;
                $currentPost = getPostOrTranslationIfNeededAndExist($post);

                $isTheOriginalPost = ($currentPost->ID == $originalPostId);
                $postTitle = $currentPost->post_title;
                $postDescription = $currentPost->post_content;
                ?>

                <div class="row mx-auto">


                    <div class="col-lg-5 col-md-12 pt-2">
                        <section id="<?php echo "new_slider".$post->ID; ?>"  class="carousel slide carousel-fade" data-ride="carousel" >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php
                                    $image = getAttachmentPost(get_field('image_1'));
                                        if ($image != null):
                                            ?>
                                                <div class="carousel-caption" style="text-shadow:2px 1px 1px #000000">
                                                    <h5><?php echo $image['title']; ?></h5>
                                                </div>
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
                                        <?php
                                        endif;
                                    ?>

                                </div>
                            </div>

                        </section>
                        <!-- <img class="card-img-top" src='<?php echo get_field("new_images")["url"]?>' /> -->
                    </div>
                    <div class="col-lg-7 col-md-12 pt-2 news_text_column">
                        <?php


//                        $postContent = get_post_field('post_content', $post->ID);
                        $postContent = $postDescription;

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
                            <?php echo $postTitle; ?>
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
                            <a class="btn btn-warning btn-sm" role="button" href="<?php echo get_permalink(get_the_ID()); ?>"><?php echoTranslatedString('newsReadMore'); ?></a>
                        </div>



                    </div>
                </div>
            <?php endwhile;?>
            <div class="row mx-auto">
                <div class="pt-1 w-100" style="float:right">
                    <a href=" <?php echo get_category_link('11');?> "><button class="btn btn-warning boldText" style="float:right;margin-right:25px" data-toggle="tooltip" title="View All News"><?php echoTranslatedString('newsAllNews'); ?></button></a>
                </div>
            </div>

        </div>
    </section>
<?php endif;?>