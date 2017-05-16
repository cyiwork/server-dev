<?php

  include 'databases.php';



// insert data
      if ($valid) {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO user_records (email, first_name. last_name) values (?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$email,$mobile));
          Database::disconnect();
          header("Location: index.php");
      }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($first_nameError)?'error':'';?>">
                        <label class="control-label">First Name</label>
                        <div class="controls">
                            <input name="first_name" type="text" placeholder="First Name" value="<?php echo !empty($first_name)?$first_name:'';?>">
                            <?php if (!empty($first_nameError)): ?>
                                <span class="help-inline"><?php echo $first_nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($last_nameError)?'error':'';?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="last name" type="text"  placeholder="Last Name" value="<?php echo !empty($last_name)?$last_name:'';?>">
                            <?php if (!empty($last_nameError)): ?>
                                <span class="help-inline"><?php echo $last_nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
