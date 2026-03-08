
<?php
include '../config/auth.php';
include '../config/db.php';

// Access Control check
if ($_SESSION['usertype'] !== 'teacher') {
    header("Location: ../public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teacher Dashboard | MIMS</title>
  <style>

    .main h2{
      padding:0 20px;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e8f5e9;
      display: flex;
    }

    .sidebar {
      width: 220px;
      background-color: #2515bba8;
      color: white;
      height: 100vh;
      padding: 10px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      padding: 10px;
      margin-bottom: 10px;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }

    .sidebar a:hover {
      background-color: #2515bba8;
    }

    .main {
      flex: 1;
      padding:40px;
    }

    h1 {
      color: #2515bba8;
    }

    .card {
      background-color: white;
      padding:40px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      margin-top: 20px;
      margin-left: 30px;
      margin-right: 30px;

    }

    .card p {
      margin: 0;
    }
  </style>
</head>
<body>
<?php
  include("../config/greet.php");
  include("./teacher_nav.php");
  ?>

 

  <div class="main">
     <?php
    echo "<h2>" . htmlspecialchars($tim) . " Teacher!</h2>";
    ?>
    <div class="card">
      <h2>MSSN ISLAMIC MODEL SCHOOL</h2>
      <p>
        Welcome to the MSSN Islamic Model School teacher dashboard.
      </p>
    </div>
  </div>

</body>
</html>