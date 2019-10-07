<!DOCTYPE HTML5>
<html>
<head>
	<title>Home</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
	</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="chome.php">Home</a></li>
            <li><a href="cshownow.php">Showing Now</a></li>
			<li><a href="cinvoice.php">View Invoice</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="chome">
		<div>
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Home</h2>	
		<form id="cinema_form" method="POST">  
		<table style="width:50%">		
			<tr><td><select name="cinema">
				<option>Select Cinema </option>
       		<?php 
					include_once 'connection.php';
					$query = "select cinemaid,cinemaname from cinema";
					$relt = mysqli_query($connection, $query);
					while($_out = mysqli_fetch_assoc($relt)){

			?>
				<option value="<?php echo $_out["cinemaid"]; ?>"> <?php echo $_out["cinemaname"] ?> </option>
			<?php
					}
			?>
			</select></td>
            <td><input type="submit" value="Show" name="show"/> </td> <td></td></tr>
		</table>	
		</form>		
		</center>
		</div>	
		
	<?php
	if(isset($_POST["show"])){
		$cid = $_POST["cinema"]; 
			include_once 'connection.php';
		$qql="select m.moviename, m.moviephoto, m.movietype,p.startdate, p.enddate, p.planid 
		from plan p,cinema c,movie m where c.cinemaid=p.cinemaid and p.movieid=m.movieid and c.cinemaid='$cid' ";
		
		$run=mysqli_query($connection, $qql);
		if(!$run){
			echo("Error description: " . mysqli_error($connection));
		}	
		else{
			echo "<form action='' method='POST'>";
			
			$num_row=mysqli_num_rows($run);
				
			for($i=0; $i<$num_row; $i++){
				$num=mysqli_fetch_assoc($run);
				
					echo "<table style='margin-top:50px; width:100px; float:left; text-align:center; border-radius:10%;'>";
					echo " <tr><td>". $num["moviename"] ."</td></tr>";
		?>	
			<tr><td><img src="images/<?php echo $num['moviephoto']; ?>" alt="image" height="200px" width="180px"/><td></tr>
		<?php	
					echo " <tr><td>". $num["movietype"]  ."</td></tr>";
					echo " <tr><td>". $num["startdate"] ."</td></tr>";
					echo " <tr><td><p> Betweem </p></td></tr>";
					echo " <tr><td>". $num["enddate"] ."</td></tr>";	
					
	?>
		<tr><td> <a href="booking.php?plan_id=<?php echo $num["planid"]; ?> " > Book Now </a> </td></tr>
				
		<?php
		// session_start();
		//$_SESSION['plan_id']=$num["planid"];
				echo "</table>";
			}
			
			echo "</form>";
		}	
		
	}
	
?>			
           

	</div>
</body>