<?php
require_once('wp-bootstrap-navwalker.php');

$PLL_PLUGIN_INSTALLED = true;
if (!function_exists('pll_register_string')) {
    $PLL_PLUGIN_INSTALLED = false;

    function pll_register_string($arg1, $arg2, $arg3, $arg4)
    {
        return null;
    }
    function pll_current_language()
    {
        return 'en';
    }
    function pll_default_language()
    {
        return 'en';
    }
    function pll_get_post_translations()
    {
        return null;
    }
    function pll_the_languages()
    {
        return null;
    }
}


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
    $dependencies = ['bootstrap','baseStyle','aosStyle','fancyboxStyle','slickStyle','slickThemeStyle', 'socialIcons'];
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

function my_theme_excerpt($length): int
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

function custom_excerpt($text, $length): string
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


function getGoogleTagManagerHeader(): string
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
}


function getIncentivesFileURL()
{
    $incentiveQuery = new WP_Query(['category_name'  => 'Mice',
    'posts_per_page' => 1,
    'lang' => 'en']);

    if (count($incentiveQuery->posts) > 0) {
        $post = $incentiveQuery->posts[0];
        $currentPost = getPostOrTranslationIfNeededAndExist($post);

        $content = $currentPost->post_content;
        preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $content, $matches);

        if (isset($matches[0][0])) {
            return $matches[0][0];
        }
    }
    return false;
}

//Ading Translations
pll_register_string('home_about_us_title', 'About Us', 'Homepage', true);



