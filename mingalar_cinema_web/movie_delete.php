<?php
	$mid = $_GET['mid'];

	include_once 'connection.php';
	$sql="DELETE FROM movie WHERE movieid ='$mid'";
	$result=mysqli_query($connection,$sql);
		if($result){

		echo "<script> alert('Movie is deleted!');window.location='amovie.php';</script>";
		}
		else{ 
		echo mysqli_errno($connection); 
		echo mysqli_error($connection);
		echo "<script> alert('Fail to delete!');window.location='amovie.php';</script>"; 
		}
?>	