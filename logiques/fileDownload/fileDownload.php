<?php
		$file = scandir('../downloads');//Pour lire tout les fichiers de ce repertoire

		for($i = 2; $i < count($file); $i++)
		{
			?>
			  <a style="margin-left: 150px;" download="<?= $file[$i] ?>" href="../downloads/<?= $file[$i] ?>" ><?= $file[$i] ?></a>
			<?php
		}
?>