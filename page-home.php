
<?php
/*
Template Name: Accueil
*/
get_header(); ?>

<section id="ecole">
	<div id="studio">
		<div class="row">
			<article>
				<h2>L'école</h2>

				<?php query_posts( 'category_name=studio&orderby=date&order=ASC' );
				 if ( have_posts() ) : while ( have_posts() ) : the_post();

				echo '<h3>' .get_the_title(). '</h3>';
				the_content();
				endwhile;
				endif;
				?>

			</article>
		</div>

		<div class="bg-studio">
			<div data-type="background" data-fix="200" data-speed=".3"></div>
		</div>
	</div>

	<div id="equipe">
		<div class="row">
			<article>
				<header>
					<h3>Les cours</h3>
				</header>
				<div class="content">

					<?php query_posts( 'category_name=equipe&orderby=date&order=ASC' );
				 	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<div class="profil">
							<?php echo get_the_post_thumbnail( $post->ID, '' ); ?>
							<div class="bar"></div>

							<h4><?php the_title(); ?></h4>
							<?php the_content(); ?>
						</div>

					<?php
					endwhile;
					endif;
					?>

					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<section id="cours" data-type="background" data-fix="200" data-speed=".4">
	<div class="inner">
		<header>
			<h2><?php echo get_cat_name(6) ?></h2>
			<h3><?php echo get_cat_name(16) ?></h3>
		</header>
		<article class="col-1">
			<div class="content">
				<?php query_posts( 'p=54' );
				 if ( have_posts() ) : while ( have_posts() ) : the_post();
				 	the_content();
				endwhile;
				endif;
				?>
			</div>
		</article>
		<article class="col-2">
			<div class="content">
				<?php query_posts( 'p=56' );
				 if ( have_posts() ) : while ( have_posts() ) : the_post();
				 	the_content();
				endwhile;
				endif;
				?>
			</div>
		</article>
	</div>
</section>
<section id="sports-aeriens">
	<div class="inner">
		<header>
			<h3>Pole aérien</h3>
		</header>
		<article class="col-1">
			<div class="content">
				<?php query_posts( 'p=477' );
				 if ( have_posts() ) : while ( have_posts() ) : the_post();
				 	the_content();
				endwhile;
				endif;
				?>
			</div>
		</article>
		<article class="col-2">
			<div class="content">
				<?php query_posts( 'p=479' );
				 if ( have_posts() ) : while ( have_posts() ) : the_post();
				 	the_content();
				endwhile;
				endif;
				?>
			</div>
		</article>
		<article class="col-12 plannings">
			<?php query_posts( 'category_name=plannings&orderby=date&order=ASC' );
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
				endwhile;
				endif;
			?>
		</article>
	</div>
</section>

<section id="events">
	<div class="event">
		<header>
			<h2>Événements</h2>
		</header>
		<?php query_posts( 'category_name=events&orderby=date&order=ASC' ); $index = 1;
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				echo '<article id="event-'.$index. '"">';
				the_content();
				echo '</article>';
				$index++;
			endwhile;
			endif;
		?>

	</div>
</section>

<section id="tarifs">
	<article>
		<div class="row">
			<div class="abonnements">
				<h2>Les tarifs</h2>
				<?php query_posts( 'category_name=tarifs&orderby=date&order=ASC' );
					 if ( have_posts() ) : while ( have_posts() ) : the_post();
					 	the_content();
					endwhile;
					endif;
				?>
			</div>
		</div>
	</article>
	<div id="dance-tarif" data-type="background" data-fix="320" data-speed=".3"></div>
</section>

<section id="contact">
	<div class="formulaire">
		<article>
			<h2>Contact</h2>
			<form action="<?php echo get_template_directory_uri() ; ?>/library/sendmail.php" method="post">
	            <input type="text" name="name" id="name" placeholder="Nom" required />

	            <input type="email" name="email" id="email" placeholder="Email" required />

	            <textarea name="comment" id="comment" placeholder="Message" cols="30" rows="6"></textarea>

	            <p class="request">* Champs obligatoires</p>
	            <input type="submit" value="Envoyer" class="button" />

	            <address>Pole Dance Grenoble<br/>
		            	7 rue des arts et métiers - 38000 GRENOBLE<br/>
		            	14 A Rue Mayencin à GIÈRES/SAINT MARTIN D'HÈRES<br/>
		            	<a href="mailto:poledancegrenoble@hotmail.fr">poledancegrenoble@hotmail.fr</a>
		        	</address>
							<p class="telephone">
								Téléphone : 06 35 22 86 36 <br/>
								(Du Lundi au Vendredi de 9h à 13h)
							</p>
	            <div id="confirm-message"><p></p><span class="close">x</span></div>
	        </form>
		</article>
	</div>
	<div id="map_zone"></div>
</section>


<?php get_footer(); ?>
