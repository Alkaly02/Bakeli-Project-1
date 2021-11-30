<?php 
try
{
	$db = new PDO('mysql:host=localhost;dbname=Bakeli-1; charset=utf8', 'root', '');
}
catch(PDOException $e)
{
	die('Error : '.$e->getMessage());
} 
