<!DOCTYPE HTML>
<html>
<head>
    <title>Create a Record</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


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
		<!-- html form here where the user information will be entered -->
<?php
if($_POST){

    // include database connection
    include 'config/databases.php';

    try{

        // insert query
        $query = "INSERT INTO user_records SET email=:email, first_name=:first_name, last_name=:last_name, password=:password, created=:created";

        // prepare query for execution
        $stmt = $con->prepare($query);

        // posted values
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $first_name=htmlspecialchars(strip_tags($_POST['first_name']));
        $last_name=htmlspecialchars(strip_tags($_POST['last_name']));
		    $password=htmlspecialchars(strip_tags($_POST['password']));

        // bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
		    $stmt->bindParam(':password', $password);

        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }

    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><textarea name='first_name' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text' name='last_name' class='form-control' /></td>
        </tr>
		<tr>
            <td>Password</td>
            <td><input type='text' name='password' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='read.php' class='btn btn-danger'>Back to read users</a>
            </td>
        </tr>
    </table>
</form>
        <div class="page-header">
            <h1>User Records</h1>
        </div>

    <!-- dynamic content will be here -->

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>
