<?php
/**
 * @package iPanelThemes Knowledgebase - content single
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
	<h1 class="entry-title"><?php the_title(); ?>  <span style="color:green; font-size:18px;"><?php the_field('file-format'); ?></span> </h1>


	</header><!-- .entry-header -->

	<div class="entry-content <?php if ( has_post_thumbnail() ){ echo "wthumb";} ?>">



	<?php
	// TODO add empty thumbnail image just for general purposes/ question is active if we still nee it or if there is no image then!!!!

	if ( has_post_thumbnail() ) : ?>
	<!-- <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> -->
	<div>
		<?php the_post_thumbnail( 'medium', array( 'class' => 'alignleft bookcover' ) ); ?>
	<!-- </a> -->
	</div>
<?php endif; ?>
		<div>
			<?php

				the_content();

				$filetext=get_field('files');
				if($filetext)
				{
					if (is_numeric($filetext)) {
						$scode= "[wpfilebase tag=file id=".get_field('files')." /]";
						echo do_shortcode($scode);
					} else {
						//	echo "$filetext - НЕ число нужно сделать кнопку";
						echo '<a href='.$filetext.' class="btn btn-danger" target="_blank"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> &nbsp;'.__( 'download link', 'ipt_kb' ).'</a>';

						//glyphicon glyphicon-link
					}

				}
				else
				{
					echo "< !--".__( 'no files for download', 'ipt_kb' )."-->";
				}

			?>
		</div>


		<?php
			wp_link_pages( array(
				'before' => __( '<p class="pagination-p">Pages:</p>', 'ipt_kb' ) . '<ul class="pagination">',
				'after'  => '</ul><div class="clearfix"></div>',
			) );
		?>
	</div><!-- .entry-content -->



	<footer class="entry-meta text-muted well well-sm">
		<div class="entry-meta text-muted">
			<?php ipt_kb_posted_on(); ?>

		</div><!-- .entry-meta -->
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'ipt_kb' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'ipt_kb' ) );

			if ( ! ipt_kb_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged <i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;%2$s. <br />Bookmark the <i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;<a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				} else {
					$meta_text = __( 'Bookmark the <i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;<a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;%1$s and tagged <i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;%2$s. <br />Bookmark the <i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;<a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				} else {
					$meta_text = __( 'This entry was posted in <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;%1$s. <br />Bookmark the <i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;<a href="%3$s" rel="bookmark">permalink</a>.', 'ipt_kb' );
				}

			} // end check for categories on this blog


			printf(
				$meta_text='', // todo replace meta with sharing social buttons and stuff to think about
				$category_list,
				$tag_list,

				get_permalink()
			);


			/*
			$edu_level_arr=get_field('edu-level');

			if(sizeof($edu_level_arr)>0)
			{
			$custom_fields.=	__( 'Education level:', 'ipt_kb' );
			}

			foreach ($edu_level_arr as &$value) {
    	$custom_fields .= ' <a href="/?s='.$value.'">'.$value.'</a>,  ';

			}

			echo $custom_fields;
			*/


		?>

		<div>Поделиться </div>
			<!-- pluso start-->
			<script type="text/javascript">(function() {
		  if (window.pluso)if (typeof window.pluso.start == "function") return;
		  if (window.ifpluso==undefined) { window.ifpluso = 1;
		    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
		    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
		    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
		    var h=d[g]('body')[0];
		    h.appendChild(s);
		  }})();</script>
		<div class="pluso" data-background="none;" data-options="medium,square,line,horizontal,nocounter,sepcounter=1,theme=14" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir" data-user="1361344875"></div>


		<!-- pluso end-->

		<br/>
		<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<span class="edit-link"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
