<?php

	error_reporting(E_ALL);
	ini_set( "display_errors", 1 );
	
	if(isset($_GET['image_num'])) {
    $conn =mysqli_connect("localhost","bitnami","1234","book") or die("connection fail");
    $image_num = $_GET["image_num"];

	$sql = "SELECT book_image, imageData FROM upfile WHERE image_num = $image_num";

	$result=mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);

	Header( "Content-type:" . $row["book_image"]); 
	
	echo $row["imageData"]; 
}
	mysqli_close($conn);
?>