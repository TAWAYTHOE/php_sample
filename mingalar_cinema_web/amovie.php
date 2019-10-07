<?php
	session_start();
	$a_id= $_SESSION['adminid'];
?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Movie</title>
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
	<div id="movie">
		<div>
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Movie Information</h2>	
		<form id="" method="POST">
			<fieldset>   
		<?php
			include_once 'connection.php';
			$mid="";
			$query="Select MAX(movieid) as mid  from movie";
				$result = mysqli_query ($connection, $query);
				$rows = mysqli_num_rows($result);
				if($rows >= 0)
				{				
				$row_num = mysqli_fetch_array($result);
				$mid = $row_num["mid"];
					$maxid = $mid;
					$newid = substr($maxid, 1)+1;
					$mid = "V".str_pad($newid, 4, '0', STR_PAD_LEFT);
				} 
				else { $mid= "V0001"; }
	
		?>
			<input type="text" name="movieid" value="<?php echo $mid;  ?>" readonly/> <br/>
			<input type="text" placeholder="Movie Name" name="moviename" required/> <br/>
			<input type="file" name="image" value="select image file" required="required" /> </br>
			<select name="movietype">
                    <option>2D</option>
					<option>3D</option> </select> </br>
			<textarea name="moviedes" placeholder="Describe Movie" rows="3" cols="20" required="required"/></textarea> </br>
			
            <input type="submit" value="Register" name="register"/>
		</fieldset>
		</form>
		</center>
		</div>

	<?php
	if(isset($_POST['register'])){
	$mid=$_POST["movieid"];
	$mname=$_POST["moviename"];
	$mtype=$_POST["movietype"];
	//$movieimage = $_FILES["movieimage"]["name"];
	$mimage= $_FILES["image"];["name"];
	$mdes=$_POST["moviedes"];
		include_once 'connection.php';
		$query="insert into movie values (\"$mid\",\"$mname\",\"$mtype\",\"$mimage\",\"$mdes\")";
		$ret=mysqli_query($connection, $query);
		if($ret){
			echo "<script> alert(' Movie Registration Success!');window.location='amovie.php';</script>"; 
		}
		
		else{ echo "<script> alert('Data is not Inserted');</script>"; echo mysql_error(); }
	}
	?>	
	
	<div>
	<center>
	<form method="POST">
		<table id="movielist" border="1">
                <tr>
                    <th> MovieID</th>
                    <th> Movie Name</th>
                    <th> Movie Type</th>
					<th> Photo </th>
					<th> Description </th>
					<th> </br> </th>
                </tr>
		<?php
                include 'connection.php';
                $sql = "select * from movie";
				$result = mysqli_query($connection,$sql);
				$num_rows = mysqli_num_rows($result);
			for($i=0; $i<$num_rows; $i++){
				$row=mysqli_fetch_assoc($result);
		?>
				<tr>
				<td> <?php echo $row["movieid"]; ?> </td>
				<td> <?php echo $row["moviename"]; ?> </td>
				<td> <?php echo $row["movietype"]; ?> </td>
				<td> <img src="images/<?php echo	$row["moviephoto"]; ?>" alt="image" height="140" width="200"/> </td>
				<td> <?php echo $row["moviedes"]; ?> </td>
				<td><a href="movie_edit.php?mid=<?php echo $row["movieid"]; ?>&mname=<?php echo $row["moviename"]; ?>&mtype=<?php echo $row["movietype"]; ?>&mphoto=<?php echo $row["moviephoto"];?>">Edit</a></td>
				<td><a href="movie_delete.php?mid=<?php echo $row["movieid"];?>">Deletet</a></td>
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
</html>