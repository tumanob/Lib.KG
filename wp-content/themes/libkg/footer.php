<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package iPanelThemes Knowledgebase
 */
?>

	</div><!-- #content -->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<?php
		wp_nav_menu( array(
			'menu'              => 'footer',
			'theme_location'    => 'footer',
			'depth'             => 4,
			'container'         => '',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker())
		);
		?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			<div class="col-md-4" id="footer-widget-2">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		</div>
		<div class="site-info-partner row">
			<div class="col-md-8 partner">
				<img src="<?php echo get_template_directory_uri(); ?>/img/soros.png" style="  border: 1px solid #ccc;
  border-radius: 10px; margin-right: 10px;" class="pull-left"/>
				<?php _e( 'partner text', 'ipt_kb' ); ?>
			</div>

			<div class="copyright text-muted col-md-4">
				<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Лицензия Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
				</a>
				<?php _e( 'CC', 'ipt_kb' ); ?>
			</div>

			<?php do_action( 'ipt_kb_credits' ); ?>
		</div><!-- .site-info -->
	</div>

		<?php wp_footer(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->



<script type="text/javascript">
    var reformalOptions = {
        project_id: 852260,
        project_host: "libkg.reformal.ru",
        tab_orientation: "bottom-right",
        tab_indent: "10px",
        tab_bg_color: "#45ed93",
        tab_border_color: "#FFFFFF",
        tab_image_url: "http://tab.reformal.ru/T9GC0LfRi9Cy0Ysg0Lgg0L%252FRgNC10LTQu9C%252B0LbQtdC90LjRjw==/FFFFFF/07330bc5004dd1d3a4e80c777f77d3dc/bottom-right/0/tab.png",
        tab_border_width: 1
    };

    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript'; script.async = true;
        script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v3/reformal.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    })();
</script><noscript><a href="http://reformal.ru"><img src="http://media.reformal.ru/reformal.png" /></a><a href="http://libkg.reformal.ru">Oтзывы и предложения для Lib.kg - Электронная библиотека</a></noscript>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter29184260 = new Ya.Metrika({id:29184260,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/29184260" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>
</html>
