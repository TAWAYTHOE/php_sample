<!DOCTYPE HTML5>
<html>
<head>
	<title>Showing Now</title>
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
	<div id="show_now">
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Showing Now</h2>	
			<table border='1' style="width:100%;">
			<tr>
			<?php
				include_once 'connection.php';
				$query=mysqli_query($connection,"select c.cinemaname, m.moviename, m.moviephoto, p.startdate, p.enddate, m.moviedes 
				from plan p, cinema c, movie m where p.cinemaid=c.cinemaid and p.movieid=m.movieid");
				if($query){
					$list=mysqli_fetch_all($query);
					for($i=0;$i<sizeof($list);$i++){
		
			?>	<td style="float:left;">
					<h3><?php echo $list[$i][0] ;?> </h3>
					<p>Start (<?php echo $list[$i][3];?>) </p>
					<p>End (<?php echo $list[$i][4];?>) </p>
					<img src="images/<?php echo $list[$i][2]; ?>" alt="Image" style="width: 200; height: 250px; "/>
					<h3><?php echo $list[$i][1];?> </h3>
					<p> <?php echo $list[$i][5];?> </p>
					
				</td>
				
			<?php
			
					}
				}
				else{echo mysqli_errno($connection); echo "</br>"; echo mysqli_error($connection);}
			?>	
			</tr>
			</table>
		</center>	
	</div>
	
</body>