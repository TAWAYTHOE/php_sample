<?php
	$inid = $_GET['inid'];
	//echo $cid;
	include_once 'connection.php';
	$sql="DELETE FROM exbooking WHERE exbookid ='$inid'";
	$result=mysqli_query($connection,$sql);
		if($result){

		echo "<script> alert('Booking Data has been removed!');window.location='cinvoice.php';</script>";
		}
		else{ 
		echo mysqli_errno($connection); 
		echo mysqli_error($connection);
		echo "<script> alert('Fail to delete Booking!');window.location='cinvoice.php';</script>"; 
		}
?>	