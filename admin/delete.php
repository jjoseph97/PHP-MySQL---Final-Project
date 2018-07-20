<?php
include ("../includes/header.php");
$imageID = $_GET['image_id'];

if(!isset($imageID)){
	$imageID = 1; // assign a default value in case no query string value; this is important for later DB queries 
}
else{
	mysqli_query($con, "DELETE FROM imagegallery WHERE image_id = '$imageID'") or die(mysqli_error($con));
	header("Location:edit.php");
}




/*
include ("../includes/mysql_connect.php");


$char_ID = $_GET['cid'];

//echo $char_ID;

if(isset($char_ID)){
	mysqli_query($con, "DELETE FROM characters WHERE cid = '$char_ID'") or die(mysqli_error($con));
	header("Location:edit.php");
}



*/

 ?>