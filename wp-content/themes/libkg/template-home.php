<?php
/*
Template Name: home page
*/
/**
 * Page Template for a home page
 *
 *
 * @package iPanelThemes Knowledgebase
 */
get_header();
// TODO change template for home page
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

	<div id="primary" class="content-area">

		<div class="clearfix"></div>
		<div class="jumbotron">
		  <h1>Hello, world!</h1>
		  <p>sdfsdhfgsjdhf  jdhsgfj hsdgfj hdsgjfhdgjds </p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>
		<div class="clearfix"></div>
		<div class="latestbooks">
		<?php
		$args = array(  'numberposts'  => 6,
	                'orderby'      => 'date',
	                'order'        => 'DESC',
	                'post_type'    => 'post',
	                'post_status'  => 'publish' ,
	                'meta_query' => array(
	                    array(
	                        'key' => '_thumbnail_id',
	                        'compare' => '!=',
	                        'value' => null
	                    )
	                )
	            );

			$postslist = get_posts( $args );

			 	//_e( 'Latest books', 'ipt_kb' );

			echo '<h2><a href="#">'.__( 'Latest books', 'ipt_kb' ).'</a></h2>';

		//	echo '<ul id="latest_posts">';
			 foreach ($postslist as $post) :  setup_postdata($post); ?>

			<?php

				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			?>

			 <div class="latest_books col-md-2 col-xs-6 col-sm-4">
			 		<a href="<?php the_permalink(); ?>" class="thumbnail" title="<?php the_title();?>" data-toggle="tooltip" data-placement="top"> <?php 	the_post_thumbnail('thumbnail'); ?></a>
			 </div>

			<?php } ?>
			<?php endforeach; ?>
		<!--	 </ul> -->

		</div>


		<main id="main" class="site-main" role="main">

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
					<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>


		</main><!-- #main -->
		<div>под контентом </div>
	</div><!-- #primary -->
<?php get_footer(); ?>
