<?php
/**
 * @package iPanelThemes Knowledgebase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'kb-article-excerpt' ); ?>>
	<header class="entry-header page-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="clearfix"></div>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="pull-left kb-thumb-medium hidden-xs">
		<a rel="bookmark" href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'ipt_tb_medium', array(
			'class' => 'img-rounded tmedium',
		) ); ?></a>
	</div>
	<div class="kb-thumb-large visible-xs">
		<a rel="bookmark" href="<?php the_permalink(); ?>" class="thumbnail"><?php the_post_thumbnail( 'ipt_kb_large', array(
			'class' => 'img tlarge',
		) ); ?></a>
	</div>
	<?php endif; ?>



	<div class="entry entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="clearfix"></div>

	<div>
		<p class="visible-xs">
			<a rel="bookmark" href="<?php the_permalink(); ?>" class="btn btn-download btn-sm btn-block"><i class="glyphicon glyphicon-link"></i> <?php _e( 'Dowload this', 'ipt_kb' ); ?></a>
		</p>
		<p class="pull-left hidden-xs tweaked-margin-right-10">
			<a rel="bookmark" href="<?php the_permalink(); ?>" class="btn btn-download btn-sm"><i class="glyphicon glyphicon-link"></i> <?php _e( 'Dowload this', 'ipt_kb' ); ?></a>
		</p>
	</div>

	<div class="clearfix"></div>
	<footer class="entry-meta">

		<p class="text-muted hidden-xs meta-data">
			<?php ipt_kb_posted_on(); ?>

			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'ipt_kb' ) );
					if ( $categories_list && ipt_kb_categorized_blog() ) :
				?>
				<span class="cat-links">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;<?php printf( __( 'Posted in %1$s', 'ipt_kb' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'ipt_kb' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<i class="glyphicon glyphicon-tags"></i> <?php printf( __( 'Tagged %1$s', 'ipt_kb' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>


  	</p>
		<div class="clearfix"></div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<div class="clearfix"></div>
