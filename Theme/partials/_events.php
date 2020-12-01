<?php
$query=new WP_Query(array(
    'category_name'  => 'Events',
    'posts_per_page' => 6,
    'order_by'=>'event_date',
    'meta_query'=>array(

        array(
            'key'=> 'event_date',
            'value'=> '01/06/2018',
            'type'		=> 'Date',
            'compare'	=> '>'
        ))));
$count =0;?>
<?php if ($query->have_posts()):?>


    <section id="Events" >
        <div class="container pb-5 pt-5">

            <div style="text-align: center;margin-bottom:29px; ">
                <h2 class="mx-auto text-black" style="line-height: 25px;" >NEXT</h2>
                <h2 class="mx-auto yellowTitle" style="line-height: 25px;">EVENTS</h2>
            </div>
            <div class="row">
                <?php while ($query->have_posts()) : $query->the_post();
                    $dateformatstring = "l d F, Y";
                    $unixtimestamp = strtotime(get_field('event_date'));
                    $count++;
                    ?>
                    <div class="mx-auto row col-12 col-sm-5 col-md-4 ml-1 mt-1" data-aos="<?php echo $count%2==0?'fade-up':'fade-down';?>" >
                        <div class="text-white container-opacity"  class="row col-12 col-sm-5 col-md-4 ">
                            <img class="img-event shadow" src='<?php echo get_field("event_image")["url"]?>' alt='<?php echo  get_field("event_name")?>'/>

                            <h5 class="event-title regularText"><?php echo get_field('event_name')?></h5>
                            <span class="event-date" style="font-size: 14px;font-weight: bold" ><?php echo date_i18n($dateformatstring, $unixtimestamp);?> </span>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
<?php endif;?>