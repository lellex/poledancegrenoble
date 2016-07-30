<?php
/*
Single Post Template: Jeux Concours
Description: This part is optional, but helpful for describing the Post Template
*/
?>

<div id="studio">
	<div class="row">
		<article>
			<h2><?php echo get_cat_name(4) ?></h2>

			<?php
			// The Query
			query_posts( 'cat=3' );

			// The Loop
			while ( have_posts() ) : the_post(); ?>

				<h3><?php the_title(); ?></h3>
				<div class="content">
					<?php the_content(); ?>
				</div>

			<?php endwhile;

			// Reset Query
			wp_reset_query(); ?>

		</article>
	</div>
	
	<div class="bg-studio">
		<div class="parallax" data-velocity="-.2" data-fit="-200"></div>
	</div>
</div>

<div id="equipe">
	<div class="row">
		<article>
			<header>
				<h3><?php echo get_cat_name(5) ?></h3>
			</header>
			<div class="content">
				
				<?php
				// The Query
				query_posts( array( 'category__and' => array(5), 'orderby' => 'date', 'order' => 'ASC' ) );

				// The Loop
				while ( have_posts() ) : the_post(); ?>

					<div class="profil">
						<?php echo get_the_post_thumbnail( $post->ID, 'product-400x600' ); ?>
						<?php wp_get_attachment_image_src( $image_id, 'full' ); ?>
						<div class="bar"></div>

						<h4><?php the_title(); ?></h4>
						<?php the_content(); ?>
					</div>

				<?php endwhile;

				// Reset Query
				wp_reset_query(); ?>
					
				</div>
			</div>
		</article>
	</div>
</div>