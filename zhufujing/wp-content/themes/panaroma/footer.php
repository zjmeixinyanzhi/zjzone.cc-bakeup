<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Panaroma
 */
?>


  </div><!-- wrapper -->	
	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="foot_col_container">
            <div class="footer-menu"><h2><?php _e('Main Menu','panaroma'); ?></h2>
                <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'menu_class' => '') ); ?>
            </div><!-- footer-menu -->
            <div class="footer-menu"><h2><?php _e('Useful Links','panaroma'); ?></h2>
                <?php wp_nav_menu( array('theme_location' => 'useful', 'container' => '', 'menu_class' => '') ); ?>
            </div><!-- footer-menu -->
            <div class="social"><h2><?php _e('Follow Us','panaroma'); ?></h2>
                <div class="container">
                   <?php if ( of_get_option('facebook', true) != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(of_get_option('facebook', true)); ?>" title="Facebook" ><div class="fb icon"></div><span>Facebook</span></a>
                         <?php } ?>
                        <?php if ( of_get_option('twitter', true) != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(of_get_option('twitter', true)); ?>" title="Twitter" ><div class="twitt icon"></div><span>Twitter</span></a>
                         <?php } ?>
                         <?php if ( of_get_option('google', true) != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(of_get_option('google', true)); ?>" title="Google Plus" ><div class="gplus icon"></div><span>Google +</span></a>
                         <?php } ?>
                         <?php if ( of_get_option('linkedin', true) != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(of_get_option('linkedin', true)); ?>" title="Linkedin" ><div class="linkedin icon"></div><span>Linkedin</span></a>
                         <?php } ?>
                </div>
            </div><!-- social -->
            <div class="contact"><h2><?php _e('Contact Info','panaroma'); ?></h2>
                 <h3 class="company-title"><?php echo esc_html( of_get_option('contact1', true) ); ?></h3>
                 <p><?php echo esc_html( of_get_option('contact2', true) ); ?></p>
                 <p><?php echo esc_html( of_get_option('contact3', true) ); ?></p>
                 <?php if(of_get_option('contact4', true) != ''){ ?>
                 <p><strong><?php _e('Phone','panaroma'); ?> :</strong> <?php echo esc_html( of_get_option('contact4', true) ); ?></p>
                 <?php } ?>
                 <?php if(of_get_option('contact5', true) != '') { ?>
                 <p><strong><?php _e('Email','panaroma'); ?> :</strong> <a href="mailto:<?php echo sanitize_email( of_get_option('contact5', true) ); ?>"><?php echo sanitize_email( of_get_option('contact5', true) ); ?></a></p>
                 <?php } ?>
            </div><!-- contact -->
            <div class="clear"></div>
        </div>
	</footer><!-- #colophon -->
  <div class="footer-bottom">
	  <div class="foot_col_container">
        <div class="bottom-left">
        	<?php
			if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
			 	echo esc_html( of_get_option('footertext2', true) ); 
			} ?>
        </div><!-- bottom-left -->    
        <div class="bottom-right">
			<?php do_action( 'panaroma_credits' ); ?>
			<?php _e('Panaroma Theme by','panaroma'); ?> <a href="<?php echo esc_url( SKT_URL ); ?>" target="_blank"><?php _e('SKT Themes','panaroma'); ?></a>
		</div><!-- bottom-right --><div class="clear"></div>
        </div><!-- footer-bottom -->
        </div>
	</div>
</div><!-- #page -->



<?php wp_footer(); ?>
</body>
</html>