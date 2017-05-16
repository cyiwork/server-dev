<!DOCTYPE HTML>
<html>
<head>
    <title>Read One Record</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


    <!-- container -->
    <div class="container">
		<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

//include database connection
include 'config/databases.php';

// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM user_records WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );

    // this is the first question mark
    $stmt->bindParam(1, $id);

    // execute our query
    $stmt->execute();

    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // values to fill up our form
    $email = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
	$password = $row['password'];
}

// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<!--we have our html table here where new user information will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Email</td>
        <td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>First Name</td>
        <td><?php echo htmlspecialchars($first_name, ENT_QUOTES);  ?></td>
    </tr>
	<tr>
        <td>Last Name</td>
        <td><?php echo htmlspecialchars($last_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo htmlspecialchars($password, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='read.php' class='btn btn-danger'>Back to read users</a>
        </td>
    </tr>
</table>
        <div class="page-header">
            <h1>Read Users</h1>
        </div>

        <!-- dynamic content will be here -->

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
