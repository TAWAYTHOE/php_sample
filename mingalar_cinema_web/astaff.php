<?php
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
		<div>
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Staff Information</h2>	
			<form id="" method="POST">
			<fieldset>   
		<?php
			include_once 'connection.php';
			$mid="";
			$query="Select MAX(adminid) as amid  from admin";
				$result = mysqli_query ($connection, $query);
				$rows = mysqli_num_rows($result);
				if($rows >= 0)
				{				
				$row_num = mysqli_fetch_array($result);
				$amid = $row_num["amid"];
					$maxid = $amid;
					$newid = substr($maxid, 1)+1;
					$amid = "A".str_pad($newid, 3, '0', STR_PAD_LEFT);
				} 
				else { $mid= "A001"; }
	
		?>
			<input type="text" name="adminid" value="<?php echo $amid;  ?>" readonly/> <br/>
			<input type="text" placeholder="Staff Name" name="staffname" required/> <br/>
			<input type="password" name="password" placeholder="Password" required /></br>
			<input type="password" name="rpassword" placeholder="Retype Password" required/></br>
			<input type="email" name="email" placeholder="E-mail" required/> </br>
			<input type="text" name="address" placeholder="Address"/> </br>
			<input type="number_format" name="phone" placeholder="Phone no" required /></br>
			<input type="submit" name="signup" value="Register"/>
		</fieldset>
		</form>
		</center>
		</div>

	<?php
	if(isset($_POST["signup"])){
			//$amid=$_POST['amid'];
			$name = $_POST['staffname'];
            $password = md5($_POST['password']);
			$rpassword = md5($_POST['rpassword']);
			$email = $_POST['email'];
			$address =$_POST['address'];
			$phone = $_POST['phone'];			
			//echo $mid ; echo $mname; echo $password; 
		if($password!=$rpassword){
				echo "<script>alert('Password are not matched!');</script>";
		}
		else{
			include "connection.php";
			$query = "insert into admin values (\"$amid\",\"$name\",\"$rpassword\", \"$email\",\"$address\",\"$phone\") ";
			$rlt = mysqli_query($connection, $query);
				if($rlt){
					echo "<script> alert('Staff Registration Success!');window.location='astaff.php';</script>";			
				}	
				else {
					echo "<script> alert('Admin Already Existed!');window.location='astaff.php';</script>";
					//echo mysqli_error($connection);
				}	
		}	

	}	
	?>
	
	<div>
	<center>
	<form method="POST">
		<table border="1">
                <tr>
                    <th> Staff-ID</th>
                    <th> Staff Name</th>
                    <th> E-mail</th>
					<th> Address </th>
					<th> Phone </th>
                </tr>
		<?php
                include 'connection.php';
                $sql = "select * from admin";
				$result = mysqli_query($connection,$sql);
				$row = mysqli_fetch_all($result);
			for($i=0; $i<sizeof($row); $i++){
		?>
				<tr>
				<td> <?php echo $row[$i][0]; ?> </td>
				<td> <?php echo $row[$i][1]; ?> </td>
				<td> <?php echo $row[$i][3]; ?> </td>
				<td> <?php echo $row[$i][4]; ?> </td>
				<td> <?php echo $row[$i][5]; ?> </td>
				<td><a href="staff_edit.php?sid=<?php echo $row[$i][0]; ?>&sname=<?php echo $row[$i][1];?>&smail=<?php echo $row[$i][3];?>&addr=<?php echo $row[$i][4];?>&phone=<?php echo $row[$i][5];?>">Edit</a></td>
				<td><a href="staff_delete.php?sid=<?php echo $row[$i][0];?>">Delete</a></td>
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