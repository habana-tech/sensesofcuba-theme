<?php
$mp=new WP_Query(array(
    'category_name'  => 'Jobs',
    'posts_per_page' => 20,
    'lang' => 'en'));
?>
<?php if ($mp->have_posts()):?>
    <div >

        <div id="Jobs" class="elipse-up m-0" style="margin-bottom: -1px !important;width: 100%;">
            <img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;margin-top: 0px" >
        </div>
        <section id="" data-aos-anchor-placement="top-center" class="yellowBackground">
            <div class="container pb-5">

                <div style="text-align: center;margin-bottom:29px; ">
                    <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echo echoTranslatedString('jobsTitle'); ?></h2>
                    <span class="text-white text-center w-50 mx-auto regularText d-block" style="font-size: 20px">CUBA IS MORE THAN OUR JOB.</span>
                    <span class="text-white text-center w-25 mx-auto regularText d-block" style="font-size: 20px">IT'S OUR PASSION.</span>
                </div>
                <div class="row">
                    <?php

                    $currentLang = pll_current_language();
                    $defaultLang = pll_default_language();
                    $shouldTranslate = ($currentLang != $defaultLang);

                    while ($mp->have_posts()) :
                        $mp->the_post();
                        $file = get_field('file');

                        $originalPostId = get_the_ID();
                        $translation = null;
                        if ($shouldTranslate)  //get the translation if exist
                        {
                            $translations = pll_get_post_translations($originalPostId);
                            if(isset($translations[$currentLang]))
                            {
                                $translation = get_post($translations[$currentLang]);
                                if($translation->post_status != 'publish')
                                    $translation = null;
                            }
                        }

                        $currentPost = ($shouldTranslate && $translation != null) ? $translation : $post;
                        $isTheOriginalPost = ($currentPost->ID == $originalPostId);

                        $postName = $isTheOriginalPost ? $currentPost->__get('name') : $currentPost->post_title;
                        $postDescription = $isTheOriginalPost ? $currentPost->__get('description') : $currentPost->post_content;

                        ?>

                            <div class="col-sm-12 col-md-6 mt-1 mx-auto"  data-aos-anchor-placement="top-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title regularText"><?php echo $postName;?></h5>
                                        <p class="card-text"><?php echo $postDescription; ?></p>
                                        <?php if ($file): ?>
                                            <a href="<?php echo $file['url']; ?>" target="_blank">
                                                <button class="btn btn-warning boldText" data-toggle="tooltip" title="View and Download File.">
                                                <?php echo echoTranslatedString('jobsView'); ?>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                    <?php endwhile;?>

                </div>
            </div>
        </section>
        <div class="elipse-up m-0" style="bottom: 17px;width: 100%;">
            <img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: 0px" >
        </div>
    </div>
<?php endif;?>