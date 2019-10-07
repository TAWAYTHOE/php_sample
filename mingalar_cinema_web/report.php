<?php
	session_start();
	$a_id= $_SESSION['adminid'];

?>
<!DOCTYPE HTML5>
<html>
<head>
	<title>Report</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
     <div id="nav_bar">
        <ul>
			<li><a href="ahome.php">Home</a></li>
            <li><a href="acinema.php">Cinema</a></li>
            <li><a href="amovie.php">Movie</a></li>
			<li><a href="aschedule.php">Schedule</a></li>
            <li><a href="report.php">Report</a></li>
			<li><a href="logout.php">Logout</a></li>
       </ul>
     </div>
	<div id="report">
		<center>
			<h1>Mingalar Cinema Group</h1>
			<h2>Report Information</h2>	
			<div style="float:left">
			
			<center>
			<form method="POST">  
			<table style="width:50%; ">	
			
			<tr><td><h3>Report for mostly watched movie name by cinema</h3>	</td> </tr>		
			<tr><td><select name="month">
				<option>Select Month</option>
				<option value='1'>January</option>
				<option value='2'>February</option>
				<option value='3'> March</option>
				<option value='4'> April</option>
				<option value='5'> May</option>
				<option value='6'> June </option>
				<option value='7'> July</option>
				<option value='8'> August</option><option value='9'> September</option>
				<option value='10'> October </option><option value='11'> November </option><option value='12'> December </option>
				</select></td>
				<td><input type="submit" value="Show" name="show"/> </td> </tr>
			</table>	
			</form>	
			</center>
			</div>			
	<?php
		include 'connection.php';
	if(isset($_POST['show'])){
		
		$month=$_POST["month"];
		
		$query="SELECT  m.moviename, count(p.planid) as times FROM exbooking e, movie m, plan p 
				WHERE  e.planid=p.planid and p.movieid=m.movieid and
				month(showdate)='$month' GROUP BY p.planid order by times desc" ;
		$ret=mysqli_query($connection, $query);
		if($ret){
			$row=mysqli_fetch_all($ret);
			//echo "<script>alert('Data Inserted')</script>";
			echo	"<table border='1' style='width:70%'>";
	?>
                <tr>
                    
                    <th> Movie Name</th>
					<th> Times </th>
                    

                </tr>
			<?php
				for($i=0;$i<sizeof($row);$i++){
			?>	
				<tr>
					<td> <?php echo $row[$i][0]; ?> </td>
					<td> <?php echo $row[$i][1]; ?> </td>
					
					
				</tr>
	<?php 
				}
		}
			echo "</table>";
		if(!$ret){ 
		//echo "<script> alert('Data Not Inserted');</script>"; 
			echo mysqli_error($connection);}		
	}	
	?>
		
		<div style="margin-top:20px;">
			<center>	
			<form method="POST">  
			<table style="width:50%;">					
			<tr><td><h3>Report for monthly income by cinema</h3></td></tr>
			<tr><td><select name="mth">
				<option>Select Month</option>
				<option value='1'>January</option>
				<option value='2'>February</option>
				<option value='3'> March</option>
				<option value='4'> April</option>
				<option value='5'> May</option>
				<option value='6'> June </option>
				<option value='7'> July</option>
				<option value='8'> August</option><option value='9'> September</option>
				<option value='10'> October </option><option value='11'> November </option><option value='12'> December </option>
				</select></td>
				<td><input type="submit" value="View" name="view"/> </td> <td></td></tr>
			</table>	
			</form>	
			</center>
		</div>
		<?php
			include 'connection.php';
			if(isset($_POST['view'])){
				$mth=$_POST["mth"];		
			$qury="select c.cinemaname, Sum(e.totalprice) as total
					from exbooking e, cinema c, plan p
					where c.cinemaid=p.cinemaid and p.planid=e.planid and 
					month(showdate)='$mth' order by total desc" ;
				$relt=mysqli_query($connection, $qury);
				if($relt){
						$qty=mysqli_query($connection,'select ');
					
					$row_num=mysqli_fetch_all($relt);
			//echo "<script>alert('Data Inserted')</script>";
			echo	"<table border='1' style='width:70%'>";
		?>
                <tr>
                    <th> Cinema Name</th>
                    <th> Total Price </th>
					
                    <th> </th>

                </tr>
			<?php
				for($i=0;$i<sizeof($row_num);$i++){
			?>	
				<tr>
					<td> <?php echo $row_num[$i][0]; ?> </td>
					<td> <?php echo $row_num[$i][1]; ?> </td>
					
				</tr>
		<?php 
				}
				}
			echo "</table>";
				if(!$relt){ 
				//echo "<script> alert('Data Not Inserted');</script>"; 
				echo mysqli_error($connection);
				}		
			}	
	?>
	</center>
	</div>
</body>	
</html>