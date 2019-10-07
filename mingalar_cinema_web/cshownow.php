<?php
	session_start();
	$memberid = $_SESSION['memberid'];	
?>

<!DOCTYPE HTML5>
<html>
<head>
	<title>Showing Now</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="chome.php">Home</a></li>
            <li><a href="cshownow.php"> Showing Now</a></li>
			<li><a href="cinvoice.php">View Invoice</a></li>
			<li><a href="logout.php">Logout</a></li>
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
					<p><?php echo $list[$i][3];?> </p>
					<p> <?php echo $list[$i][4];?> </p>
					<img src="images/<?php echo $list[$i][2]; ?>" alt="Image" style="width:200px; height: 250px; "/>
					<h3><?php echo $list[$i][1];?> </h3>
					<p style="width:200px;" border='2'> <?php echo $list[$i][5];?> </p>
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