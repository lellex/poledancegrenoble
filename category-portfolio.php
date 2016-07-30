<?php get_header(); ?>

<section id="portfolio">
	<?php 
	if ( have_posts() ) : ?>

	<header>
		<h1><?php single_cat_title( '', true ); ?></h1>
	</header>

	<?php			

			query_posts( array( 'category_name'=>'portfolio', 'orderby'=>'date','order'=>'ASC' ) );

			while ( have_posts() ) : the_post();

			get_template_part( 'content', get_post_format() );

			endwhile;

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
	?>
</section>

<?php get_footer(); ?>
