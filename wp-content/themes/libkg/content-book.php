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

	$filetext=get_field('files');

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
				echo '	<div class="alert alert-danger" role="alert">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						  '.__( 'no files found', 'ipt_kb' ).'
							</div>';

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



	<footer class="entry-meta text-muted well well-sm row">
		<div class="entry-meta text-muted col-md-6">
			<?php ipt_kb_posted_on(); ?>
		</div>
		
		<div class="booksharing  col-md-6"><span><?php _e( 'Share', 'ipt_kb' ); ?></span>
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
		</div>

		<!-- pluso end-->

		<br/>
		<?php edit_post_link( __( 'Edit', 'ipt_kb' ), '<span class="edit-link"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
