<?php
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "my_app";
	$dbpass = "secret";
	$dbname = "my_app";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection occured.
	if(mysqli_Connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_Connect_errno() . ")"
		);
	}
?>

<?php
	// 2. Perform database query
	$query = "SELECT * FROM user_records";
	$result = mysqli_query($connection, $query);
	// Test if there was a query error
	if (!$result) {
		die("Database quesry failed.");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Databases</title>
	</head>
	<body>
		<ul>
	<?php
	  //3. Use returned data (if any)
	  while($subject = mysqli_fetch_assoc($result)) {
		// output data from each row
	?>
			<li><?php echo $subject["email"] . " (" . $subject["id"] . ")"; ?></li>
	<?php
	  }
	?>
		</ul>
	<?php
	  // 4. Release returned data
	  mysqli_free_result($result);
	?>

	</body>
</html>

<?php
	// 5. Close Database Connection
	mysqli_close($connection);
?>
