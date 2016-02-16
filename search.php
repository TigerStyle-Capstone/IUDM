<?php include('connect-db.php'); ?>

<?php
if (isset($_POST['search'])){
	$searchq = $_POST['search'];
	$searchq = mysqli_real_escape_string($connection, $searchq);
	
	$query = "SELECT * FROM users WHERE first_name = '$searchq'";
	
	$result = mysqli_query($connection, $query);
	if (!$result){
		die("Database query failed.");
	}
	
	echo "<p><b>Search Result</b></p>";
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Email</th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_assoc($result)) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['first_name'] . '</td>';
		echo '<td>' . $row['last_name'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
	
	mysqli_free_result($result);
	mysqli_close($connection);
}
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Search</title>
</head>
<body>

<form action="search.php" method="post">
	<input type = "text" name="search" placeholder="Search for first names"/>
	<input = type ="submit" value=">>"/>
</form>


</body>
</html>	
