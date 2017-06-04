<?php
/**
 * @package SKT Photo Session
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('skt_photo_session_optionsframework_custom_scripts', 'skt_photo_session_optionsframework_custom_scripts');
function skt_photo_session_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}


add_action('wp_head','skt_photo_session_hook_custom_javascript');
function skt_photo_session_hook_custom_javascript(){?>
	<script>
    jQuery(document).ready(function() {
        jQuery("#header-bottom-shape").click(function(){
            if ( jQuery( "#site-nav" ).is( ":hidden" ) ) {
                jQuery( "#site-nav" ).slideDown("slow");
            } else {
                jQuery( "#site-nav" ).slideUp("slow");
            }
            jQuery( this ).toggleClass('showDown');
        });
        jQuery( "#site-nav li:last" ).addClass("noBottomBorder");
        jQuery( "#site-nav li:parent" ).find('ul.sub-menu').parent().addClass("haschild");
    });
	</script>
    <?php
    $front_page = get_option('page_on_front');
	$post_page = get_option('page_for_posts');
    ?>
	<?php if( (is_front_page() || is_home()) && ($front_page == 0 && $post_page == 0) ){ ?>
		<style type="text/css">
		#wrapper{min-width:94% !important; width:94% !important;}
		#secondary{float:left;}
        </style><?php 
	}
}

?>