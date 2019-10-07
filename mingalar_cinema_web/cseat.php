<!DOCTYPE HTML5>
<html>
<head>
	<title>Booking</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="chome.php">Home</a></li>
            <li><a href="cshownow.php"> ShowingNow</a></li>
			<li><a href="cinvoice.php">ViewInvoice</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="cseat">
		<div>
		<center>
			<h1>Shae Saung Cinema Group</h1>
			<h2>Booking Details</h2>	
	<form id="seat_form" method="POST">
       
			<select name="cinema">
				<option> select cinema </option>
                <option> 2D </option>
				<option> 3D </option> </select> </br>
			
			
            <input type="submit" value="Show" name="showc"/></span> </span> </a>
	</form>		
		</div>	
		</center>
	<?php
?>	
		<div>
		<center>
		<form method="POST">
			<table border="1">
                <tr>
				    <th> Photo </th>
                    <th> Movie Name</th>
                    <th> Date </th>
                </tr>
			<?php
			
			?>
				<tr>
				<td> </td>
				</tr>
            </table>
        
		</form>	
		</center>	
		</div>
	</div>
</body>