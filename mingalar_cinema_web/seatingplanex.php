<html>
<head>
	<title>Movie</title>
</head>
</body>
<?php
	include_once 'connection.php';
		$query = "SELECT * from seats order by rowId, columnId;"
		$result = mysqli_query($conneciton, $query);
 
	// Iterate through results, assign values to rowId, columnId,
	// status and updatedBy variables
		while (list($rowId, $columnId, $status, $updatedby) = mysql_fetch_row($result))
			echo &quot;\n
&amp;amp;lt;td bgcolor='$seatColor' align='center'&amp;amp;gt;&quot;;
echo &quot;$rowId$columnId&quot;;
 
if ($status == 0
   || ($status == 1
      &amp;amp;amp;&amp;amp;amp; $updatedby == $_SERVER['PHP_AUTH_USER'])) {
   echo &quot;&amp;amp;lt;input type='checkbox' name='seats[]'&quot;
      . &quot; value='$rowId$columnId'&amp;amp;gt;&amp;amp;lt;/checkbox&amp;amp;gt;&quot;;
		
	function reserveSeats() {
 
    var selectedList = getSelectedList('Reserve Seats');
 
    if (selectedList) {
        if (confirm('Do you want to reserve selected seat/s ' + selectedList + '?')) {
            document.forms[0].oldStatusCode.value=0;
            document.forms[0].newStatusCode.value=1;
            document.forms[0].action='bookseats.php';
            document.forms[0].submit();
        } else {
            clearSelection();
        }
    }
}
 
function cancelSeats() {
 
    var selectedList = getSelectedList('Cancel Reservation');
 
    if (selectedList) {
        if (confirm('Do you want to cancel reserved seat/s ' + selectedList + '?')) {
            document.forms[0].oldStatusCode.value=1;
            document.forms[0].newStatusCode.value=0;
            document.forms[0].action='bookseats.php';
            document.forms[0].submit();
        } else {
            clearSelection();
        }
    }
}
 
function confirmSeats() {
 
    var selectedList = getSelectedList('Confirm Reservation');
 
    if (selectedList) {
        if (confirm('Do you want to confirm reserved seat/s ' + selectedList + '?')) {
            document.forms[0].oldStatusCode.value=1;
            document.forms[0].newStatusCode.value=2;
            document.forms[0].action='bookseats.php';
            document.forms[0].submit();
        } else {
            clearSelection();
        }
    }
}
// dynamically build select statement
 
$selectQuery = &quot;SELECT rowId, columnId from seats where (&quot;;
$count = 0;
foreach($_POST['seats'] AS $seat) {
if ($count &amp;amp;gt; 0) {
$selectQuery .= &quot; || &quot;;
}
$selectQuery .= &quot; ( rowId = '&quot; . substr($seat, 0, 1) . &quot;'&quot;;
$selectQuery .= &quot; and columnId = &quot; . substr($seat, 1) . &quot; ) &quot;;
$count++;
}
 
$selectQuery .= &quot; ) and status = $oldStatusCode&quot;;
if ($oldStatusCode == 1) {
$selectQuery .= &quot; and updatedby = '$user'&quot;;
}
 
// execute select statement
$result = mysql_query($selectQuery);
 
$selectedSeats = mysql_num_rows($result);
if ($selectedSeats != $count) {
$problem = &quot;
&amp;amp;lt;h3&amp;amp;gt;There was a problem executing your request. No seat/s were updated.&amp;amp;lt;/h3&amp;amp;gt;
&quot;;
die ($problem);
}
// prepare update statement
$newStatusCode = $_POST['newStatusCode'];
$oldStatusCode = $_POST['oldStatusCode'];
 
$updateQuery = &quot;UPDATE seats set status=$newStatusCode, updatedby='$user' where ( &quot;;
$count = 0;
foreach($_POST['seats'] AS $seat) {
 if ($count &amp;amp;gt; 0) {
    $updateQuery .= &quot; || &quot;;
 }
 $updateQuery .= &quot; ( rowId = '&quot; . substr($seat, 0, 1) . &quot;'&quot;;
 $updateQuery .= &quot; and columnId = &quot; . substr($seat, 1) . &quot; ) &quot;;
 $count++;
}
$updateQuery .= &quot; ) and status = $oldStatusCode&quot;;
if ($oldStatusCode == 1) {
 $updateQuery .= &quot; and updatedby = '$user'&quot;;
}
 
// perform update
$result = mysql_query($updateQuery);
$updatedSeats = mysql_affected_rows();
 
if ($result &amp;amp;amp;amp;&amp;amp;amp;amp; $updatedSeats == $count) {
 echo &quot;
&amp;amp;lt;h3&amp;amp;gt;&quot;;
 echo &quot;You have successfully updated $updatedSeats seat/s: &quot;;
 echo &quot;[&quot;;
 foreach($_POST['seats'] AS $seat) {
    $rowId = substr($seat, 0, 1);
    $columnId = substr($seat, 1);
    echo $rowId . $columnId . &quot;, &quot;;
 }
 echo &quot;]&quot;;
 echo &quot;...&amp;amp;lt;/h3&amp;amp;gt;
&quot;;
}	
?>


</body>