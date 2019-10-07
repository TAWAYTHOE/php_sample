<?php
	session_start();
	$memberid = $_SESSION['memberid'];	
?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Invoice</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
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
	<div id="cinvoice">
		<div>
		<center>
			<h1>Shae Saung Cinema Group</h1>
			<h2>Invoice</h2>
		<form id="cinema_form" method="POST">  
		<table border='1' width="auto">		
			<tr><th> Booking ID</th><th>Cinema</th><th>Movie</th><th>Seat No </th><th>Seat No</th> <th>Seat No</th>
			<th>ShowDate</th><th>ShowTime</th><th>BookDate</th><th>Price</th><th></br></th> </tr>
			
		<?php
			include 'connection.php';
			$sql=" select e.exbookid, c.cinemaname, m.moviename, e.seatid1,e.seatid2,e.seatid3,e.showdate,e.showtime,e.bookdate, e.totalprice 
			from plan p, exbooking e, movie m, cinema c, seat s 
			where p.cinemaid=c.cinemaid and p.movieid=m.movieid and e.planid=p.planid and e.seatid1=s.seatid and e.memberid='$memberid'
			order by e.exbookid desc";
			$run=mysqli_query($connection,$sql);
			$row_count=mysqli_num_rows($run);
			$row=mysqli_fetch_all($run);
			if($run){
				for($i=0; $i<$row_count; $i++){
		?>	
			<tr>
				<td><?php echo$row[$i][0];?></td><td><?php echo$row[$i][1];?></td><td><?php echo$row[$i][2];?></td> 
				<td><?php echo$row[$i][3];?></td><td><?php echo$row[$i][4];?></td><td><?php echo$row[$i][5];?></td> 
				<td><?php echo$row[$i][6];?></td><td><?php echo$row[$i][7];?></td><td><?php echo$row[$i][8];?></td><td><?php echo$row[$i][9];?></td>
				<td><a href="invoice_delete.php?inid=<?php echo$row[$i][0];?>">Delete</a></td>
			</tr>
				
			
		<?php
				}
			}
			else{echo mysqli_error($connection); }
		?>	
            
		</form>		
		</center>
		</div>	
	</div>
</body>
</html>