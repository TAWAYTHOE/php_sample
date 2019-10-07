<?php
	$cid = $_GET['cid'];
	echo $cid;
	include_once 'connection.php';
	$sql="DELETE FROM cinema WHERE cinemaid ='$cid'";
	$result=mysqli_query($connection,$sql);
		if($result){

		echo "<script> alert('Cinema is deleted!');window.location='acinema.php';</script>";
		}
		else{ 
		echo mysqli_errno($connection); 
		echo mysqli_error($connection);
		echo "<script> alert('Fail to delete!');window.location='acinema.php';</script>"; 
		}
?>	