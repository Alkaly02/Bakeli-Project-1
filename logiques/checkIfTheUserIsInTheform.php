<?php 
require '../logiques/databaseConnexion.php';//connexion a la base de donnees
if($_SESSION['auth'])
{
	//Verification pour voir si l'etudiant a deja renseigne le formulaire
	$checkIfUserExistInTheForm = $db->prepare('SELECT Student_id FROM form WHERE Student_id = ?');
	$checkIfUserExistInTheForm->execute(array($_SESSION['id']));
}