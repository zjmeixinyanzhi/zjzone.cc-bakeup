<?php
/**
 * @package SKT Panaroma
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('panaroma_optionsframework_custom_scripts', 'panaroma_optionsframework_custom_scripts');
function panaroma_optionsframework_custom_scripts() { ?>
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


add_action('wp_head','panaroma_hook_custom_javascript');
function panaroma_hook_custom_javascript(){?>
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
}

define('SKT_THEME_URL_DIRECT','http://www.sktthemes.net/themes/panaroma_pro/');
define('SKT_URL','http://www.sktthemes.net');
define('SKT_THEME_URL','http://www.sktthemes.net/themes');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/panaroma-documentation/');