function getTranslatedStringFromDict($string): string
{
    $dict = [
        'navHome' => [
            'en' => 'Home',
            'de' => 'Home',
            'es' => 'Inicio'
        ],
        'navAboutUs' => [
            'en' => 'About Us',
            'de' => 'Über Uns',
            'es' => 'Sobre nosotros',
        ],
        'navOurTeam' => [
            'en' => 'Our Team',
            'de' => 'Unser Team',
            'es' => 'Nuestro equipo',
        ],
        'navProductsLeisure' => [
            'en' => 'Products Leisure',
            'de' => 'Produkte Leisure',
            'es' => 'Productos Ocio',
        ],
        'navProductsMICE' => [
            'en' => 'Products MICE',
            'de' => 'Produkte MICE',
            'es' => 'Productos MICE',
        ],
        'navMeetUs' => [
            'en' => 'Meet Us',
            'de' => 'Meet Us',
            'es' => 'Encuéntranos',
        ],
        'navJobs' => [
            'en' => 'Jobs',
            'de' => 'Job-Angebote',
            'es' => 'Empleos',
        ],
        'navNews' => [
            'en' => 'News',
            'de' => 'News',
            'es' => 'Noticias',
        ],
        'navEvents' => [
            'en' => 'Events',
            'de' => 'Events',
            'es' => 'Ultimas noticias',
        ],
        'navTestimonial' => [
            'en' => 'Testimonial',
            'de' => 'Kundenbewertungen',
            'es' => 'Testimonios',
        ],
        'navInfonet' => [
            'en' => 'Infonet',
            'de' => 'Infonet',
            'es' => 'Infonet'
        ],
        'navContactUs' => [
            'en' => 'Contact Us',
            'de' => 'Kontakt',
            'es' => 'Contáctenos',
        ],
//home
        'homeAboutUsTitleL1' => [
            'en' => 'ABOUT',
            'de' => 'ÜBER',
            'es' => 'SOBRE',
        ],
        'homeAboutUsTitleL2' => [
            'en' => 'US',
            'de' => 'UNS',
            'es' => 'NOSOTROS',
        ],
        'homeAboutUsText1' => [
            'en' => 'is your European travel agency with main office in the heart of Havana, close to all important sights and hotels. Focussing on a sophisticated upmarket clientele with tailormade programs for FITs, luxury travellers, special interest groups,',
            'de' => 'ist Ihre europäische Reiseagentur in Kuba - mit Hauptsitz im Herzen von Havanna, in der Nähe aller wichtigen Sehenswürdigkeiten und Hotels. Unser Service umfasst individualisierte Programme für FITs & Kleingruppen, Luxusreisen, Special Interest Gruppen,',
            'es' => 'es una agencia de viajes con las oficinas principales en el corazón de La Habana, cerca de todos los Hoteles y lugares importantes. Enfocados en  ofrecer programas hechos a la medida para una clientela sofisticada y de alto nivel, que incluye viajes de lujo para individuales y grupos, viajes de interés especial, cruceros,'
        ],
        'homeAboutUsIncentive' => [
            'en' => 'incentive groups',
            'de' => 'Incentive Gruppen',
            'es' => 'grupos de incentivo'
        ],
        'homeAboutUsText2' => [
            'en' => ", cruiseships and more. Profit from more than 16 years of experience in Cuba, a complex but fascinating destination. With a mixed European and Cuban team of about 30 professionals, we create unique programs and experiences for travellers showing both, the “nostalgic” and the “New Cuba”.  ",
            'de' => ", Kreuzfahrtunternehmen und vieles mehr. Dabei liegt unser Fokus auf einem anspruchsvollen, gehobenen Klientel. Profitieren Sie von mehr als 16 Jahren Erfahrung in Kuba, einem komplexen und gleichzeitig faszinierenden Reiseziel. 
Unser europäisch-kubanisches Team aus 25 Mitarbeitern erstellt für Sie individuelle und einzigartige Reisen, die Ihnen sowohl das nostalgische als auch das moderne Kuba zeigen.",
        'es' => "y más, aprovechando nuestros más de 16 años de experiencia en Cuba, un destino complejo pero fascinante.
        Con un equipo mixto de 25 profesionales  entre europeos y cubanos, creamos experiencias  y programas únicos para los viajeros, mostrándoles ambas, la “nostálgica” y la “NUEVA Cuba”."
        ],
        'homeAboutUsText3' => [
            'en' => "Bernd Herrmann (general manager and owner) living in Havana since 2001, and his team have created and managed a growing number of incentive- and tailormade programs in Cuba with clients from world renowned international companies reaching from the auto, finance, construction and food sector to the IT, insurance and pharmaceutical industry.",
            'de' => "Bernd Herrmann, Firmeninhaber und Geschäftsführerm der bereits seit 2001 in Havanna lebt, bringt Ihnen, zusammen mit seinem Team, die unglaubliche Vielfalt Kubas näher und führt unter anderem eine stetig steigende Anzahl an Incentive Reisen und personalisierten Programmen für Kunden internationaler Firmen der Automobil-, Finanz-, Konstruktions-, Lebensmittelbranche bis hin zu namhaften IT- und Pharmakonzernen durch.",
            'es' => "Bernd Herrmann (Gerente General y dueño) vive en la Habana desde 2001 y justo a su equipo ha creado y manejado un creciente número de incentivos y programas hechos a la medida en Cuba, con clientes de compañías mundialmente reconocidas, las cuales van desde el sector automovilístico, financiero, de la construcción, y el culinario, hasta el sector de la informática, los seguros y la industria farmacéutica. "
        ],
        'homeAboutUsText4' => [
            'en' => "The Senses of Cuba team is here to share it’s passion with you by offering different aspects of Cuba that do not follow the mass tourism. Working with one collective mission. ",
            'de' => "Unser Team von SENSES OF CUBA teilt seine Leidenschaft für Kuba mit Ihnen und zeigt Ihnen nebst den „Klassikern“ eine Vielfalt an unerwarteten und eindrucksvollen Aspekten der Insel, fernab vom Massentourismus. Ganz entsprechend unserer Firmenphilosophie: ",
            'es' => "El equipo de SENSES OF CUBA está aquí para compartir su pasión con usted, ofreciéndole diferentes aspectos de Cuba que no siguen los estándares del turismo de masa. Trabajando con una misión colectiva, "
        ],
        'homeAboutUsText5' => [
            'en' => "Because Cuba is more than our job, it’s our passion.",
            'de' => "Cuba is more than our job, it’s our passion.",
            'es' => "porque Cuba is more than our job, it’s our passion."
        ],

        //TEAM section
        'teamSectionTitleL1' => [
            'en' => 'THIS IS',
            'de' => 'Unser',
            'es' => 'ESTE ES'
        ],
        'teamSectionTitleL2' => [
            'en' => 'OUR TEAM',
            'de' => 'Team',
            'es' => 'NUESTRO EQUIPO'
        ],
        'teamAll' => [
            'en' => 'All',
            'de' => 'Alle',
            'es' => 'Todos',
        ],
        'teamGM' => [
            'en' => 'GM',
            'de' => 'Geschäftsführung',
            'es' => 'Gerencia General',
        ],
        'teamSales' => [
            'en' => 'Sales',
            'de' => 'Verkauf',
            'es' => 'Ventas',
        ],
        'teamProduct' => [
            'en' => 'Product',
            'de' => 'Product Management',
            'es' => 'Producto',
        ],
        'teamReservations' => [
            'en' => 'Reservations',
            'de' => 'Reservierung',
            'es' => 'Reservas',
        ],
        'teamDatabase' => [
            'en' => 'Database',
            'de' => 'Database',
            'es' => 'Base de Datos',
        ],
        'teamOperations' => [
            'en' => 'Operations',
            'de' => 'Operations',
            'es' => 'Operaciones',
        ],
        'teamClientsAssistance' => [
            'en' => 'Clients Assistance',
            'de' => 'Kundenbetreuung',
            'es' => 'Asistencia a clientes',
        ],
        'teamAccounting' => [
            'en' => 'Accounting',
            'de' => 'Buchhaltung',
            'es' => 'Contabilidad',
        ],
//footer
        'footerContactUsL1' => [
            'en' => 'CONTACT',
            'de' => 'KONTAKTIEREN SIE',
            'es' => 'CONTACTENOS',
        ],
        'footerContactUsL2' => [
            'en' => 'US',
            'de' => 'UNS',
            'es' => '',
        ],
        'footerAddress' => [
            'en' => 'ADDRESS',
            'es' => 'DIRECCIÓN',
            'de' => 'ADRESSE',
        ],
        'footerAddressL2' => [
            'en' => 'Vedado, Plaza , Havana, CUBA',
        ],
        'footerGeneralContact' => [
            'en' => 'GENERAL CONTACT',
            'es' => 'CONTACTO GENERAL',
            'de' => 'ALLGEMEINER KONTAKT'
        ],
        'footerPhone' => [
            'en' => 'PHONE',
            'es' => 'TELÉFONO',
            'de' => 'TELEFON'
        ],
        'footerSales' => [
            'en' => 'SALES',
            'es' => 'VENTAS',
            'de' => 'VERKAUF'
        ],
        'footerEmergencyPhone' => [
            'en' => 'EMERGENCY PHONE',
            'es' => 'TELÉFONO DE EMERGENCIA',
            'de' => 'NOTFALLTELEFON'
        ],
        'footerProductManagement' => [
            'en' => 'PRODUCT MANAGEMENT',
            'es' => 'PRODUCT MANAGEMENT',
            'de' => 'PRODUKT MANAGEMENT'
        ],
        'footerOpeningTimes' => [
            'en' => 'OPENING TIMES',
            'es' => 'HORARIOS DE APERTURA',
            'de' => 'BÜRO-ÖFFNUNGSZEITEN'
        ],
        'footerOpeningTimesValue' => [
            'en' => 'Monday-Friday: 09:00-17:00',
            'es' => 'Lunes-Viernes: 09:00-17:00',
            'de' => 'Montag – Freitag: 9:00 – 17:00 Uhr'
        ],
        'footerOpeningTimesValue2' => [
            'en' => 'Saturday-Sunday (and public holidays):',
            'es' => 'Sábados-Domingos (y días feriados):',
            'de' => 'Samstag – Sonntag (und Feiertagen):'
        ],
        'footerOpeningTimesValue3' => [
            'en' => '10:00-16:00',
            'es' => '10:00-16:00',
            'de' => '10:00 – 16:00 Uhr'
        ],
        'footerFOLLOW_US_ON' => [
            'en' => 'FOLLOW US ON',
            'de' => 'FOLGEN SIE UNS AUF',
            'es' => 'SÍGUENOS EN',
        ],
        'footerAll_rights_reserved' => [
            'en' => 'All rights reserved',
            'de' => 'Alle Rechte vorbehalten',
            'es' => 'Todos los derechos reservados',
        ],
        'footerImprint' => [
            'en' => 'Legal Notice',
            'es' => 'Legal',
            'de' => 'Impressum'
        ],
        'footerPrivacyPolicy' => [
            'en' => 'Privacy Policy',
            'es' => 'Política de Privacidad',
            'de' => 'Datenschutzbestimmungen '
        ],
        'footerGeneralTermsAndConditions' => [
            'en' => 'General Terms and Conditions',
            'es' => 'Términos y Condiciones Generales',
            'de' => 'Allgemeine Geschäftsbedingungen'
        ],
        'footerCooperations' => [
            'en' => 'Cooperations',
            'es' => 'Cooperaciones',
            'de' => 'Kooperationen'
        ],
        //mEETus
        'meetUsTitleL1' => [
            'en' => 'MEET',
            'es' => 'ENCUÉNTRANOS',
            'de' => 'MEET'
        ],
        'meetUsTitleL2' => [
            'en' => 'US',
            'es' => '',
            'de' => 'US'
        ],
        //JOBS
        'jobsTitle' => [
            'en' => 'JOBS',
            'es' => 'EMPLEOS',
            'de' => 'Job-Angebote'
        ],
        'jobsView' => [
            'en' => 'VIEW',
            'es' => 'VER',
            'de' => 'ÖFFNEN'
        ],
        //section NEWS
        'newsTitleL1' => [
            'en' => 'LATEST',
            'de' => 'NEUIGKEITEN',
            'es' => 'ULTIMAS',
        ],
        'newsTitleL2' => [
            'en' => 'NEWS',
            'de' => '',
            'es' => 'NOTICIAS',
        ],
        //Testimonial section
        'testimonialTitle' => [
            'en' => 'TESTIMONIAL',
            'de' => 'KUNDENBEWERTUNGEN',
            'es' => 'TESTIMONIOS',
        ],
        //Products section
        'productsTitleL1' => [
            'en' => 'PRODUCTS',
            'de' => 'PRODUKTE',
            'es' => 'PRODUCTOS',
        ],
        'productsTitleL2' => [
            'en' => 'LEISURE & MICE',
            'de' => 'LEISURE & MICE',
            'es' => 'LEISURE & MICE',
        ],
        //news section

        'newsReadMore' => [
            'en' => 'Read more',
            'de' => 'Weiterlesen',
            'es' => 'Leer más',
        ],
        'newsAllNews' => [
            'en' => 'All News',
            'de' => 'Alle Nachrichten',
            'es' => 'Más noticias',
        ],
    ];

    if (isset($dict[$string][pll_current_language()])) {
        return $dict[$string][pll_current_language()];
    }
    if (isset($dict[$string][pll_default_language()])) {
        return $dict[$string][pll_default_language()];
    }
    return '';
}

