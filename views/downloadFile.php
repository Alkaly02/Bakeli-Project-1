<?php require '../logiques/security.php';
 require '../logiques/formLogique.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Download</title>
</head>
<?php require '../includes/navbar.php'; ?>
<body>
	<div id="message">
		<p class="btn btn-success" style="margin-left: 130px;margin-top: 50px;color: #fff;">
		Vous avez deja soumis le formulaire de renseignement
	    </p>
	</div>

	<h2 style="margin-left: 130px;margin-top: 50px;color: #046380;">Telecharger vos fichiers </h2>

	<!-- Telecharger les deux fichiers -->
	<?php require '../logiques/fileDownload/fileDownload.php'; ?>
	
</body>
	
	<!-- Affichage du message qui confirme que le formulaire a bien ete soumis -->
	<script type="text/javascript">
		setTimeout( function(){
		    var oMsg = document.getElementById('message');
		    oMsg.style.display = 'none';
		  }, 3000);
	</script>
</body>
</html>
