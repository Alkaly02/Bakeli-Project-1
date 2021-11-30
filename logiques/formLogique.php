<?php 
require '../logiques/databaseConnexion.php';//Connexion a la base de donnees

if(isset($_POST['submit']))
{
	if(!empty($_POST['faculty']) AND !empty($_POST['specialization']) AND !empty($_POST['study_level']) AND !empty($_POST['adress']))
	{
		function securisation($data)
		{
			$data = htmlspecialchars($data);
			$data = stripslashes($data);

			return $data;
		}
		//Recuperation des donnees
		$student_id = $_SESSION['id'];
		$faculty = securisation($_POST['faculty']);
		$specialization = securisation($_POST['specialization']);
		$level = securisation($_POST['study_level']);
		$adress = securisation($_POST['adress']);

		//insertion des donnees
        $insertForm = $db->prepare('INSERT INTO form(student_id, faculty, specialization, study_level, adress) VALUES(?, ?, ?, ?, ?)');
        $insertForm->execute(array($student_id, $faculty, $specialization, $level, $adress));

	}
	else
	{
		$error = 'Veuillez remplir les champs vides!';
	}
}