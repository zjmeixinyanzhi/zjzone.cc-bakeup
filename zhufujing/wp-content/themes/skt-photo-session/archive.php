<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Photo Session
 */

get_header(); ?>

	<div id="primary" class="content-area">
    	  <div id="content" class="site-content container">
		<main id="main" class="site-main" role="main">
			
					<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'skt-photo-session' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'skt-photo-session' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'skt-photo-session' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'skt-photo-session' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'skt-photo-session' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'skt-photo-session' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'skt-photo-session' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'skt-photo-session' );

						else :
							_e( 'Archives', 'skt-photo-session' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
				<div class="blog-post">
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php skt_photo_session_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
				</div><!-- blog-post --><div class="clear"></div>
		</main><!-- #main -->
        </div><!-- #content -->
        </div><!-- #primary -->
        
        <div id="secondary" class="widget-area" role="complementary">
        <?php get_sidebar(); ?>
       </div><!-- secondary --><div class="clear"></div>


<?php get_footer(); ?>
