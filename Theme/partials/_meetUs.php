<?php
$mp=new WP_Query(array(
    'category_name'  => 'Meeting Us',
    'posts_per_page' => 9,
    'lang' => 'en'));
$count =0;?>
<?php if ($mp->have_posts()):?>
    <section id="MeetUs" >
        <div class="container pt-5">
            <div style="text-align: center;margin-bottom:10px; ">
                <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echo echoTranslatedString('meetUsTitleL1'); ?>  </h2>
                <h2 class="mx-auto yellowTitle" style="line-height: 25px;"><?php echo echoTranslatedString('meetUsTitleL2'); ?></h2>
            </div>
            <div class="row pb-5">
                <?php while ($mp->have_posts()) : $mp->the_post();?>
                    <div class="col-12 col-sm-12 col-md-6 pt-5 text-center"  >
                        <!--<img src='<?php /*echo get_field("image")["url"]?>' alt='<?php echo  get_field("name")*/?>' class="w-75 h-50"/>-->
                        <div  class="text-center ">
                            <span class=" meetUsComponent name text-center uppercase d-block" style="font-size: 1.6em;" ><a class="uppercase text-dark" href="<?php echo the_field('link')?>"  target="_blank"><?php echo get_field('name')?></a> </span>
                            <span class=" meetUsComponentTxt text-danger text-center d-block">
                        <?php echo get_field('datetxt')?>
                    </span>
                            <span class=" meetUsComponentTxt text-danger text-center d-block">
                        <?php echo get_field('place')?>
                    </span>

                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
<?php endif;?>