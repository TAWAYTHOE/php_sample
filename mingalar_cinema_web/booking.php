<?php
	session_start();
	$memberid = $_SESSION['memberid'];
	
	$pid=$_GET['plan_id'];
	$_ppid = $_SESSION['pplanid'] =$pid;
	
	$bookdate=Date('Y-m-d');
	//echo $pid; 	
	include_once 'connection.php';
	$exid="";
	$query="Select MAX(exbookid) as exid  from exbooking";
		$result = mysqli_query ($connection, $query);
		$rows = mysqli_num_rows($result);
		if($rows >= 0)
		{				
			$row_num = mysqli_fetch_array($result);
			$exid = $row_num["exid"];
				$maxid = $exid;
				$newid = substr($maxid, 1)+1;
				$exid = "B".str_pad($newid, 4, '0', STR_PAD_LEFT);
		} 
		else { $exid= "B0001"; }		
?>

<!DOCTYPE HTML5>
<html>
<head>
	<title>Booking</title>
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
	<div id="booking">
		<div>
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Booking Information</h2>	
		<form id="main" method="GET">
		<fieldset>  
				<table>
		<?php
		include_once 'connection.php';
				$sql="select p.planid, c.cinemaname, m.moviename, m.moviephoto, p.movielength
				from plan p, movie m, cinema c 
				where c.cinemaid=p.cinemaid and p.movieid=m.movieid and p.planid='$_ppid' ";
				$query=mysqli_query($connection, $sql);
	
			if(!$query){
					echo("Error description: " . mysqli_error($connection));
						echo mysqli_errno($connection);					
			}
			else{
				$row = mysqli_fetch_array($query);
				$_ppid=$row["planid"];
				
			}
		
		?>	
			<tr><td><input type="text" name="plan_id" value="<?php echo $_ppid;  ?>" readonly/> </td></tr>		
			<tr><td><input type="text" name="cid" value="<?php echo $memberid;  ?>" hidden/> </td></tr>
				<tr><td><input type="text" name="cname" value="<?php echo"Cinema : "; echo $row["cinemaname"];   ?>" readonly/> </td></tr>
				<tr><td><input type="text" name="mname" value="<?php echo"Movie : "; echo $row["moviename"];  ?>" readonly/> </td></tr>
				<tr><td><img src="images/<?php echo $row["moviephoto"]; ?>" alt="image" height="200" width="200"/></td></tr>
				<tr><td><input type="text" name="mlength" value="<?php echo"Duration : "; echo $row["movielength"]; echo"min";  ?>" readonly/> </td></tr>
				
				<tr><td><select name="totalseat">
					<option> Select Total-Seats </option>
                    <option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option> 
				</select> </td></tr>
				
            <tr><td><input type="submit" value="View Seats" name="viewseat"/></td></tr>
			</table>
		</fieldset>
		</form>
		</center>
		
		</div>

	<?php
	if(isset($_GET['viewseat'])){
		
		$mid=$_GET["cid"];	
		//$planid=$_GET["pplanid"];
		//$_SESSION['pplanid']=$planid;
		$seattotal=$_GET["totalseat"];
		$_session['seatt']=$seattotal;
		
		include_once 'connection.php';
		//echo $pid; echo $mid;
		$sql="select s.seatid from exbooking e,seat s where s.seatid=e.seatid1 or s.seatid=e.seatid2 or s.seatid=e.seatid3";
		$run=mysqli_query($connection, $sql);
		$row_seat=mysqli_fetch_array($run);
		$seatno=$row_seat["seatid"];
		
		$sqlrun="select seatid from seat where seatid<>'$seatno' ";
		$runsql= mysqli_query($connection, $sqlrun);

		if($runsql){
			?>
		<div>
			<form method="POST" style="margin-left: 200px;" >
			<table>
				<tr><td><input type='text' name='showdate' class='tcal' value='' placeholder='Select Booking Date' required /> </td></tr>
						
				<tr><td><select name="showtime" required/>
                    <option value="10:00:00">10:00 AM</option>
					<option value="13:00:00"> 1:00 PM</option>
					<option value="15:00:00"> 3:00 PM</option> 
					<option value="18:00:00"> 5:00 PM</option>
					<option value="21:00:00"> 9:00 PM</option>
				</select> </td></tr>
				<tr><td> Staff ( A - F ) [$3000ks/] </td></tr>		
				<tr><td>   DC ( G - L ) [$2000ks/] </td></tr>
		<?php
			$seat_no=mysqli_fetch_all($runsql);					
			if($seattotal==1){

			?>	
			<tr><td><select name="seat101">
				<option value=""> Select Seat No </option>
			<?php	
				for($i=0; $i<sizeof($seat_no); $i++){
					
			?>
				<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option>
		<?php
				}
			echo "</select></td></tr>";
			}
			if($seattotal==2){
				
				?>
				<tr><td><select name="seat201">
					<option value=" "> Select Seat No </option>
				<?php
				for($i=0; $i<sizeof($seat_no); $i++){
		?>
				<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option> 
		<?php
				}
				echo "</select></td></tr>";
				?>
				<tr><td><select name="seat202">
					<option value=""> Select Seat No </option>
				<?php
				for($i=0; $i<sizeof($seat_no); $i++){
		?>
				<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option>
		<?php
				}
			echo "</select></td></tr>";
		?>
			
		<?php
			}
			if($seattotal==3){
				?>
				<tr><td><select name="seat301">
					<option value="0"> Select Seat No </option> 
				<?php	
				for($i=0; $i<sizeof($seat_no); $i++){
		?>
					<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option>
		<?php
				}
				echo "</select></td></tr>";
				?>
				<tr><td><select name="seat302">
					<option value=""> Select Seat No </option>
				<?php
				for($i=0; $i<sizeof($seat_no); $i++){
		?>
					<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option>
		<?php
				}
				echo "</select></td></tr>";
				?>
				<tr><td><select name="seat303">
					<option value=""> Select Seat No </option>
				<?php
				for($i=0; $i<sizeof($seat_no); $i++){
		?>
					<option value="<?php echo $seat_no[$i][0]?> "> <?php echo $seat_no[$i][0];?> </option>
		<?php
				}
			echo "</select></td></tr>";
			}
		?>	
			<tr><td><input type="submit" value="Confirm" name="booking"/> </td></tr>
			</table>
			</form>				
			<?php		
			
		}

		else{
			echo "old query run";
			echo mysqli_error($connection);
		//echo "<script> alert('Data Not Inserted');</script>"; echo mysql_error(); 
		}
	}	
			if(isset($_POST["booking"])){
				include_once 'connection.php';
				//session_start();
				$tseat=$_GET["totalseat"];
				$showdate= date("Y-m-d", strtotime($_POST["showdate"]));
				$showtime= $_POST["showtime"];			
				
				if($tseat==1){
					$seat1= $_POST["seat101"]; $seat2='0'; $seat3='0'; 
						$price=mysqli_query($connection, "select price from seat where seatid='$seat1' ");
							$price_1=mysqli_fetch_array($price1);
							$totalprice1=$price_1["price"]; $totalprice2='0'; $totalprice3='0';
				}
				if($tseat==2){
					$seat1= $_POST["seat201"]; $seat2= $_POST["seat202"]; $seat3= '0';
						$pric1=mysqli_query($connection, "select price from seat where seatid='$seat1' ");
							$pric_1=mysqli_fetch_array($pric1);
							$totalprice1=$pric_1["price"];
						$pric2=mysqli_query($connection, "select price from seat where seatid='$seat2' ");
							$pric_2=mysqli_fetch_array($pric2);
							$totalprice2=$pric_2["price"];	$totalprice3='0';
				}
				if($tseat==3){
					$seat1= $_POST["seat301"]; $seat2= $_POST["seat302"]; $seat3= $_POST["seat303"];
						$pri1=mysqli_query($connection, "select price from seat where seatid='$seat1' ");
							$pri_1=mysqli_fetch_array($pri1);
							$totalprice1=$pri_1["price"];
						$pri2=mysqli_query($connection, "select price from seat where seatid='$seat2' ");
							$pri_2=mysqli_fetch_array($pri2);
							$totalprice2=$pri_2["price"];
						$pri3=mysqli_query($connection, "select price from seat where seatid='$seat3' ");
							$pri_3=mysqli_fetch_array($pri3);
							$totalprice3=$pri_3["price"];					
				}
	
					$totalprice=$totalprice1+$totalprice2+$totalprice3 ;
					//echo $totalprice1."</br>"; echo $totalprice1."</br>";	echo $totalprice3."</br>"; echo $totalprice;
				$check=mysqli_query($connection,"select * from exbooking where planid='$pid' and showdate='$showdate' and showtime='$showtime' and 
					seatid1='$seat1' or seatid1='$seat2' or seatid1='$seat3' and seatid2='$seat2' or seatid2='$seat1' or seatid2='$seat3' 
					and seatid3='$seat3' or seatid3='$seat1' or seatid3='$seat2' ");
				if(mysqli_num_rows($check)){
					echo "<script>alert('Booking already existed!')</script>"; 
				}
				else{
				
				$quey="INSERT INTO exbooking values ('$exid','$mid','$pid','$seat1','$seat2','$seat3','$bookdate','$showdate','$showtime',$totalprice)";
				$relt=mysqli_query($connection,$quey);
					if($relt){
						echo "<script> alert('Booking Success!');window.location='cinvoice.php';</script>";
					}
					else{ echo mysqli_error($connection);echo"</br>";   
						echo "Fail to book";
					}	
						echo "Fail"; echo mysqli_error($connection);
					
				}		
			
			}

							
		?>	
		</div>	
		
	</div>
</body>