<?php get_header(); ?>
<section class="error">
	<article>
		<header>
			<h1 class="entry-title"><?php _e('File Not Found', 'FoundationPress'); ?></h1>
		</header>
		<div class="error">
			<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'FoundationPress'); ?></p>
		</div>
		<p><?php _e('Please try the following:', 'FoundationPress'); ?></p>
		<ul>
			<li><?php _e('Check your spelling', 'FoundationPress'); ?></li>
			<li><?php printf(__('Return to the <a href="%s">home page</a>', 'FoundationPress'), home_url()); ?></li>
			<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'FoundationPress'); ?></li>
		</ul>
	</article>
</div>

<?php get_footer(); ?>
