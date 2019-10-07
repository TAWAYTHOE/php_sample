<?php
	$sid = $_GET['sid'];
	$sname = $_GET['sname'];
	$smail = $_GET['smail'];
	$addr = $_GET['addr'];
	$phone = $_GET['phone'];

	session_start();
	$a_id= $_SESSION['adminid'];
?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Staff</title>
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
	<div id="staff">
	<center>
			<h1>Shae Saung Cinema Group</h1>
			<h2>Staff Information</h2>	
		<form id="" method="POST">
		<fieldset>   

			<input type="text" name="staffid" value="<?php echo $sid;  ?>" readonly/> <br/>
			<input type="text" placeholder="<?php echo $sname; ?>" name="staffname" required/> <br/>
			<input type="password" name="password" placeholder="Password" required /></br>
			<input type="email" name="email" placeholder="<?php echo $smail; ?>" required/> </br>
			<input type="text" name="address" placeholder="<?php echo $addr; ?>" required/> </br>
			<input type="number_format" name="phone" placeholder="<?php echo $phone ; ?>" required /></br>
			<input type="submit" name="save" value="Save"/>
		</fieldset>
		</form>
		</center>
<?php
	
	if(isset($_POST['save'])){
		
	$name=$_POST["staffname"];
	$pswd= md5($_POST['password']);
	$email=$_POST["email"];
	$address=$_POST["address"];
	$ph=$_POST["phone"];
		include_once 'connection.php';
		$query="UPDATE admin SET adminname='$name', password='$pswd', admin_email='$email' , admin_address='$address',
		admin_phone='$ph' WHERE adminid='$sid' ";
		$ret=mysqli_query($connection, $query);
		if($ret){
			echo "<script> alert('Staff information updated!');window.location='astaff.php';</script>";
		}
		else{ echo "<script> alert('Data is Not Updated!');</script>"; }
	}
	?>	

	
</div>
</body>
</html>