<?php
	$mid = $_GET['mid'];
	$mname = $_GET['mname'];
	$mtype = $_GET['mtype'];
	$mphoto = $_GET['mphoto'];

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
			<h2>Movie Edit</h2>	
		<form id="" method="POST"> 

			<input type="text" name="movieid" value="<?php echo $mid;  ?>" readonly/> <br/>
			<input type="text" placeholder="<?php echo $mname; ?>" name="moviename" required/> <br/>
			<input type="file" name="image" value="select image file" required="required" /> </br>
			<select name="movietype" placeholder="<?php echo $mtype; ?>">
                    <option>2D</option>
					<option>3D</option> </select> </br>
			<textarea name="moviedes" placeholder="Describe Movie" rows="3" cols="20" required="required"/></textarea> </br>
			
            <input type="submit" value="Save" name="save"/> 

		</form>
		</center>
		</div>	
	<?php
	
	if(isset($_POST['save'])){
	$moviename=$_POST["moviename"];
	
     //$image = ["tmp_name"],"uploads/".$_FILES["movieimage"]["name"]
	// $image = addslashes(file_get_contents($_FILES['image']['name']));
	//$image= $_FILES['image']['name']; $imgContent = addslashes(file_get_contents($image));
	$ima=$_FILES['images']['image']; $image = addslashes(file_get_contents($ima));
	
	$movietype=$_POST["movietype"];
	$movdes=$_POST["moviedes"];
	
		include_once 'connection.php';
		$query="UPDATE movie SET moviename ='$moviename', moviephoto ='$image', movietype='$movietype', moviedes='$movdes' WHERE movieid='$mid' ";
		$ret=mysqli_query($connection, $query);
		if($ret){
			echo "<script> alert('Movie information is updated!');window.location='amovie.php';</script>";
		}
		else{ echo "<script> alert('Data is Not Updated!');</script>"; }
	}
	?>	
		
	
</body>	