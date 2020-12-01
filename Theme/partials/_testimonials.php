<?php $query=new WP_Query(array(
    'category_name'  => 'Testimonial',
    'posts_per_page' => 10,
    'lang' => 'en'
));
$count =0;
if ($query->have_posts()):?>
    <div class="pt-5" style="height: 50px" id="Testimonial"></div>
    <div class="col-sm-12" id="testimonial">

        <div style="text-align: center;margin-bottom:29px;">
            <h2 class="mx-auto text-black" style="line-height: 25px;" ><?php echoTranslatedString('testimonialTitle'); ?></h2>
        </div>

        <div id="myCarousel" class="carousel slide"   data-ride="carousel" >
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <?php $counterIndicators=0;
                for ($i=0; $i <$query->found_posts/2; $i++) { ?>
                    <li class="indicatorCarrusel active" data-target="#myCarousel" data-slide-to="<?php echo $i?>"></li>
                <?php }?>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">

                <?php
                while ($query->have_posts()) : $query->the_post();
                    $count++;
                    if ($count==1):?>
                        <div class="item carousel-item">
                        <div class="row">
                    <?php endif;?>
                    <div class="col-sm-12 col-md-6">
                        <div class="media">
                            <div class="media-body">
                                <div class="testimonial" onclick="testimonialModal(this)">
                                    <p style=" cursor: pointer;"><?php
                                        echo custom_excerpt(get_field('description'), 15)?></p>
                                    <p class="testimonialDescription" style="display: none;"><?php echo get_field('description')?></p>
                                    <p class="overview uppercase"><b><?php the_field('author')?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($count==2):?>
                        </div>
                        </div>
                        <?php $count=0; endif;?>
                <?php endwhile;?>
            </div>
        </div>
    </div>
<?php endif;?>
