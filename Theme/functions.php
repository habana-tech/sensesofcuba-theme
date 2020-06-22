<?php
require_once('wp-bootstrap-navwalker.php');

function my_theme_setup() {
    // Ready for i18n
    load_theme_textdomain( "my_theme", TEMPLATEPATH . "/languages");
 
    // Use thumbnails
    add_theme_support( 'post-thumbnails' );
 
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
 
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
 
    // Enable support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height' => 240,
        'width' => 240,
        'flex-height' => true,
    ) );
 
    // Register Navigation Menus
    register_nav_menus(array(
        'header-menu' => 'Header Menu'
        
    ));
    @ini_set( 'upload_max_size' , '64M' );
    @ini_set( 'post_max_size', '64M');
    @ini_set( 'max_execution_time', '300' );
    
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );


function theme_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_register_style('baseStyle', get_template_directory_uri() . '/style.css' );
    wp_register_style('aosStyle', get_template_directory_uri() . '/assets/css/aos.css' );
    wp_register_style('fancyboxStyle', get_template_directory_uri() . '/assets/css/jquery.fancybox.css');
    wp_register_style('slickStyle', get_template_directory_uri() . '/assets/css/slick.css');
    wp_register_style('slickThemeStyle', get_template_directory_uri() . '/assets/css/slick-theme.css');
    wp_register_style('socialIcons', get_template_directory_uri() . '/assets/social/css/fontello.css');
    $dependencies = array('bootstrap','baseStyle','aosStyle','fancyboxStyle','slickStyle','slickThemeStyle', 'socialIcons');
	wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}

function theme_enqueue_scripts() {
    
    wp_enqueue_script('jquery-script', get_template_directory_uri().'/assets/js/jquery.min.js' );
    wp_enqueue_script('popper-script', get_template_directory_uri().'/assets/js/popper.min.js' );
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js' );
    wp_enqueue_script('fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js' );
    wp_enqueue_script('aosJs', get_template_directory_uri().'/assets/js/aos.js' );
    wp_enqueue_script('slickJs', get_template_directory_uri().'/assets/js/slick.min.js' );
}

add_action('wp_enqueue_scripts','theme_enqueue_styles');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts');

function my_theme_remove_headlinks() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'start_post_rel_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link' );
    remove_action( 'wp_head', 'parent_post_rel_link' );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'my_theme_remove_headlinks' );

function my_theme_excerpt($length) {
    return 25;
}
add_filter('excerpt_length', 'my_theme_excerpt');



function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Attachments',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );

function custom_excerpt($text,$length) {
  $text = strip_shortcodes( $text );
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]>', $text);
/*  $excerpt_length = apply_filters('excerpt_length', 5);*/
  $excerpt_more = apply_filters('excerpt_more', ' ' . '...');
  //return apply_filters('the_excerpt', $text);
  return wp_trim_words( $text, $length, $excerpt_more );
}

//
//function wp_maintenance_mode() {
//    if (!current_user_can('edit_themes') || !is_user_logged_in()) {
//        wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
//    }
//}
//add_action('get_header', 'wp_maintenance_mode');
?>
