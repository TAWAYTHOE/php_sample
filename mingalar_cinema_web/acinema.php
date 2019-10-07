<?php
	session_start();
	$a_id= $_SESSION['adminid'];
?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Cinema</title>
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
	<div id="cinema">
		<div>
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Cinema Information</h2>	
			<form id="cinema_form" method="POST">
			<fieldset>   
	<?php
		include_once 'connection.php';
		$cid="";
		$query="Select MAX(cinemaid) as cid  from cinema";
				$result = mysqli_query ($connection, $query);
				$rows = mysqli_num_rows($result);
				if($rows >= 0)
				{				
				$row_num = mysqli_fetch_array($result);
				$cid = $row_num["cid"];
					$maxid = $cid;
					$newid = substr($maxid, 1)+1;
					$cid = "C".str_pad($newid, 3, '0', STR_PAD_LEFT);
				} 
				else { $cid= "C001"; }
	
	?>
				<input type="text" name="cinemaid" value="<?php echo $cid; ?>" readonly/> <br/>
				<input type="text" name="cinemaname" placeholder="Cinema Name"  required/> <br/>
				<input type="text" name="location" placeholder="Location"/> </br>
				<input type="submit" value="Register" name="register"/> </br>
			</fieldset>
			</form>	
		</div>	
		</center>
	<?php
	
	if(isset($_POST['register'])){
	$cid=$_POST["cinemaid"];
	$cname=$_POST["cinemaname"];
	$cloc=$_POST["location"];
		include_once 'connection.php';
		$query="insert into cinema values (\"$cid\",\"$cname\",\"$cloc\")";
		$ret=mysqli_query($connection, $query);
		if($ret){
			echo "<script> alert(' Cinema Registration Success!');window.location='acinema.php';</script>"; 
		}
		else{ echo "<script> alert('Data Not Inserted');</script>"; }
	}
	?>	
		<div>
		<center>
		<form>
		<fieldset> 
			<table border="1">
                <tr>
                    <th> Cinema ID</th>
                    <th> Cinema Name</th>
                    <th> Cinema Location</th>
					<th></br> </th>
					<th></br> </th>
                </tr>
	
	<?php
                include 'connection.php';
                $sql = "select * from cinema";
				$result = mysqli_query($connection,$sql);
				$num_rows = mysqli_num_rows($result);
			for($i=0; $i<$num_rows; $i++){
				$row=mysqli_fetch_assoc($result);
				
				?>
				<tr>
					<td> <?php echo $row["cinemaid"]; ?> </td>
					<td> <?php echo $row["cinemaname"]; ?>	</td>
					<td> <?php echo $row["cinemalocation"]; ?> </td>
					<td><a href="cinema_edit.php?cid=<?php echo $row["cinemaid"]; ?>&cname=<?php echo $row["cinemaname"]; ?>&loca=<?php echo $row["cinemalocation"]; ?>">Edit</a></td>
					<td><a href="cinema_delete.php?cid=<?php echo $row["cinemaid"];?>">Deletet</a></td>
				</tr>
	<?php
				}
	?>			
			</table>
        </fieldset>
		</form>	
		</center>	
		</div>
	
</body>	