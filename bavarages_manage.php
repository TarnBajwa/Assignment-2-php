<?php

$mysqli = new mysqli('localhost','root','','mydb') or die(mysqli_error($mysqli));


$targetDir = "images/Baverages/";
$image = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $image;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
 
if (isset($_POST['submit'])){
	
		 
 
		$name = $_POST['name'];
 
		$price = $_POST['price'];
		$details = $_POST['details'];
	
 move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
         
	$mysqli->query("INSERT INTO baverages (name, image, price, details) VALUES('$name','$image','$price','$details')") or die($mysqli->error);
	header("location:bavarages.php");
	
 
	
}
 

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM baverages WHERE id=$id") or die ($mysqli->error());
      
      header("location:bavarages.php");
}



?>
 
