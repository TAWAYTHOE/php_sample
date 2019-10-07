<!DOCTYPE HTML5>
<html>
<head>
	<title>Login form</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
     <div id="nav_bar">
        <ul>
            <li><a href="index.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
			<li><a href="showingnow.php">Showing Now</a></li>
            <li><a href="guide.pdf">Help!</a></li>
       </ul>
     </div>
	<div id="login">
	<center>
		<h1>Mingalar Cinema Group</h1>
		<h2>Login</h2>
		<form method="POST">
			<input type="text" name="username" placeholder="User Name" required/> </br>
			<input type="password" name="password" placeholder="Password" required/></br>
			<input type="submit" name="login" value="Login">
		</form>
	</center>
	
		<?php	
		
		if(isset($_POST["login"])){
			include "connection.php";
				$username =$_POST['username'];
                $password = md5($_POST['password']);
				
			$sql = "select memberid, mname FROM member WHERE mname=\"$username\" and mpassword=\"$password\" ";
			$result = mysqli_query($connection,$sql);
			$rowcount = mysqli_num_rows($result);
			if($rowcount){ 
				$row_num = mysqli_fetch_array($result);
				
				session_start();
					$_SESSION['memberid'] = $row_num["memberid"];
					$_SESSION['mname'] = $row_num["mname"];
					
				echo "<script> alert('You are now log in as ".$row_num['mname']."');window.location='chome.php';</script>"; 
			}
		
			$query = "select adminid, adminname from admin where admin_email=\"$username\" and password=\"$password\" ";
			$relt = mysqli_query($connection, $query);
			$row_count = mysqli_num_rows($relt);
			if($row_count){
				$rownum = mysqli_fetch_array($relt);
					session_start();
					$_SESSION["adminid"]= $rownum["adminid"];
					
				echo "<script> alert('You are now log in as ".$rownum['adminname']."');window.location='ahome.php';</script>"; 
					//header("location: ahome.php");
			}
			else{echo "<script> alert('User Name or Password is Wrong!');window.location='index.php';</script>"; }
			//else{echo "<script> alert('User Name or Password is Wrong!');window.location='index.php';</script>";}		
		}
			
		?>
	</div>		
</body>
</html>