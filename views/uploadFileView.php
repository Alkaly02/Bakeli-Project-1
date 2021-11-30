<?php require '../logiques/security.php'; 
      require '../logiques/uploadFileLogique.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Envoyer</title>
</head>
<?php require '../includes/navbar.php'; ?>
<body>
	<br>
	<br>
	<form class="container" method="POST" enctype="multipart/form-data">
		<?php 
			if(isset($succes))
			{
				?>
					<p class="btn btn-success"><?= $succes; ?></p>
				<?php
			}
		?>
	  <div class="col-7">
	  	<div class="mb-3">
	    <input type="file" class="form-control" name="file">
	  </div>
	  
	  <div class="mb-3">
	    <textarea type="text" class="form-control" name="textarea" cols="8" placeholder="Commentaire"></textarea>
	    
	  </div>
	  <button type="submit" class="btn btn-secondary" name="submit">Envoyer</button>
	  </div>
	</form>

</body>
</html>