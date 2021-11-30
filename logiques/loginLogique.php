<?php 
session_start();

require '../logiques/databaseConnexion.php';//Connexion a la base de donnees

if(isset($_POST['submit']))
{
	if(!empty($_POST['emailPhone']) AND !empty($_POST['password']))
	{
		function securisation($data)
		{
			$data = strip_tags($data);
			$data = trim($data);
			$data = stripslashes($data);

			return $data;
		}
		//Recuperons les donnees rentrees par l'etudiant
		$emailPhone = securisation($_POST['emailPhone']);
		$password = securisation($_POST['password']);
		
		//Verifions si cet etudiant s'est deja inscrit
		$checkIfstudentExist = $db->prepare('SELECT * FROM Students WHERE email=? OR phone=?');
		$checkIfstudentExist->execute(array($emailPhone, $emailPhone));

		if($checkIfstudentExist->rowCount() > 0 )
		{
			$result = $checkIfstudentExist->fetch();

			//Verifions si le mot de passe correspond avec celui qui est dans la base de donnees
			if(password_verify($password, $result['password']))
			{
				//Authentification
				$_SESSION['auth'] = true;
				$_SESSION['id'] = $result['id'];
				$_SESSION['firstname'] = $result['firstname'];
				$_SESSION['lastname'] = $result['lastname'];

				header('Location: welcomeView.php');
			}
			else
			{
				$error = 'Mot de passe incorrect';
			}
		}
		else
		{
			$error = "Cet utilisateur n'existe pas ";
		}

	}
	else
	{
		$error = 'Veuillez remplir les champs vides !';
	}
}