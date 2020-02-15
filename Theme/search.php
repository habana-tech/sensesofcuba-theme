<?php
/*
Template Name: Search Page
*/
?>
<?php get_header()?>
<div class="container">
<form action="<?php echo bloginfo().'/?s='.the_search_query();?>" method="get">
    <label for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" />
    <br/>
    <input type="submit" class="btn btn-danger"  />
</form>
<br/>
<?php

get_search_query();

?>
<?php while ( have_posts() ) : the_post();
		?>	
		<div class="row " >
			<div   > 
				<h3><?php echo the_title();?></h3>
				<p><?php echo the_content();?></p>
				<br/>
				
			</div>
    	</div>   
    	<?php endwhile;?>


</div>
<?php get_footer()?>