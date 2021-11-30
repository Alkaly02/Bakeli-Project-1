<?php require '../logiques/security.php';
      require '../logiques/formLogique.php';	
      require '../logiques/checkIfTheUserIsInTheForm.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Welcome</title>
</head>
<body>

<?php 
//L'etudiant renseigne le formulaire s'il ne l'a pas encore fait
if($checkIfUserExistInTheForm->rowCount() == 0 )
{
	?>

	<h1 style="margin-left: 130px;margin-top: 50px;color: #046380;">
		Welcome <?= $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>	
	</h1>

	<h4 style="margin-left: 170px;margin-top: 50px;color: #046380;">Renseignez ce formulaire</h4>
	<form class="container" method="POST">

		<?php
			if(isset($error))
			{
				?>
					<span class="btn btn-danger"><?= $error; ?></span>
				<?php
			}
	     ?>
	      <div class="col-7">
			<div>
				<select class="form-select" aria-label="Default select example" name="faculty">
				  <option selected hidden value="">Filières</option>
				  <option value="Programmation">Programmation</option>
				  <option value="Design">Design</option>
				  <option value="Marketing Digital">Marketing Digital</option>
			      </select>
			</div>
			<div>
				<select class="form-select" aria-label="Default select example" name="specialization">
				  <option selected hidden value="">Specialisation</option>
				  <option value="Développement Web">Développement Web</option>
				  <option value="Développement Mobile">Développement Mobile</option>
				  <option value="Module Graphisme">Module Graphisme</option>
				  <option value="Module Ux">Module Ux</option>
				  <option value="Multimédia">Multimédia  </option>
				  <option value="Montage">Montage</option>
				  <option value="Marketing Digital">Marketing Digital</option>
			      </select>
			</div>
			<div>
				<select class="form-select" aria-label="Default select example" name="study_level">
				  <option selected hidden value="">Niveau d'etude</option>
				  <option value="Bac">Bac</option>
				  <option value="Bac +1">Bac +1</option>
				  <option value="Bac +2">Bac +2</option>
				  <option value="Bac +3">Bac +3</option>
			      </select>
			</div>
		      <div class="form-select">
			    <input type="text" class="form-control" name="adress" placeholder="Adresse"><br>
			    <button type="submit" class="btn btn-primary" name="submit">Soumettre</button>
			</div>
		</div>
      </form>
<?php      
}
else
{
	header('Location: downloadFile.php');
}
?>
</body>
</html>