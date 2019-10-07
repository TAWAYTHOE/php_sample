<?php
	$cid = $_GET['cid'];
	$cname = $_GET['cname'];
	$cloc = $_GET['loca'];

	session_start();
	$a_id= $_SESSION['adminid'];
?>

<!DOCTYPE HTML5>
<html>
<head>
	<title>Cinema Edit</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="ahome.php">Home</a></li>
            <li><a href="acinema.php">Cinema</a></li>
            <li><a href="amovie.php">Movie</a></li>
			<li><a href="aschedule.php">Schedule</a></li>
            <li><a href="areport.php">Report</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="cinema">
		<div>
		<center>
			<h1>Shae Saung Cinema Group</h1>
			<h2>Cinema Edit</h2>	
			<form id="" method="POST">
			<fieldset>   
				<input type="text" name="cinemaid" value="<?php echo $cid; ?>" readonly/> <br/>
				<input type="text" name="cinemaname" placeholder="<?php echo $cname; ?>"  /> <br/>
				<input type="text" name="location" placeholder="<?php echo $cloc; ?>"/> </br>
				<input type="submit" value="Save" name="save"/> </br>
			</fieldset>
			</form>	
		</div>	
		</center>
	<?php
	
	if(isset($_POST['save'])){
	$cinemaname=$_POST["cinemaname"];
	$cinemaloc=$_POST["location"];
		include_once 'connection.php';
		$query="UPDATE cinema SET cinemaname ='$cinemaname',cinemalocation ='$cinemaloc' WHERE cinemaid='$cid' ";
		$ret=mysqli_query($connection, $query);
		if($ret){
			echo "<script> alert('Cinema information updated!');window.location='acinema.php';</script>";
		}
		else{ echo "<script> alert('Data Not Update!');</script>"; }
	}
	?>	
	
</body>	
</html>