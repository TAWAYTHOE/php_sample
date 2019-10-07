<?php
	$pid=$_GET['planid'];
	session_start();
	$a_id= $_SESSION['adminid'];
?>
<!DOCTYPE HTML5>
<html>
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
	<title>Schedule</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="ahome.php">Home</a></li>
            <li><a href="acinema.php">Cinema</a></li>
            <li><a href="amovie.php">Movie</a></li>
			<li><a href="aschedule.php">Schedule</a></li>
            <li><a href="report.php">Report</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="schedule">
	<div>
	<center>
			<h1>Shae Saung Cinema Group</h1>
			<h2>Schedule</h2>	
		<form id="" method="POST">
		<fieldset>
		<table>
			<tr><td> <input type="text" name="admin" value="<?php echo $a_id; ?>" hidden/> </td></tr>
			<tr><td> <input type="text" name="plan" value="<?php echo $pid; ?>" readonly/> </td></tr>
			<tr><td>
				<select name="selectcinema">
				<option>Select Cinema </option>
				<?php 
					include_once 'connection.php';
					$query = "select cinemaid,cinemaname from cinema";
					$relt = mysqli_query($connection, $query);
					while($_out = mysqli_fetch_assoc($relt)){
				?>
				<option value="<?php echo $_out["cinemaid"]; ?>"> <?php echo $_out["cinemaname"]; ?> </option>
			<?php
					}
			?>
				</select> </td></tr>	
		
			<tr><td>
			<select name="selectmovie">
				<option>Select Movie </option>
				<?php 
					include_once 'connection.php';
					$query = "select movieid,moviename from movie";
					$relt = mysqli_query($connection, $query);
					while($_out = mysqli_fetch_assoc($relt)){
				?>
				<option value="<?php echo $_out["movieid"]; ?>"> <?php echo $_out["moviename"]; ?> </option>
			<?php
					}
			?>
			</select> </td></tr>	
			
			<tr><td>
			<select name="mlength">
				<option> Movie Duration </option>
                <option value="60"> 60 min </option>
				<option value="90"> 90 min </option>
				<option value="120"> 120 min </option>
				<option value="150"> 150 min </option>
			</select> </td></tr>
			<tr><td><input type="text" name="sdate" class="tcal" value="" placeholder="Start Date" /> </td></tr>
			<tr><td><input type="text" name="edate" class="tcal" value="" placeholder="End Date" /> </td></tr>	
			
            <tr><td> <input type="submit" value="Save" name="save"/> </td></tr>
		</table>	
		</fieldset>
		</form>	
	</center>
	</div>	
		<?php
			if(isset($_POST["save"])){
				//$planid = $_POST["plan"];
				$cinid = $_POST["cinema"];
				$movid = $_POST["movie"];
				$movlength = $_POST["mlength"];				
				$stdate= date("Y-m-d", strtotime($_POST["sdate"]));
				$endate= date("Y-m-d", strtotime($_POST["edate"]));		
			include_once 'connection.php';
				$sql="UPDATE plan SET  adminid='$a_id', cinemaid='$cinid', movieid ='$movid', movielength='$movlength', startdate='stdate', enddate='endate' WHERE planid='$pid'";
				$result = mysqli_query($connection, $sql);
				if($result){
					echo"<script>alert('Data is now Update!');window.location.href='aschedule.php';</script>";
				}
				else{
					echo mysqli_error($result);
					echo "Data is failed!";
					//echo"<script>alert('Fail to Update!');window.location.href='aschedule.php';</script>";
				}	
			}	
		?>

</div>
</body>