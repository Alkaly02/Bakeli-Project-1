<?php 

session_start();

require '../logiques/databaseConnexion.php'; //Connexion a la base de donnees

if(isset($_POST['submit']))
{
	if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']) AND 
       !empty($_POST['phone']) AND     !empty($_POST['password']) AND !empty($_POST['passwordConfirm']) )
	{
		function securisation($data)
		{
			$data = strip_tags($data);
			$data = trim($data);
			$data = stripslashes($data);

			return $data;
		}
		//Recuperons les donnees rentrees par l'etudiant
		$firstname = securisation($_POST['firstname']);
		$lastname = securisation($_POST['lastname']);
		$email = securisation($_POST['email']);
		$phone = securisation($_POST['phone']);
		$password = securisation($_POST['password']);
		$passwordConfirm = securisation($_POST['passwordConfirm']);

		//Verifions s'il n'y a pas un etudiant qui s'est deja inscrit avec cet email
		$checkIfEmailExist = $db->prepare('SELECT email FROM Students WHERE email=?');
		$checkIfEmailExist->execute(array($email));

		if($checkIfEmailExist->rowCount() == 0)
		{
			//Verifions s'il n'y a pas un etudiant qui s'est deja inscrit avec ce numero de telephone
			$checkIfphoneExist = $db->prepare('SELECT phone FROM Students WHERE phone=?');
			$checkIfphoneExist->execute(array($phone));

			if($checkIfphoneExist->rowCount() == 0)
			{
				//Le mot de passe doit etre long
				if(strlen($password)  >= 8)
				{
					if($password == $passwordConfirm)//les mots de passe doivent correspondre
					{
						//hackons le mot de passe
						$password = password_hash($password, PASSWORD_BCRYPT);

						//Inserons a present l'etudiant

						$insertStudent = $db->prepare('INSERT INTO Students(firstname, lastname, email, phone, password) VALUES(?, ?, ?, ?, ?)');
						$insertStudent->execute(array($firstname, $lastname, $email, $phone, $password));

						//Authentification de l'etudiant

					    $getStudentInfo = $db->prepare('SELECT id,firstname,lastname FROM Students WHERE email=?');
					    $getStudentInfo->execute(array($email));

					    $result = $getStudentInfo->fetch();

					    $_SESSION['auth'] = true;
					    $_SESSION['id'] = $result['id'];
					    $_SESSION['firstname'] = $result['firstname'];
					    $_SESSION['lastname'] = $result['lastname'];

					    header('Location: loginView.php');

					}
					else
					{
						$error = 'Les mots de passe ne correspondent pas';
					}
				}
				else
				{
					$error = 'Le mot de passe requiert au moins 8 caracteres';
				}
			}
			else
			{
				$error = 'Cet utilisateur existe deja !';
			}
		}
		else
		{
			$error = 'Cet utilisateur existe deja !';
		}


	}
	else
	{
		$error = 'Veuillez remplir les champs vides !';
	}
}