function echoTranslatedString($string)
{
    echo getTranslatedStringFromDict($string);
}

function isNeededTranslation(): bool
{
    $currentLang = pll_current_language();
    $defaultLang = pll_default_language();
    return ($currentLang != $defaultLang);
}

function getPostOrTranslationIfNeededAndExist($postObject)
{
    $originalPostId = $postObject->ID;
    $translation = null;
    if (isNeededTranslation()) {  //get the translation if exist
        $translations = pll_get_post_translations($originalPostId);
        if (isset($translations[pll_current_language()])) {
            $translation = get_post($translations[pll_current_language()]);
            if ($translation->post_status != 'publish') { //only of post is published
                $translation = null;
            }
        }
    }

    return (isNeededTranslation() && $translation != null) ? $translation : $postObject;
}

function getPageObjectBySlug(string $slug): ?WP_Post
{
    $page = new WP_Query(['pagename'  => $slug, 'post_type' => 'page']);
    if ($page->post instanceof WP_Post && $page->is_page) {
        return $page->post;
    }
    return null;
}

function getPageLinkBySlug(string $slug): string
{
    $page = getPageObjectBySlug($slug);
    return $page ? get_page_link(getPageObjectBySlug($slug)) : '#';
}


function getAttachmentPost($post): ?array
{
    if (is_array($post)) {
        return [
            'url' => $post['url'],
            'title' => $post['title'],
            'alt' => $post['title'], //alias to be compatible with old code
            'sizes' => $post['sizes'] ?? null
        ];
    }

    return null;
}
