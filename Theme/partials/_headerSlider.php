<section id="home_slider"  class="carousel slide carousel-fade" data-ride="carousel" >
  <!-- Indicators -->
  <ul class="carousel-indicators indicator-position">
    <li data-target="#home_slider" data-slide-to="0" class="active"></li>
    <li data-target="#home_slider" data-slide-to="1"></li>
    <li data-target="#home_slider" data-slide-to="2"></li>
  </ul>

<div class="carousel-inner">
<?php
$posts=get_posts(array(
    'category_name'  => 'Home Slider',
    'posts_per_page' => 3,
    'lang' => 'en' //only get the posters from main language
));

?>
<?php while (have_posts()) : the_post();?>



<div class="carousel-item active">
<?php if (!empty(get_field('slider1_link'))): ?>
<a href="#News">
<?php endif; ?>
    <div class="carousel-caption" style="padding-bottom:  12%">
    <h2 class="text-white" ><?php echo the_field('slider_title_1'); ?></h2>
    <h2 class="yellowTitle" ><?php echo the_field('slider_content_1'); ?></h2>
    </div>
    <?php if (!empty(get_field('slider1_link'))): ?>
    </a>
    <?php endif; ?>

<?php
$image = get_field('slider_image_1');
$image2 = get_field('slider_image_2');
$image3 = get_field('slider_image_3');
if (!empty($image)): ?>
<?php if (!empty(get_field('slider1_link'))): ?>
<a href="#News">
<?php endif; ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo the_field('slider_title_1'); ?>" />
    <?php if (!empty(get_field('slider1_link'))): ?>
    </a>
    <?php endif; ?>
<?php endif; ?>
</div>


<div class="carousel-item">
<?php if (!empty(get_field('slider2_link'))): ?>
<a href="#News">
<?php endif; ?>
    <div class="carousel-caption" style="padding-bottom:  12%" >

    <h2 class="text-white" ><?php echo the_field('slider_title_2'); ?></h2>
    <h2 class="yellowTitle" ><?php echo the_field('slider_content_2'); ?></h2>
    <?php if (!empty(get_field('slider1_link'))): ?>
    </a>
<?php endif; ?>
    </div>
    <?php if (!empty(get_field('slider2_link'))): ?>
        <a href="#News">
    <?php endif; ?>
        <img src="<?php echo $image2['url']; ?>" alt="<?php echo the_field('slider_title_2'); ?>" />
        <?php if (!empty(get_field('slider1_link'))): ?>
        </a>
        <?php endif; ?>

</div>

<div class="carousel-item ">
    <?php if (!empty(get_field('slider2_link'))): ?>
        <a href="#News">
    <?php endif; ?>
    <div class="carousel-caption" style="padding-bottom:  12%"  >
    <h2 class="text-white"><?php echo the_field('slider_title_3'); ?></h2>
    <h2 class="yellowTitle" ><?php echo the_field('slider_content_3'); ?></h2>
    <?php if (!empty(get_field('slider2_link'))): ?>
        </a >
    <?php endif; ?>
    </div>
        <?php if (!empty(get_field('slider2_link'))): ?>
            <a href="#News">
        <?php endif; ?>
            <img src="<?php echo $image3['url']; ?>" alt="<?php echo the_field('slider_title_3'); ?>" />
        <?php if (!empty(get_field('slider2_link'))): ?>
            </a>
        <?php endif; ?>
</div>

<?php endwhile; ?>
</div>

</section>