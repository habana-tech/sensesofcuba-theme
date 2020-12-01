<?php
require_once('wp-bootstrap-navwalker.php');

function my_theme_setup()
{
    // Ready for i18n
    load_theme_textdomain("my_theme", TEMPLATEPATH . "/languages");
 
    // Use thumbnails
    add_theme_support('post-thumbnails');
 
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
 
    // Let WordPress manage the document title.
    add_theme_support('title-tag');
 
    // Enable support for custom logo.
    add_theme_support('custom-logo', array(
        'height' => 240,
        'width' => 240,
        'flex-height' => true,
    ));
 
    // Register Navigation Menus
    register_nav_menus(array(
        'header-menu' => 'Header Menu'
        
    ));
    @ini_set('upload_max_size', '64M');
    @ini_set('post_max_size', '64M');
    @ini_set('max_execution_time', '300');
    
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support('html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ));
}
add_action('after_setup_theme', 'my_theme_setup');


function theme_enqueue_styles()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_register_style('baseStyle', get_template_directory_uri() . '/style.css');
    wp_register_style('aosStyle', get_template_directory_uri() . '/assets/css/aos.css');
    wp_register_style('fancyboxStyle', get_template_directory_uri() . '/assets/css/jquery.fancybox.css');
    wp_register_style('slickStyle', get_template_directory_uri() . '/assets/css/slick.css');
    wp_register_style('slickThemeStyle', get_template_directory_uri() . '/assets/css/slick-theme.css');
    wp_register_style('socialIcons', get_template_directory_uri() . '/assets/social/css/fontello.css');
    $dependencies = array('bootstrap','baseStyle','aosStyle','fancyboxStyle','slickStyle','slickThemeStyle', 'socialIcons');
    wp_enqueue_style('bootstrapstarter-style', get_stylesheet_uri(), $dependencies);
}

