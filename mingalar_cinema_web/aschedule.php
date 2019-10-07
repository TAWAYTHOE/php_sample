<?php
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
			<h1>Mingalar Cinema Group</h1>
			<h2>Schedule</h2>	
		<form id="aschedule" method="POST">
		<fieldset>
	<?php
			include_once 'connection.php';
			$mid="";
			$query="Select MAX(planid) as pid  from plan";
				$result = mysqli_query ($connection, $query);
				$rows = mysqli_num_rows($result);
				if($rows >= 0)
				{				
				$row_num = mysqli_fetch_array($result);
				$pid = $row_num["pid"];
					$maxid = $pid;
					$newid = substr($maxid, 1)+1;
					$pid = "P".str_pad($newid, 4, '0', STR_PAD_LEFT);
				} 
				else { $mid= "P0001"; }
	
	?>
		<table>
			<tr><td> <input type="text" name="plan" value="<?php echo $pid; ?>" readonly/> </td></tr>
			<tr><td>
				<select name="cinema">
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
			<select name="movie">
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
			
            <tr><td> <input type="submit" value="Register" name="register"/> </td></tr>
		</table>	
		</fieldset>
		</form>	
	</center>
	</div>	
		<?php
			if(isset($_POST["register"])){
				$planid = $_POST["plan"];
				$cinemaid = $_POST["cinema"];
				$movieid = $_POST["movie"];
				$mlength = $_POST["mlength"];
				
				$sdate= date("Y-m-d", strtotime($_POST["sdate"]));
				$edate= date("Y-m-d", strtotime($_POST["edate"]));
	
				$sql="insert into plan values ('$planid', '$cinemaid', '$movieid', '$mlength', '$sdate', '$edate')";
				$result = mysqli_query($connection, $sql);
				if($result){
					echo"<script>alert('Schedule Registration success');window.location.href='aschedule.php';</script>";
				}
				else{
					echo mysqli_error($result);
					echo "<script>alert('Data Already Existed!')";
					header("location.aschedule.php");
				}	
			}	
		?>
	<div>
	<center>
	<form method="POST">
		<table id="schedulelist" border="1">
                <tr>
                    <th> PlanID </th>
                    <th> Cinema Name </th>
					<th> Movie Name </th>
                    <th> Movie Duration </th>
					<th> Start Date </th>
					<th> End Date </th>
					<th> </br> </th>
                </tr>
		<?php
                include 'connection.php';
				$sql = "select planid,cinemaname,moviename,movielength,startdate,enddate from plan p, cinema c, movie m where c.cinemaid=p.cinemaid and p.movieid=m.movieid ";
				$result = mysqli_query($connection,$sql);
				$num_rows = mysqli_num_rows($result);
			for($i=0; $i<$num_rows; $i++){
				$row=mysqli_fetch_assoc($result);
		?>
				<tr>
					<td> <?php echo $row["planid"]; ?> </td>
					<td> <?php echo $row["cinemaname"]; ?> </td>
					<td> <?php echo $row["moviename"]; ?> </td>
					<td> <?php echo $row["movielength"]; ?> </td>
					<td> <?php echo $row["startdate"]; ?> </td>
					<td> <?php echo $row["enddate"]; ?> </td>
					<td><a href="schedule_edit.php?planid=<?php echo $row["planid"];?>&cname=<?php echo $row["cinemaname"]; ?>
					&mname=<?php echo $row["moviename"]; ?>&mlength=<?php echo  $row["movielength"]; ?>&sdate=<?php echo  $row["startdate"]; ?>&edate=<?php echo  $row["enddate"]; ?>">Edit</a></td>
					<td><a href="schedule_delete.php?pid=<?php echo $row["planid"];?>">Deletet</a></td>
				</tr>
		<?php
				}
		?>			
        </table>
	</form>	
	</center>	
	</div>	

</div>
</body>