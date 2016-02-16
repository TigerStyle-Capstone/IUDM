<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Committee Connnect Users!</title>
</head>
<body>

<?php
/* 
	VIEW.PHP
	Displays all data from 'players' table
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$query = "SELECT * FROM users";
	$result = mysqli_query($connection, $query);
	if (!$result){
		die("Database query failed.");
	}
		
	// display data in table
	echo "<p><b>View All</b></p>";
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th></th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_assoc($result)) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['first_name'] . '</td>';
		echo '<td>' . $row['last_name'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
	
	mysqli_free_result($result);
	mysqli_close($connection);
?>
<p><a href="new.php">Add a new record</a></p>
<p><a href="search.php">Search for a user</a></p>

</body>
</html>	
