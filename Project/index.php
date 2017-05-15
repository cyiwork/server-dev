<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3>User Records</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'databases.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM user_records ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['first_name'] . '</td>';
                            echo '<td>'. $row['last_name'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
