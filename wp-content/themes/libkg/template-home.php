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

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-xs-12 col-sm-7 col-lg-9">
      	<div class="jumbotron">
          <img src="<?php echo get_template_directory_uri()."/img/promo.png"; ?>" class="promoimg"/>
    		  <!--<h2 class="promoh2"><?php _e( 'home page promo title', 'ipt_kb' )  ?></h2> -->

    	  <p><?php _e( 'home page promo text', 'ipt_kb' )  ?> </p>
    	  <!-- <p><a class="btn btn-primary btn-lg pull-right" href="#" role="button"><?php _e( 'home page promo button text', 'ipt_kb' )  ?></a></p> -->
    		</div>
      </div>
      <div class="promobanners col-md-4 col-xs-12 col-sm-5 col-lg-3">

        <a href="" id="schoolbanner" class="promobanner"><span><?php _e( 'School', 'ipt_kb' ); ?></span></a>
        <a href="" id="dissbanner" class="promobanner"><span><?php _e( 'Dissertation', 'ipt_kb' ); ?></span></a>
        <a href="" id="libbanner" class="promobanner"><span><?php _e( 'Library', 'ipt_kb' ); ?></span></a>

      </div>
    </div>
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
	</div><!-- #primary -->
<?php get_footer(); ?>
