<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
</br>
<h1>The Measurements table</h1>
<form method="post" action="<?php echo $SELF_SERVER ?>">
<div class="container">
 <div class="form-group">
    <label>Search
    <input  type="text"class="form-control"name="search" placeholder="phone number"></label>
	<input type="submit"/> 
 </div>
 </div>
</form>

<?php

if(isset($_POST['submitted'])) {
 
 include('connect.php');
 $phone = $_POST['search'];
 
 $query="SELECT Phone,Date FROM measurements WHERE $phone = 'Phone' order by Date";
 $result = mysql_query($dbcon,$query) or die('error getting data');
 
 echo "<table>";
 echo "<tr> <th>Phone</th> <th>LatestDate</th> </tr>";
 while ($row = mysql_fetch_array($result, MYSQLI_ASSOC)) {
	
	echo "<tr><td>";
	echo $row['Phone'];
	echo "</td><td>";	
	echo $row['Date'];
	echo "</td></tr>";
	}
	
	
 echo "</table>";
 }

?>


</body>
</html>