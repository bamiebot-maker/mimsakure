<?php 
      session_start();
       include '../config/db.php';
      


      error_reporting(0);
      if($_SESSION["signupmessage"]){
        $message = $_SESSION["signupmessage"];

        echo "<script type='text/javascript'>alert('$message');</script>";
      } else {
        $message = "";
      }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | MIMS</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e8f5e9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    h1 {
      color: #024410ff;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #024410ff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #024410ff;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <input name="login" type="submit" value="Login">
      <?php if (isset($_GET['error'])): ?>
  <p style="color:red;">Invalid email or password!</p>
<?php endif; ?>

      <p>Don't have an account? <a href="../public/signup.php">Sign up here</a></p>
    </form>
  </div>

</body>
</html>

<?php

     
if($_SERVER["REQUEST_METHOD"] == "POST"){
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $password = mysqli_real_escape_string($conn, $_POST["password"]);

      //login logic
      $sql = "SELECT `id`, `username`, `password`, `role`, `email`, `status`, `created_at` FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
      $result = mysqli_query($conn, $sql);
      $row =mysqli_fetch_array($result);

      if($row["role"] == "admin"){

        $_SESSION["email"] = $email;
        $_SESSION["usertype"] = "admin";
        header("Location: ../admin/dashboard.php");
        exit();

      } elseif($row["role"] == "teacher"){
        $_SESSION["email"] = $email;
         $_SESSION["usertype"] = "teacher";
        header("Location: ./teacher/dashboard.php");
        exit();


      } elseif($row["role"] == "student"){
        $_SESSION["email"] = $email;
         $_SESSION["usertype"] = "student";
        header("Location: ./student/dashboard.php");
        exit();

      }  else {
        session_start();
       
        $message = "Invalid username or password!!!";

        $_SESSION["loginMessage"] = $message;
        header("Location: login.php");
      }
}
   
?>

