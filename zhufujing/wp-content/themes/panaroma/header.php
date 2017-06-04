<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Panaroma
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="strip_template">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
		<?php if( is_front_page() && !get_option('page_for_posts') && !get_option('page_on_front'))  { ?>
		<figure data-count="5" data-width="20" class="strip-menu">
       
       <?php for($i=1; $i<6; $i++) { ?>
      	<?php if( of_get_option('slide'.$i, true) != '' ) { ?>
        	<?php if( of_get_option('slide'.$i,true) == 1) { ?>
            <?php //echo $i; ?>
            	<section style="background-image: url(<?php echo get_template_directory_uri() ; ?>/images/img/image<?php echo $i; ?>.jpg); width: 20%;" class="strip-item">
            <div class="strip-fadder"></div>
            <a class="wrapped_link" href="#"></a>
            <div class="strip-text">
                <div>
                    <h3 class="strip-caption"><?php _e('Go to Appearance >> Theme Options >> Restore Defaults','panaroma'); ?>.</h3>
                </div>
            </div>
            <span class="logo"><?php _e('Reset Theme Options','panaroma'); ?></span>          
        </section>
        <?php } else { ?>
        <section style="background-image: url(<?php echo of_get_option('slide'.$i, true) ?>); width: 20%;" class="strip-item">
            <div class="strip-fadder"></div>
            <a class="wrapped_link" href="<?php echo of_get_option('slideurl'.$i, true); ?>"></a>
            <div class="strip-text">
                <div>
                    <h3 class="strip-caption"><?php echo of_get_option('slidedesc'.$i, true); ?></h3>
                </div>
            </div>
            <span class="logo"><?php echo of_get_option('slidetitle'.$i, true); ?></span>          
        </section>
    
    	 <?php } } } ?>
         </figure>
		<?php }  else {		
						$featured_as_background = esc_html( of_get_option('featured_as_background', true) );
						if( is_page() || $featured_as_background != 1 && has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
							$imgUrl = $large_image_url[0];
							echo "<div style='background:url(".$imgUrl.") no-repeat;background-size:cover'>";
						}elseif(is_single() || is_category() || is_archive() || is_author() || is_search()){
							$other_page_url = get_template_directory_uri().'/images/img/first-banner.jpg' ;
							echo "<div style='background:url(".$other_page_url.") no-repeat;background-size:cover'>";
					} } ?>

	<?php if( ! is_home() || ! is_front_page()) { ?>
    <div id="wrapper">
    <?php } ?>
            <div class="header">
            		
                <div class="logo">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    	<?php if( true == of_get_option('logo') ) { ?>
	                    	<img src="<?php echo esc_url( of_get_option('logo', true) ); ?>" />
                        <?php } else { ?>
							<?php bloginfo( 'name' ); ?>
                        <?php } ?>
                    </a></h1>
                    <?php if(of_get_option('logo', true) != '') { ?>
                    <p class="site-description" style="display:none;"><?php bloginfo( 'description' ); ?></p>
                    <?php } ?>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                </div>
              
                <div id="site-nav">
                    <h1 class="mobile_nav"><?php _e( 'Menu', 'panaroma' ); ?></h1>
                    <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'menu_class' => 'navi') ); ?>
                </div><!-- site-nav --><div class="clear"></div>
            </div><!-- header -->
       
          