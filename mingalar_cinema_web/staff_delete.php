<?php
	$sid = $_GET['sid'];

	include_once 'connection.php';
	$sql="DELETE FROM admin WHERE adminid ='$sid'";
	$result=mysqli_query($connection,$sql);
		if($result){

		echo "<script> alert('Staff has been removed!');window.location='astaff.php';</script>";
		}
		else{ 
		echo mysqli_errno($connection); 
		echo mysqli_error($connection);
		echo "<script> alert('Fail to delete!');window.location='astaff.php';</script>"; 
		}
?>	