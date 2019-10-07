<!DOCTYPE HTML5>
<html>
<head>
	<title>Sign Up</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
     <div id="nav_bar">
        <ul>
            <li><a href="index.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
			<li><a href="showingnow.php">Showing Now</a></li>
            <li><a href="aboutus.php">About Us</a></li>
       </ul>
     </div>
	<div id="login">
		<center>
		<h1>Mingalar Cinema Group</h1>
		<h2>Sign Up</h2>
		<form method="POST">
			<?php
			include_once 'connection.php';
			$mid="";
			$query="Select MAX(memberid) as mid  from member";
				$result = mysqli_query ($connection, $query);
				$rows = mysqli_num_rows($result);
				if($rows >= 0)
				{				
				$row_num = mysqli_fetch_array($result);
				$mid = $row_num["mid"];
					$maxid = $mid;
					$newid = substr($maxid, 1)+1;
					$mid = "M".str_pad($newid, 4, '0', STR_PAD_LEFT);
				} 
				else { $mid= "M0001"; }
	
		?>
			<input type="text" name="mid" value="<?php echo $mid; ?>" readonly/> </br>
			<input type="text" name="mname" placeholder="Username" pattern="[A-Z a-z 0-9 \-\(\),. ]{2,25}" autofocus required/> </br>
			<input type="password" name="password" placeholder="Password" required /></br>
			<input type="password" name="rpassword" placeholder="Retype Password" required/></br>
			<input type="email" name="email" placeholder="E-mail" required/> </br>
			<input type="text" name="address" placeholder="Address"/> </br>
			<input type="number_format" name="phone" placeholder="Phone no" pattern="[0-9 \-\(\)]{5,15}" required /></br>
			<input type="submit" name="signup" value="Register"/>
		</form>
		</center>
	<?php	
	if(isset($_POST["signup"])){
			//$mid=$_POST['mid'];
			$mname = $_POST['mname'];
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

			$query = "insert into member values (\"$mid\",\"$mname\",\"$rpassword\", \"$email\",\"$address\",\"$phone\") ";
			$rlt = mysqli_query($connection, $query);
				if($rlt){
					echo "<script> alert('Registration Success!');window.location='index.php';</script>";
					
				}	
				else {
					echo "<script> alert('Member Already Existed!');window.location='signup.php';</script>";
					//echo mysqli_error($connection);
				}	
		}	

	}	
	?>	
	
</div>
</body>