function theme_enqueue_scripts()
{
    wp_enqueue_script('jquery-script', get_template_directory_uri().'/assets/js/jquery.min.js');
    wp_enqueue_script('popper-script', get_template_directory_uri().'/assets/js/popper.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js');
    wp_enqueue_script('fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js');
    wp_enqueue_script('aosJs', get_template_directory_uri().'/assets/js/aos.js');
    wp_enqueue_script('slickJs', get_template_directory_uri().'/assets/js/slick.min.js');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function my_theme_remove_headlinks()
{
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    remove_action('wp_head', 'parent_post_rel_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'my_theme_remove_headlinks');

function my_theme_excerpt($length)
{
    return 25;
}
add_filter('excerpt_length', 'my_theme_excerpt');



function my_attachments($attachments)
{
    $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __('Title', 'attachments'),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __('Caption', 'attachments'),  // label to display
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
    'button_text'   => __('Attach Files', 'attachments'),

    // text for modal 'Attach' button (string)
    'modal_text'    => __('Attach', 'attachments'),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

    $attachments->register('my_attachments', $args); // unique instance name
}

add_action('attachments_register', 'my_attachments');

function custom_excerpt($text, $length)
{
    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    /*  $excerpt_length = apply_filters('excerpt_length', 5);*/
    $excerpt_more = apply_filters('excerpt_more', ' ' . '...');
    //return apply_filters('the_excerpt', $text);
    return wp_trim_words($text, $length, $excerpt_more);
}

//
//function wp_maintenance_mode() {
//    if (!current_user_can('edit_themes') || !is_user_logged_in()) {
//        wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
//    }
//}
//add_action('get_header', 'wp_maintenance_mode');


function getGoogleTagManagerHeader()
{
    return <<<ANALITYCTAG

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172516493-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172516493-1');
  
</script>

ANALITYCTAG;

//    return <<<TAGMANAGER
//
//<!-- Google Tag Manager -->
//<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
//            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
//        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
//        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
//    })(window,document,'script','dataLayer','GTM-MRG9TDZ');</script>
//<!-- End Google Tag Manager -->
//
//TAGMANAGER;
}

function getGoogleTagManagerBody()
{
    return;
//    return <<<TAGMANAGER
//
//<!-- Google Tag Manager (noscript) -->
//<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRG9TDZ"
//                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
//<!-- End Google Tag Manager (noscript) -->
//
//TAGMANAGER;
}


function getIncentivesFileURL()
{
    $incentiveQuery = new WP_Query(array( 'pagename' => 'soc-incentive-and-mice-overview' ));
    if ($incentiveQuery->is_page()) {
        $pageID = $incentiveQuery->get_queried_object()->ID;
        $incentiveFile = new Attachments('attachments', $pageID);
        $incentiveFileUrl = null;
        if ($incentiveFile->exist()) {
            while ($attachment = $incentiveFile->get()) {
                if ($incentiveFile->url() != null) {
                    $incentiveFileUrl = $incentiveFile->url();
                    return $incentiveFileUrl;
                }
                break;
            }
        }
    }
    return false;
}

//Ading Translations
pll_register_string('home_about_us_title', 'About Us', 'Homepage', true);

function getTranslatedStringFromDict($string)
{
    $dict = [
        'navHome' => [
            'en' => 'Home',
            'de' => 'Home'
        ],
        'navAboutUs' => [
            'en' => 'About Us',
            'de' => 'Über Uns'
        ],
        'navOurTeam' => [
            'en' => 'Our Team',
            'de' => 'Unser Team'
        ],
        'navProductsLeisure' => [
            'en' => 'Products Leisure',
            'de' => 'Produkte Leisure'
        ],
        'navProductsMICE' => [
            'en' => 'Products MICE',
            'de' => 'Produkte MICE'
        ],
        'navMeetUs' => [
            'en' => 'Meet Us',
            'de' => 'Meet Us'
        ],
        'navJobs' => [
            'en' => 'Jobs',
            'de' => 'Jobs'
        ],
        'navNews' => [
            'en' => 'News',
            'de' => 'News'
        ],
        'navEvents' => [
            'en' => 'Events',
            'de' => 'Events'
        ],
        'navTestimonial' => [
            'en' => 'Testimonial',
            'de' => 'Kundenbewertungen'
        ],
        'navInfonet' => [
            'en' => 'Infonet',
            'de' => 'Infonet'
        ],
        'navContactUs' => [
            'en' => 'Contact Us',
            'de' => 'Kontaktieren sie Uns'
        ],
//home
        'homeAboutUsTitleL1' => [
            'en' => 'ABOUT',
            'de' => 'ÜBER'
        ],
        'homeAboutUsTitleL2' => [
            'en' => 'US',
            'de' => 'UNS'
        ],
        'homeAboutUsText1' => [
            'en' => 'is your European DMC with a main office in the heart of Havana, close to all important sights and hotels. Focussing on a sophisticated upmarket clientele with tailormade programs for FITs, luxury travellers, special interest groups,',
            'de' => 'ist Ihre europäische Incoming-Agentur in Kuba - mit Hauptsitz im Herzen von Havanna, in der Nähe aller wichtigen Sehenswürdigkeiten und Hotels. Unser Service umfasst individualisierte Programme für FITs & Kleingruppen, Luxusreisen, Special Interest Gruppen,'
        ],
        'homeAboutUsIncentive' => [
            'en' => 'incentive groups',
            'de' => 'Incentive Gruppen'
        ],
        'homeAboutUsText2' => [
            'en' => ", cruiseships and more. Profit from more than 16 years of experience in Cuba, a complex but fascinating destination. With a mixed European and Cuban team of about 30 professionals, we create unique programs and experiences for travellers showing both, the “nostalgic” and the “New Cuba”.  ",
            'de' => ", Kreuzfahrtunternehmen und vieles mehr. Dabei liegt unser Fokus auf einem anspruchsvollen, gehobenen Klientel. Profitieren Sie von mehr als 16 Jahren Erfahrung in Kuba, einem komplexen und gleichzeitig faszinierenden Reiseziel. 
Unser europäisch-kubanisches Team aus 25 Mitarbeitern erstellt für Sie individuelle und einzigartige Reisen, die Ihnen sowohl das nostalgische als auch das moderne Kuba zeigen."
        ],
        'homeAboutUsText3' => [
            'en' => "Bernd Herrmann (general manager and owner) living in Havana since 2001, and his team have created and managed a growing number of incentive- and tailormade programs in Cuba with clients from world renowned international companies reaching from the auto, finance, construction and food sector to the IT, insurance and pharmaceutical industry.",
            'de' => "Bernd Herrmann, Firmeninhaber und Geschäftsführerm der bereits seit 2001 in Havanna lebt, bringt Ihnen, zusammen mit seinem Team, die unglaubliche Vielfalt Kubas näher und führt unter anderem eine stetig steigende Anzahl an Incentive Reisen und personalisierten Programmen für Kunden internationaler Firmen der Automobil-, Finanz-, Konstruktions-, Lebensmittelbranche bis hin zu namhaften IT- und Pharmakonzernen durch."
        ],
        'homeAboutUsText4' => [
            'en' => "The Senses of Cuba team is here to share it’s passion with you by offering different aspects of Cuba that do not follow the mass tourism. Working with one collective mission. ",
            'de' => "Unser Team von SENSES OF CUBA teilt seine Leidenschaft für Kuba mit Ihnen und zeigt Ihnen nebst den „Klassikern“ eine Vielfalt an unerwarteten und eindrucksvollen Aspekten der Insel, fernab vom Massentourismus. Ganz entsprechend unserer Firmenphilosophie: "
        ],

        //TEAM section
        'teamSectionTitleL1' => [
            'en' => 'THIS IS',
            'de' => 'Unser'
        ],
        'teamSectionTitleL2' => [
            'en' => 'OUR TEAM',
            'de' => 'Team'
        ],
        'teamAll' => [
            'en' => 'All',
            'de' => 'Alle'
        ],
        'teamGM' => [
            'en' => 'GM',
            'de' => 'Geschäftsführung'
        ],
        'teamSales' => [
            'en' => 'Sales',
            'de' => 'Verkauf'
        ],
        'teamProduct' => [
            'en' => 'Product',
            'de' => 'Product Management'
        ],
        'teamReservations' => [
            'en' => 'Reservations',
            'de' => 'Reservierung'
        ],
        'teamDatabase' => [
            'en' => 'Database',
            'de' => 'Database'
        ],
        'teamOperations' => [
            'en' => 'Operations',
            'de' => 'Operations'
        ],
        'teamClientsAssistance' => [
            'en' => 'Clients Assistance',
            'de' => 'Kundenbetreuung'
        ],
        'teamAccounting' => [
            'en' => 'Accounting',
            'de' => 'Buchhaltung'
        ],
//footer
        'footerContactUsL1' => [
            'en' => 'CONTACT',
            'de' => 'KONTAKTIEREN SIE'
        ],
        'footerContactUsL2' => [
            'en' => 'US',
            'de' => 'UNS'
        ],
        'footerAddress' => [
            'en' => 'ADDRESS',
            'de' => 'ADRESSE'
        ],
        'footerGeneralContact' => [
            'en' => 'GENERAL CONTACT',
            'de' => 'ALLGEMEINER KONTAKT'
        ],
        'footerPhone' => [
            'en' => 'PHONE',
            'de' => 'TELEFON'
        ],
        'footerSales' => [
            'en' => 'SALES',
            'de' => 'SALES'
        ],
        'footerEmergencyPhone' => [
            'en' => 'EMERGENCY PHONE',
            'de' => 'NOTFALLTELEFON'
        ],
        'footerProductManagement' => [
            'en' => 'PRODUCT MANAGEMENT',
            'de' => 'PRODUKT MANAGEMENT'
        ],
        'footerOpeningTimes' => [
            'en' => 'OPENING TIMES',
            'de' => 'BÜRO-ÖFFNUNGSZEITEN'
        ],
        'footerOpeningTimesValue' => [
            'en' => 'Monday-Friday: 09:00-17:00',
            'de' => 'Montag – Freitag: 9:00 – 17:00 Uhr'
        ],
        'footerOpeningTimesValue2' => [
            'en' => 'Saturday-Sunday (and public holidays):',
            'de' => 'Samstag – Sonntag (und an öffentlichen Feiertagen):'
        ],
        'footerOpeningTimesValue3' => [
            'en' => '10:00-16:00',
            'de' => '10:00 – 16:00 Uhr'
        ],
        'footerFOLLOW_US_ON' => [
            'en' => 'FOLLOW US ON',
            'de' => 'FOLGEN SIE UNS AUF'
        ],
        'footerAll_rights_reserved' => [
            'en' => 'All rights reserved',
            'de' => 'Alle Rechte vorbehalten'
        ],
        'footerImprint' => [
            'en' => 'Imprint',
            'de' => 'Druck'
        ],
        'footerPrivacyPolicy' => [
            'en' => 'Privacy Policy',
            'de' => 'Datenschutzbestimmungen '
        ],
        'footerGeneralTermsAndConditions' => [
            'en' => 'General Terms and Conditions',
            'de' => 'Allgemeine Geschäftsbedingungen'
        ],
        'footerCooperations' => [
            'en' => 'Cooperations',
            'de' => 'Kooperationen'
        ],
        //JOBS
        'jobsTitle' => [
            'en' => 'JOBS',
            'de' => 'Job-Angebote'
        ],
        'jobsView' => [
            'en' => 'VIEW',
            'de' => 'ÖFFNEN'
        ],
        //section NEWS
        'newsTitleL1' => [
            'en' => 'LATEST',
            'de' => 'NEUIGKEITEN'
        ],
        'newsTitleL2' => [
            'en' => 'NEWS',
            'de' => ''
        ],
        //Testimonial section
        'testimonialTitle' => [
            'en' => 'TESTIMONIAL',
            'de' => 'KUNDENBEWERTUNGEN'
        ],
        //Products section
        'productsTitleL1' => [
            'en' => 'PRODUCTS',
            'de' => 'PRODUKTE'
        ],
        'productsTitleL2' => [
            'en' => 'LEISURE & MICE',
            'de' => 'LEISURE UND MICE'
        ],
    ];

    if (isset($dict[$string][pll_current_language()])) {
        return $dict[$string][pll_current_language()];
    }
    return '';
}

function echoTranslatedString($string)
{
    echo getTranslatedStringFromDict($string);
}
