<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Photo Session
 */

get_header(); ?>

<?php if( is_home() && get_option('page_for_posts') ) { ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content container">
            <main id="main" class="site-main" role="main">
                <header class="page"><h1 class="entry-title">BLOG</h1></header>
                <div class="blog-post">
                    <?php 
                    /*$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                    $query = new WP_Query( array( 'paged' => $paged, 'posts_per_page' => 3 ) );*/ ?>
                    <?php if( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        <?php //skt_photo_session_custom_blogpost_pagination( $query ); ?>
                        <?php //wp_reset_postdata(); ?>
                        <?php skt_photo_session_pagination(); ?>
                    <?php else : ?>
                        <?php get_template_part( 'no-results', 'index' ); ?>
                    <?php endif; ?>
                </div><!-- blog-post -->
                <?php get_sidebar(); ?>
                <div class="clear"></div>
            </main><!-- main -->
    <?php get_footer(); ?>

<?php } else { ?>

		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html><?php } ?>