<?php

    $mp=new WP_Query(array(
        'category_name'  => 'OurTeam',
        'posts_per_page' => 100,
        'meta_key' => 'order',
        'order_by' => 'meta_value_num',
        'order'=>'ASC',
        'lang' => 'en'
         ));

        $count =0;?>
        <?php if ($mp->have_posts()):?>

<div style="height:  50px" id="ourTeam"></div>
<div class="container" >
     <div class="gallery pb-5" style="text-align: center; ">
            <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echoTranslatedString('teamSectionTitleL1'); ?> </h2>
            <h2 class="mx-auto yellowTitle" style="line-height: 25px;"><?php echoTranslatedString('teamSectionTitleL2'); ?></h2>
    </div>
    <div class="text-center pt-5 pb-3"  >
         <button class="btn btn-filter filter-button" data-filter="All" onclick="filterTeam(this)"><?php echoTranslatedString('teamAll'); ?></button>
      <button class="btn filter-button" data-filter="Direction" onclick="filterTeam(this)"><?php echoTranslatedString('teamGM'); ?></button>
      <button class="btn filter-button" data-filter="Sales" onclick="filterTeam(this)"><?php echoTranslatedString('teamSales'); ?> </button>
      <button class="btn filter-button" data-filter="ProductManagement" onclick="filterTeam(this)"><?php echoTranslatedString('teamProduct'); ?></button>
      <button class="btn filter-button" data-filter="Reservations" onclick="filterTeam(this)"><?php echoTranslatedString('teamReservations'); ?></button>
      <button class="btn  filter-button" data-filter="Database" onclick="filterTeam(this)"><?php echoTranslatedString('teamDatabase'); ?></button>
      <button class="btn filter-button" data-filter="Operations" onclick="filterTeam(this)"><?php echoTranslatedString('teamOperations'); ?></button>
      <button class="btn filter-button" data-filter="ClientsAssistance" onclick="filterTeam(this)"><?php echoTranslatedString('teamClientsAssistance'); ?></button>
      <button class="btn filter-button" data-filter="Accounting" onclick="filterTeam(this)"><?php echoTranslatedString('teamAccounting'); ?></button>

    </div>
    <div class="row" data-aos="zoom-in" >

  <?php while ($mp->have_posts()) : $mp->the_post();?>

    <div class="mx-auto col-12 col-md-12 col-lg-3 text-center pb-5 filter <?php foreach (wp_get_post_tags($post->ID) as $tag) {
            echo " ".$tag->name;
        }?>">
        <img src="<?php echo getAttachmentPost(get_field("image"))["url"]?>"  width="150" height="150" class="rounded-circle text-center" alt="<?php echo get_field('name')?>"/>
        <div class="subtitleTeam">
            <p class="boldText"><?php echo the_field('name')?></p>
            <p class="regularText"><?php echo the_field('onchargeof')?></p>
        </div>
    </div>
<?php endwhile;?>
<?php endif;?>
        </div>
</div>
<div style="height: 100px;"></div>
<!--END THIS IS OUR TEAM SECTION-->
