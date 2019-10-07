<?php
	session_start();
	$aid= $_SESSION["adminid"];
?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />	
	</head>
<body>
     <div id="nav_bar">
        <ul>
            <li><a href="acinema.php">Cinema</a></li>
            <li><a href="amovie.php">Movie</a></li>
			<li><a href="aschedule.php">Schedule</a></li>
            <li><a href="report.php">Report</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="login">
		<center>
		<h1>Mingalar Cinema Group</h1>
		<h2>Admin Group</h2>
		<table id="adminfunction">
        	<tr> <td><a href="astaff.php"> Staff Information </a></td> </tr>
        	<tr> <td><a href="acinema.php"> Cinema Information </a></td> </tr>
        	<tr> <td><a href="amovie.php"> Movie Information </a></td> </tr>	
			<tr> <td><a href="aschedule.php"> Schedule Information </a></td> </tr>
        	<tr> <td><a href="report.php">View Report</a></td>
        	</tr>
        </table>
		
	</center>
	</div>
</body>