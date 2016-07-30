<div class="formulaire">
	<article>
		<h2>Contact</h2>
		<form action="<?php echo get_stylesheet_directory_uri() ; ?>/library/sendmail.php" method="post">
            <input type="text" name="name" id="name" placeholder="Nom" required />

            <input type="email" name="email" id="email" placeholder="Email" required />

            <textarea name="comment" id="comment" placeholder="Message" cols="30" rows="6"></textarea>

            <p class="request">* Champs obligatoires</p>
            <input type="submit" value="Envoyer" class="button" />

            <address>Pole Dance Grenoble<br/>
            	7 rue des arts et métiers - 38000 GRENOBLE<br/>
            	<a href="mailto:poledancegrenoble@hotmail.fr">poledancegrenoble@hotmail.fr</a>
        	</address>
            <div id="confirm-message"><p></p><span class="close">x</span></div>
        </form>
	</article>
</div>
<div id="map_zone"></div>