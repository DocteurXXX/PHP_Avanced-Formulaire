<?php

	


	$errors = [];
	$emails =['email0@gmail.com','email1@gmail.com','email2@gmail.com']; /*A modifier en fonction du sujet séléctionné sur index.php*/


		/* !array_key_exists : si la clé n'existe pas (car !) OU si la clé est vide */

		if(!array_key_exists('firstname', $_POST) || $_POST['firstname'] == ''){
			$errors['firstname'] = "You didn't fill your first name";
		}

		if(!array_key_exists('surname', $_POST) || $_POST['surname'] == ''){
			$errors['surname'] = "You didn't fill your surname";
		}

		if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ /* validation format email */
			$errors['email'] = "You didn't fill a valid email";
		}

		if(!array_key_exists('phone', $_POST) || $_POST['phone'] == ''){
			$errors['phone'] = "You didn't fill your phone number";
		}

		if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
			$errors['message'] = "You didn't fill your message";
		}

		if(!array_key_exists('service', $_POST) && isset($emails[$_POST['service']])){
			$errors['service'] = "The service you want to contact doesn't exist";
		}

		session_start(); /* stockage des arguments */

		if(!empty($errors)){     /* si erreur dans la table, alors ... */
			
			
			$_SESSION['errors'] = $errors; /* renvoi du tableau d'erreurs vers index.php (pour utilisateur) */

			$_SESSION['inputs'] = $_POST; /* sauvegarde des inputs saisies si erreurs détectées */

			header('Location: index.php'); /* ... renvoi vers page index.php */
		}
		else { /* si auccune erreur dans la table */
				$_SESSION['success'] = 1;

				/* Envoi email*/ 
				$message = $_POST['message'];
				$headers = 'FROM : ' . $_POST['email'];
				mail($email[$_POST['service']], $listederoulante, $message, $headers);
				header('Location: index.php');
		}
?>