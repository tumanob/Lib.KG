<?php
/**
 * @package iPanelThemes Knowledgebase
 */
global $term_meta, $cat, $cat_id, $sub_categories;
$pcat_totals = ipt_kb_total_cat_post_count( $cat_id );
?>
	<header class="kb-parent-category-header row">

		<div class="col-sm-4 col-md-3 col-lg-2 kb-pcat-icon hidden-xs">
			<?php if ( isset( $term_meta['image_url'] ) && '' != $term_meta['image_url'] ) : ?>
			<p class="text-center">
				<img class="img-circle" src="<?php echo esc_attr( $term_meta['image_url'] ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" />
			</p>
			<?php endif; ?>
			<div class="caption">
			<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
				<p class="text-center"><a class="btn btn-default btn-block" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
					<i class="glyphicon ipt-icon-support"></i> <?php _e( 'Get Support', 'ipt_kb' ); ?>
				</a></p>
			<?php endif; ?>
			</div>
		</div>
		<div class="col-sm-8 col-md-9 col-lg-10">
			<h1 class="page-title">
				<span class="pull-right label label-info"><?php printf( _n( '%d article', '%d articles', $pcat_totals, 'ipt_kb' ), $pcat_totals ); ?></span>
				<?php single_cat_title(); ?>
			</h1>
			<div class="kb-pcat-icon visible-xs">
				<?php if ( isset( $term_meta['image_url'] ) && '' != $term_meta['image_url'] ) : ?>
				<p class="text-center">
					<img class="img-circle" src="<?php echo esc_attr( $term_meta['image_url'] ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" />
				</p>
				<?php endif; ?>
				<div class="caption">
				<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
					<p class="text-center"><a class="btn btn-default btn-block" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
						<i class="glyphicon ipt-icon-support"></i> <?php _e( 'Get Support', 'ipt_kb' ); ?>
					</a></p>
				<?php endif; ?>
				</div>
			</div>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description well well-sm">%s</div>', $term_description );
				endif;
			?>
		</div>
		<div class="clearfix"></div>
	</header><!-- .page-header -->


	<div class="row kb-cat-parent-row">
		<?php
		//echo print_r($sub_categories);
		/* Start the subcategory loop */ ?>
		<?php $cat_iterator = 0;

		foreach ( $sub_categories as $scat ) :
			//print_r($scat);
		?>
		<?php $sterm_meta = get_option( 'ipt_kb_category_meta_' . $scat->term_id, array() ); ?>
		<?php $sterm_link = esc_url( get_category_link( $scat ) ); ?>
		<?php $scat_totals = ipt_kb_total_cat_post_count( $scat->term_id ); ?>
		<?php $scat_posts = new WP_Query( array(
			'cat' => $scat->term_id,
			'posts_per_page' => get_option( 'posts_per_page', 10 ),
		) ); ?>
		<div class="col-md-6 kb-subcat">
			<div class="col-md-3 col-sm-2 hidden-xs kb-subcat-icon">
				<p class="text-center">
					<a href="<?php echo $sterm_link; ?>" class="thumbnail">
						<?php if ( isset( $sterm_meta['icon_class'] ) && '' != $sterm_meta['icon_class'] ) : ?>
						<i class="glyphicon <?php echo esc_attr( $sterm_meta['icon_class'] ); ?>"></i>
						<?php else : ?>
						<i class="glyphicon ipt-icon-books"></i>
						<?php endif; ?>
					</a>
				</p>
			</div>
			<div class="col-md-9 col-sm-10 col-xs-12">
				<h2 class="knowledgebase-title"><a data-placement="bottom" data-popt="kb-homepage-popover-<?php echo $scat->term_id; ?>" title="<?php echo esc_attr( sprintf( __( '%1$s / %2$s', 'ipt_kb' ), $cat->name, $scat->name ) ); ?>" href="#" class="btn btn-default btn-sm text-muted ipt-kb-popover"><i class="glyphicon ipt-icon-paragraph-justify2"></i></a> <?php echo $scat->name; ?></h2>
				<div class="ipt-kb-popover-target" id="kb-homepage-popover-<?php echo $scat->term_id; ?>">
					<?php echo wpautop( $scat->description ); ?>
					<p class="text-right">
						<?php if ( isset( $term_meta['support_forum'] ) && '' != $term_meta['support_forum'] ) : ?>
						<a class="btn btn-default" href="<?php echo esc_url( $term_meta['support_forum'] ); ?>">
							<i class="glyphicon ipt-icon-support"></i> <?php _e( 'Get support', 'ipt_kb' ); ?>
						</a>
						<?php endif; ?>
						<a href="<?php echo $sterm_link; ?>" class="btn btn-info">
							<i class="glyphicon ipt-icon-link"></i> <?php _e( 'Browse all', 'ipt_kb' ); ?>
						</a>
					</p>
				</div>

				<div class="visible-xs kb-subcat-icon">
					<p class="text-center">
						<a href="<?php echo $sterm_link; ?>" class="thumbnail">
							<?php if ( isset( $sterm_meta['icon_class'] ) && '' != $sterm_meta['icon_class'] ) : ?>
							<i class="glyphicon <?php echo esc_attr( $sterm_meta['icon_class'] ); ?>"></i>
							<?php else : ?>
							<i class="glyphicon ipt-icon-books"></i>
							<?php endif; ?>
						</a>
					</p>
				</div>

					<?php
					//$category_ID=$scat->term_id;
					/*$args = array(
					  'orderby' => 'name',
					  'parent' => 0,
						'child_of'=> $category_ID
					);
					$categories = get_categories( $args );
*/
					$categories = get_categories(array('hide_empty' => true, 'child_of' => $scat->term_id));
					// todo  - get list just of upper categories
					?>
					<div class="list-group">
					<?php
					foreach ( $categories as $category ) {
					//	print_r($category);
						?>
					<link><?php get_category_link( $category->cat_ID ); ?>
						<a rel="bookmark" class="list-group-item kb-list-date kb-post-list" href="<?php echo get_category_link( $category->term_id ); ?>">
							<span class="badge"><?php echo wp_get_cat_postcount($category->term_id);?></span>
							<h3><span class="glyphicon ipt-icon-file"></span>  <?php echo $category->name.$scat->term_id; ?></h3>
							<span class="clearfix"></span>
						</a>
						<?php
						//echo $scat->term_id;;
						//echo '123'.'<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br/>';
					}
					// todo тут нужно сделать 2 шаблона дл ятсниац и категорий чтобы выводило то что нам нужно для каждой категории и темблейт
					?>
				</div>
				<!--
				<div class="list-group">
					<?php 		if ( $scat_posts->have_posts() ) : ?>
						<?php 		while ( $scat_posts->have_posts() ) : $scat_posts->the_post(); ?>
						<?php 			get_template_part( 'category-templates/content', 'popular' ); ?>
						<?php 		endwhile; ?>
					<?php 		else : ?>
						<?php 		get_template_part( 'category-templates/no-result' ); ?>
					<?php 		endif; ?>
				</div>
				-->

				<p class="text-right">
					<a class="btn btn-default" href="<?php echo $sterm_link; ?>"><i class="glyphicon ipt-icon-link"></i> <?php printf( _n( 'Browse %d article', 'Browse all %d articles', $scat_totals, 'ipt_kb' ), $scat_totals ); ?></a>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php wp_reset_query(); ?>
		<?php $cat_iterator++; if ( $cat_iterator %2 == 0 ) echo '<div class="clearfix"></div>'; ?>
		<?php endforeach; ?>
		<div class="clearfix"></div>
	</div>
