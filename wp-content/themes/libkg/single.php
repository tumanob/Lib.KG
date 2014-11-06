<?php
/**
 * The Template for displaying all single posts.
 *
 * @package iPanelThemes Knowledgebase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				// check the category of the post to load template that we need
				if ( in_category( 5 ) || post_is_in_descendant_category( 5 ) ) {
				// in books category
							 get_template_part( 'content', 'book' );
						}
						else
						{
							get_template_part( 'content', 'single' );
						}

			?>
			<?php //get_template_part( 'content', 'single' ); ?>

			<?php ipt_kb_like_article(); ?>

			<?php ipt_kb_content_nav( 'nav-below' ); // replace this with similar post from the same category as on tramp?>

			<?php //ipt_kb_author_meta(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
