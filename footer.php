<div id="mentions">
	<div class="row">
		<p>
			Design par <a href="http://pierrealicepierre.com/" title="Site d'Alice Pierre" target="_blank">Alice Pierre</a> - Développement Wordpress par <a href="http://lellex.fr/" title="Site d'Alexandra JANIN" target="_blank">Alexandra JANIN</a>
		</p>
	</div>
</div>

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri() ; ?>/js/jquery/dist/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ; ?>/js/pdg.min.js"></script>
<?php wp_reset_query();
if( is_home() || is_front_page() ) :?>
	<script src="<?php echo get_stylesheet_directory_uri() ; ?>/js/pdg-home.min.js"></script>
<?php endif; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54312132-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>
