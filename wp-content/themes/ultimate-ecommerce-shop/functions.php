<?php
/**
 * Ultimate Ecommerce Shop functions and definitions
 * @package Ultimate Ecommerce Shop
 */


/* Theme Setup */
if ( ! function_exists( 'ultimate_ecommerce_shop_setup' ) ) :

function ultimate_ecommerce_shop_setup() {

	$GLOBALS['content_width'] = apply_filters( 'ultimate_ecommerce_shop_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('ultimate-ecommerce-shop-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ultimate-ecommerce-shop' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_editor_style( array( 'assets/css/editor-style.css', ultimate_ecommerce_shop_font_url() ) );

}
endif; // ultimate_ecommerce_shop_setup
add_action( 'after_setup_theme', 'ultimate_ecommerce_shop_setup' );

/*Site URL*/
define('ultimate_ecommerce_shop_CREDIT','https://www.logicalthemes.com/','ultimate-ecommerce-shop');
if ( ! function_exists( 'ultimate_ecommerce_shop_credit' ) ) {
	function ultimate_ecommerce_shop_credit(){
		echo "<a href=".esc_url(ultimate_ecommerce_shop_CREDIT)." target='_blank'>".esc_html__('Logical Themes','ultimate-ecommerce-shop')."</a>";
	}
}

/*radio button sanitization*/
function ultimate_ecommerce_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme Widgets Setup */
function ultimate_ecommerce_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on posts and pages', 'ultimate-ecommerce-shop' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears on header', 'ultimate-ecommerce-shop' ),
		'id'            => 'social-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ultimate-ecommerce-shop' ),
		'description'   => __( 'Appears in footer', 'ultimate-ecommerce-shop' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ultimate_ecommerce_shop_widgets_init' );

function ultimate_ecommerce_shop_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Karla:400,400i,700';
	$font_family[] = 'Tajawal:200,300,400,500,700,800,900';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */
function ultimate_ecommerce_shop_scripts() {
	wp_enqueue_style( 'ultimate-ecommerce-shop-font', ultimate_ecommerce_shop_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'ultimate-ecommerce-shop-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'ultimate-ecommerce-shop-style', 'rtl', 'replace' );
	wp_enqueue_style( 'ultimate-ecommerce-shop-customcss', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );	 
	wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/assets/css/nivo-slider.css' );
	wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'ultimate-ecommerce-shop-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ultimate_ecommerce_shop_scripts' );

function ultimate_ecommerce_shop_ie_stylesheet(){
	wp_enqueue_style('ultimate-ecommerce-shop-ie', get_template_directory_uri().'/assets/css/ie.css', array('ultimate-ecommerce-shop-basic-style'));
	wp_style_add_data( 'ultimate-ecommerce-shop-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','ultimate_ecommerce_shop_ie_stylesheet');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/custom-widgets/social-profile.php';