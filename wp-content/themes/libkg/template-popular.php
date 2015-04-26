<?php
/*
Template Name: Популярные материалы -  показывает где больше лайков
*/
/**
 *
 *
 * @package iPanelThemes Knowledgebase
 */

get_header();

$main_categories = get_categories( array(
	'taxonomy' => 'category',
	'parent' => 0,
	'hide_empty' => 0,
) );
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main lcontent" role="main">
			<?php //get_search_form(); ?>




			<div class="row kb-home-panels">
				<?php
				// Remove the filter from the Posts Order By Plugin
				if ( function_exists( 'CPTOrderPosts' ) ) {
					remove_filter( 'posts_orderby', 'CPTOrderPosts', 99, 2 );
				}

				// Popular posts
				// Prep the arguments
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => get_option( 'posts_per_page', 20 ),
					'order' => 'DESC',
					'meta_key' => 'ipt_kb_like_article',
					'orderby' => 'meta_value_num',
				);

				// Filter it for further customizability
				$args = apply_filters( 'ipt_kb_popular_posts_args', $args );

				// Build our custom query
				$popular_query = new WP_Query( $args );
				?>
				<div class="col-md-12">
					<div class="">
						<div class="panel-heading">
							<h1 class="entry-<title>Page Title</title>"><i class="glyphicon glyphicon-fire"></i>&nbsp;&nbsp;<?php _e( 'Popular articles', 'ipt_kb' ); ?></h1>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php if ( $popular_query->have_posts() ) : ?>
									<?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>
									<?php get_template_part( 'category-templates/content', 'popular' ); ?>
									<?php endwhile; ?>
								<?php else : ?>
									<?php get_template_part( 'category-templates/no-result' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php wp_reset_query(); ?>
			<?php
			// Add the filter from the Posts Order By Plugin
			if ( function_exists( 'CPTOrderPosts' ) ) {
				add_filter( 'posts_orderby', 'CPTOrderPosts', 99, 2 );
			}
			?>

			<?php // Finally add the actual page content ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => __( '<p class="pagination-p">Pages:</p>', 'ipt_kb' ) . '<ul class="pagination">',
									'after'  => '</ul><div class="clearfix"></div>',
								) );
							?>
						</div><!-- .entry-content -->
					</article>
				<?php endwhile; ?>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
