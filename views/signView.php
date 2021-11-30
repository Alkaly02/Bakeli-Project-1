<?php require '../logiques/signLogique.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Inscription</title>
</head>
<body>
<br>
<br>

<!-- Systeme d'inscription -->

	<form class="container" method="POST">
		<h2>Inscription</h2>

		<?php 
			if(isset($error))
			{
				?>
					<span class="btn btn-danger"><?= $error; ?></span>
				<?php
			}
		 ?>
		  <div class="col-4">
			  <div class="mb-3">
			    <label class="form-label">Prenom</label>
			    <input type="text" class="form-control" name="firstname">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Nom</label>
			    <input type="text" class="form-control" name="lastname">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Email</label>
			    <input type="email" class="form-control" name="email">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Telephone</label>
			    <input type="text" class="form-control" name="phone">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Mot de passe</label>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Confirmation mot de passe</label>
			    <input type="password" class="form-control" name="passwordConfirm">
			  </div>
		  </div>
		  
		  <button type="submit" class="btn btn-primary" name="submit">Inscription</button>

		  <p>J'ai deja un compte,<a href="index.html">je me connecte</a></p>
	</form>
</body>
</html>