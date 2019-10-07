<?php
	$pid = $_GET['pid'];
	
	include_once 'connection.php';
	$sql="DELETE FROM plan WHERE planid ='$pid'";
	$result=mysqli_query($connection,$sql);
		if($result){

		echo "<script> alert('Schedule Plan is deleted!');window.location='aschedule.php';</script>";
		}
		else{ 
		echo mysqli_errno($connection); 
		echo mysqli_error($connection);
		echo "<script> alert('Fail to delete!');window.location='aschedule.php';</script>"; 
		}
?>	