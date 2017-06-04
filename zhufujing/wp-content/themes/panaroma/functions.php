<?php
/**
 * SKT Panaroma functions and definitions
 *
 * @package SKT Panaroma
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'panaroma_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function panaroma_setup() {
	load_theme_textdomain( 'panaroma', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_image_size('homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'panaroma' ),
	) );
	register_nav_menus( array(
		'useful' => __( 'Useful links', 'panaroma' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'E6E1C4',
		'default-image' => get_template_directory_uri().'/images/img/third-image.jpg',
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // panaroma_setup
add_action( 'after_setup_theme', 'panaroma_setup' );


function panaroma_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'panaroma' ),
		'description'   => __( 'Appears on blog page sidebar', 'panaroma' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'panaroma_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function panaroma_fonts_url(){
		$font_url = '';
		
		$robot_condensed = _x('on', 'Roboto Condensed: on or off', 'panaroma');
		/* Translators:If any character not supported in your theme
		*  translate this to off, Do not translate to your own language.
		*/
		
		$roboto = _x('on', 'Roboto : on or off', 'panaroma');
		/* Translators: If any character in your theme not supported 
		* by Roboto, translate this to 'off'. Do not translate 
		* to your own language.
		*/
		
		if(  'off' !==  $robot_condensed  || 'off' !==  $roboto){
			$font_families = array();
			
			if('off' !== $robot_condensed){
			$font_families[] = 'Roboto Condensed:300,400,600,700';
			}
			
			if('off' !== $roboto){
			$font_families[] = 'Roboto:300,400,600,700';
			}
			$query_args = array(
				'family'	=> urlencode(implode('|' , $font_families)),
			);
			
			$font_url =	add_query_arg($query_args, '//fonts.googleapis.com/css'); 
		}
		return $font_url;
	}

function panaroma_scripts() {
	wp_enqueue_style('panaroma-font', panaroma_fonts_url(), array(), null);
	wp_enqueue_style( 'panaroma-basic-style', get_stylesheet_uri() );
	if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
		if (of_get_option('sidebar-layout', true) ==  'right') {
			wp_enqueue_style( 'panaroma-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
		}
		else {
			wp_enqueue_style( 'panaroma-layout', get_template_directory_uri()."/css/layouts/sidebar-content.css" );
		}	
	}
	else {
		wp_enqueue_style( 'panaroma-layout', get_template_directory_uri()."/css/layouts/content-sidebar.css" );
	}	
	
	wp_enqueue_style( 'panaroma-editor-style', get_template_directory_uri()."/editor-style.css", array('panaroma-layout') );

	wp_enqueue_style( 'panaroma-main-style', get_template_directory_uri()."/css/main.css", array('panaroma-layout') );	
	
	wp_enqueue_script('panroma-jquery-min', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array('jquery') );
	
	wp_enqueue_script('panaroma-custom-script', get_template_directory_uri().'/js/custom.js', array('jquery'));
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'panaroma_scripts' );

function panaroma_custom_head_codes() {
	if ( (function_exists( 'of_get_option' )) && (of_get_option('headcode1', true) != 1) ) {
		echo esc_html( of_get_option('headcode1', true) );
	}
	if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
		echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
	}
	
	if ( function_exists( 'of_get_option' )  )  {
		echo "<style>";
		if( of_get_option('navigation_icon', true) != '' ){
			echo "#site-nav ul li a:hover, #site-nav li.current_page_item a{background-image:url(".of_get_option('navigation_icon',true).")}";
		}
		if( of_get_option('navigation_color', true) != '' ){
			echo "#site-nav ul li a:hover, #site-nav li.current_page_item a, div.slide-title a:hover, a, .entry-meta a, .widget ul li a:hover, .footer-menu ul li a:hover, .social a:hover, .footer-bottom a, h2.entry-title a:hover{color:".of_get_option('navigation_color',true).";}mark, ins, a, .entry-meta a, .read-more a:hover, .recent-post .post-box .post-text a, aside ul li a:hover, .widget ul li a:hover, .footer-menu ul li a:hover, .social a:hover, .footer-bottom a,{color:".of_get_option('navigation_color',true).";}button, html input[type=\"button\"], input[type=\"reset\"],input[type=\"submit\"]{background-color:".of_get_option('navigation_color',true).";}";
		}
		if( (of_get_option('pagin_grad_top_color',true) != '') && (of_get_option('pagin_grad_bottom_color',true) != '') ){
			echo ".pagination ul  > li  > a, .pagination ul  > li  > span{background:linear-gradient(".of_get_option('pagin_grad_top_color',true).", ".of_get_option('pagin_grad_bottom_color',true).") !important; background:-moz-linear-gradient(".of_get_option('pagin_grad_top_color',true).", ".of_get_option('pagin_grad_bottom_color',true).") !important; background:-webkit-linear-gradient(".of_get_option('pagin_grad_top_color',true).", ".of_get_option('pagin_grad_bottom_color',true).") !important; background:-o-linear-gradient(".of_get_option('pagin_grad_top_color',true).", ".of_get_option('pagin_grad_bottom_color',true).") !important;}.pagination ul  > li:hover > a, .pagination ul  > li > span.current{background:linear-gradient(".of_get_option('pagin_grad_bottom_color',true).", ".of_get_option('pagin_grad_top_color',true).") !important; background:-moz-linear-gradient(".of_get_option('pagin_grad_bottom_color',true).", ".of_get_option('pagin_grad_top_color',true).") !important; background:-webkit-linear-gradient(".of_get_option('pagin_grad_bottom_color',true).", ".of_get_option('pagin_grad_top_color',true).") !important; background:-o-linear-gradient(".of_get_option('pagin_grad_bottom_color',true).", ".of_get_option('pagin_grad_top_color',true).") !important;}";
		}
		if( of_get_option('navigation_color',true) != ''){
			echo ".social a:hover .icon, .grid-port-item:hover .grid-port-fadder, .strip_template figure section:hover .strip-fadder, .strip_template figure section.hovered .strip-fadder, .featured_items .img_block:hover .featured_item_fadder{background-color:".of_get_option('navigation_color',true)."}";
		}
		echo "</style>";
	}	

}	
add_action('wp_head', 'panaroma_custom_head_codes');


function panaroma_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


function panaroma_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}


function panaroma_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}



// Add support for Vertical Featured Images
if ( ! function_exists( 'panaroma_vertical_check' ) ) :
	function panaroma_vertical_check( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	$image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'large' );
	//Get the image width and height from the data provided by wp_get_attachment_image_src()
	$width = $image_data[1];
	$height = $image_data[2];
	if ( $height > $width ) {
	$html = str_replace( 'attachment-', 'vertical-image attachment-', $html );
	}
return $html;
}
endif;
add_filter( 'post_thumbnail_html', 'panaroma_vertical_check', 10, 5 ); 