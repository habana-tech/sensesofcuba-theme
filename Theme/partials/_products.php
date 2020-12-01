<div style="margin-bottom: -100px;z-index: 20" id="ProductSection" >
    <div >
        <img class="mt-3" src="<?php echo get_template_directory_uri() . '/assets/images/Up.png' ?>" style="width:100%;margin-top: 3px" ></div>
    <div style="margin-top: -2px">
        <div>
            <section id="profile-container" class="pb-3 yellowBackground" >
                <div class="container profile-container pb-0" style="margin-top: -1px" >
                    <div id="productText" style="" >
                        <h2 class="mx-auto text-black"><?php echoTranslatedString('productsTitleL1'); ?></h2>
                        <h2 class="mx-auto text-white"><?php echoTranslatedString('productsTitleL2'); ?></h2>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div style="margin-top: -2px">
        <div class="elipse-up m-0" style="width: 100%;z-index: 20">
            <img  src="<?php echo get_template_directory_uri() . '/assets/images/down.png' ?>" style="width:100%;margin-top: -6px" >
        </div>
    </div>
</div>

<section class="container-fluid">
    <?php
    $prods=new WP_Query(array(
        'category_name'  => 'Products',
        'lang' => 'en'
    ));

    $productsArray = [];
    if ($prods->have_posts()) {

        $currentLang = pll_current_language();
        $defaultLang = pll_default_language();
        $shouldTranslate = ($currentLang != $defaultLang);

        while ($prods->have_posts()) {
            //configure the current post as $post variable
            $prods->the_post();

            $currentPostPriority = (int) get_field('priority');
            $productsArray[$currentPostPriority][] = $post;
        }
        //ordering the post array by priority!
        krsort($productsArray);
    }

    $orderedPostList = [];
    foreach ($productsArray as $postArray) {
        if (is_array($postArray)) {
            foreach ($postArray as $postItem) {
                $orderedPostList[] = $postItem;
            }
        }
    }

    ?>
    <div class="row text-center">
        <?php
        $incentivesCategoryStr = 'INCENTIVES & EVENTS';
        $incentivesFileURL = getIncentivesFileURL();
        foreach ($orderedPostList as $postItem) {

            $originalPostId = $postItem->ID;
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
            $currentPost = ($shouldTranslate && $translation != null) ? $translation : $postItem;
            $isTheOriginalPost = ($currentPost->ID == $originalPostId);
            $postDescription = $isTheOriginalPost ? $currentPost->__get('product_description') : $currentPost->post_title;
            ?>
            <div class="col-md-4 BorderLWhite">

                <?php

                $productPhoto = get_field('product_photo', $postItem->ID);
                $productPhotoUrl = isset($productPhoto['url']) ? $productPhoto['url'] : "#";
                $productDescription = strtoupper(htmlentities($postDescription));

                $itemMarkup = "<img src='$productPhotoUrl' style='width: 100%' alt='$productDescription'>
                            <span class='product-text boldText'>$productDescription</span>";


                if ($postItem->__get('product_description') === $incentivesCategoryStr && $incentivesFileURL) {
                    if (!isset($fileURL)) {
                        $fileURL = getIncentivesFileURL();
                    }
                    echo "<a href='$fileURL'>$itemMarkup</a>";
                } else {
                    echo $itemMarkup;
                } ?>
            </div>
            <?php
        }
        ?>
    </div>

</section>