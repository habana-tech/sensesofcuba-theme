<?php
$post = $wp_query->post;

if ( in_category( 'work' ) ) {
  include( TEMPLATEPATH.'/single-news.php' );
} 
else {
  include( TEMPLATEPATH.'/single-news.php' );
}
?>



    