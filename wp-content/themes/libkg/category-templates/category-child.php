<?php
/**
 * @package iPanelThemes Knowledgebase
 */
global $term_meta, $cat, $cat_id, $wp_query;

// Check if the current category is not a first level category
// This will happen if the current category does not have any child
// If this is the case, then we simply show all it's posts
// Instead of the nice knowledgebase type things
if ( $cat->parent != '0' ) {
	$parent_cat = get_category( $cat->parent );
	while ( $parent_cat->parent != '0' ) {
		$parent_cat = get_category( $parent_cat->parent );
	}
	$pterm_meta = get_option( 'ipt_kb_category_meta_' . $parent_cat->term_id, array() );
} else {
	$pterm_meta = $term_meta;
}
$pcat_totals = ipt_kb_total_cat_post_count( $cat_id ); ?>

		<?php if ( have_posts() ) : ?>

			<header class="kb-parent-category-header">
				<?php //echo $term_meta['icon_class'] ?>
				<?php if (  $term_meta['icon_class'] !='' ) { ?>
					<div class="col-sm-3 col-lg-2 kb-subcat-icon hidden-xs">
							<p class="text-center">
								<a href="<?php echo esc_url( get_category_link( $cat ) ); ?>" class="thumbnail">
									<i class="glyphicon <?php echo esc_attr( $term_meta['icon_class'] ); ?>"></i>
								</a>
							</p>
						</div>
					<div class="col-sm-9 col-lg-10">
				<?php } else { ?>
					<div class="col-sm-12 col-lg-12">
				<?php }  ?>


					<h1 class="page-title kb-scat-title">
						<span class="pull-right label label-info"><?php printf( _n( '%d article', '%d articles', $pcat_totals, 'ipt_kb' ), $pcat_totals ); ?></span>
						<?php single_cat_title(); ?>
						<?php if ( $wp_query->max_num_pages > 1 && isset( $wp_query->query_vars['paged'] ) && $wp_query->query_vars['paged'] != 0 ) : ?>
							<small class="text-muted"><?php printf( __( 'Page %1$d / %2$d', 'ipt_kb' ), $wp_query->query_vars['paged'], $wp_query->max_num_pages ); ?></small>
						<?php endif; ?>
					</h1>
						<?php if ( $term_meta['icon_class'] !='' ) { ?>
							<div class="col-sm-3 col-lg-2 kb-subcat-icon visible-xs">
									<p class="text-center">
										<a href="<?php echo esc_url( get_category_link( $cat ) ); ?>" class="thumbnail">
											<i class="glyphicon <?php echo esc_attr( $term_meta['icon_class'] ); ?>"></i>
										</a>
									</p>
								</div>
						<?php }  ?>






					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description well well-sm">%s</div>', $term_description );
						endif;
					?>

					<div id='child_subcat'>

						<?php
							$categories = get_categories(array('hide_empty' => true, 'child_of' => $cat_id,'parent'   => $cat_id));
						// todo  - get list just of upper sub-categories
						?>
						<!--	child subcat -  <?php echo $cat_id;?> -->
							<div class="list-group">
								<?php
								foreach ( $categories as $category ) {

									?>
								<link><?php get_category_link( $category->cat_ID ); ?>
									<a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="<?php echo get_category_link( $category->term_id ); ?>">
										<span class="badge"><?php echo wp_get_cat_postcount($category->term_id);?></span>
										<h3><span class="glyphicon ipt-icon-file"></span>  <?php echo $category->name.$scat->term_id; ?></h3>
										<span class="clearfix"></span>
									</a>
									<?php
										}
									?>
						</div>

					</div>

				</div>
				<div class="clearfix"></div>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content' ); ?>
			<?php endwhile; ?>
			<?php ipt_kb_content_nav( 'nav-below' ); ?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>
