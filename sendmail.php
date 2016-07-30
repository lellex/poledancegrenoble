<?php

	$errors = 0;
	$ok = false;

	// if(array_key_exists('email', $_POST)==false || isset($_POST['email'])==false || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false) {
	// 	$errors++;
	// }

	if(array_key_exists('comment', $_POST)==false || isset($_POST['comment'])==false || $_POST['comment']=='') {
		$errors++;
	}
	
	if ($errors==0) {

		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
		$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

		$recipient = "poledancegrenoble@hotmail.fr";
		$subject = "Nouveau message poledancegrenoble.fr";

		$msg = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN''http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>";
		$msg = "<html xmlns='http://www.w3.org/1999/xhtml'>";
		$msg = "<html>";
        $msg .= "<head>";
        $msg .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        $msg .= "<title>".$subject."</title>";
        $msg .= "</head>";
        $msg .= "<body>";
        $msg .= $comment;
        $msg .= "</body>";
        $msg .= "</html>";


        /* En-ttes de l'e-mail */
        $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	    $headers .= 'To: Pole Dance Grenoble <' .$recipient. '>' . "\r\n";
	    $headers .= 'From: ' .$name. ' <' .$email. '>' . "\r\n";

	    /* Envoi de l'e-mail */
		if(mail($recipient, $subject, $msg, $headers)){ //mail command :)
			$ok = true;
		}
	}
	

	if(array_key_exists('js', $_POST)==false || isset($_POST['js'])==false || $_POST['js']=='') {
		header ("Location: ".$_SERVER['HTTP_REFERER'] );
	} else {
		if ($ok==true) {
			echo 'ok';
		}
		else {
			echo 'nok';
		}
	}

	//Préparation de la version 
	// $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
	// $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	// $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);

	// //Envoi du mail
	// $recipient = "alexandra@bigbandprojekt.com";
	// $subject = "Demande de contact de ".$name;
	// $header = "From: ". $name . " <" . $email . ">\r\n";

	// if(mail($recipient, $subject, $comment, $header)){ //mail command :)
	// 	echo 'ok';
	// }else{
	// 	echo 'nok';
	// }
?>