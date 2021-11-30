<?php 
require '../logiques/databaseConnexion.php';//connexion a la base de donnees

if(isset($_POST['submit']))
{
	if(!empty($_FILES['file']) AND !empty($_POST['textarea']))
	{
		$file = $_FILES['file'];
		$comment =$_POST['textarea'];

		$insert = $db->prepare('INSERT INTO uploads(student_id, file, comment) VALUES(?, ?, ?)');
		$insert->execute(array($_SESSION['id'], $file['name'], $comment));

		$succes = 'Envoye !';

	}
}