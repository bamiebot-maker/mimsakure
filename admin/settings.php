<?php

session_start();
include '../config/db.php';


// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit();
}


$user_id = $_SESSION['user_id'];
$msg = "";

// Fetch user data
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($result);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Handle photo upload
    $photo = $user['photo'];
    if (!empty($_FILES['photo']['name'])) {
        $target = "../uploads/" . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo = $target;
        }
    }

    $sql = "UPDATE users 
            SET username='$username', phone='$phone', address='$address', photo='$photo'
            WHERE id=$user_id";

    if (mysqli_query($conn, $sql)) {
        $msg = "Profile updated successfully!";
        // Refresh data
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
        $user = mysqli_fetch_assoc($result);
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}

// Handle password change
if (isset($_POST['change_password'])) {
    $old_pass = $_POST['old_password'];
    $new_pass = $_POST['new_password'];

    if (password_verify($old_pass, $user['password'])) {
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE users SET password='$hashed' WHERE id=$user_id");
        $msg = "Password updated successfully!";
    } else {
        $msg = "Old password incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Settings | MIMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body { 
        font-family: Arial, sans-serif;
        background: #e8f5e9;
     }
    .main { 
        padding: 80px 30px;
        margin-left: 220px;
     }
    form { 
        background: white; 
        padding: 20px; 
        border-radius: 6px; 
        max-width: 600px; 
    }
    label { 
        display: block; 
        margin: 10px 0 5px;
     }
    input, textarea { 
        width: 100%; 
        padding: 10px; 
        margin-bottom: 15px; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
    }
    button { 
        background: #070236ff; 
        color: white; 
        padding: 10px 15px; 
        border: none; 
        border-radius: 4px; 
        cursor: pointer; 
    }
    .msg { 
        margin-bottom: 15px; 
        color: green; 
    }
    img { 
        max-height: 100px; 
        border-radius: 50%; 
        margin-top: 10px;
     }
  </style>
</head>
<?php include("../admin/admin_nav.php"); ?>
<body>
<div class="main">
  <h2>User Settings (<?= ucfirst($user['role']); ?>)</h2>

  <?php if ($msg): ?>
    <p class="msg"><?= $msg ?></p>
  <?php endif; ?>

  <!-- Profile Update -->
  <form method="POST" enctype="multipart/form-data">
    <h3>Update Profile</h3>

    <label>Username</label>
    <input type="text" name="username" value="<?= $user['username'] ?>" required>

    <label>Email</label>
    <input type="email" value="<?= $user['email'] ?>" disabled>

    <label>Phone</label>
    <input type="text" name="phone" value="<?= $user['phone'] ?>">

    <label>Address</label>
    <textarea name="address"><?= $user['address'] ?></textarea>

    <label>Profile Photo</label>
    <input type="file" name="photo">
    <?php if (!empty($user['photo'])): ?>
      <img src="<?= $user['photo'] ?>" alt="Profile Photo">
    <?php endif; ?>

    <button type="submit">Update Profile</button>
  </form>

  <!-- Password Change -->
  <form method="POST">
    <h3>Change Password</h3>
    <label>Old Password</label>
    <input type="password" name="old_password" required>

    <label>New Password</label>
    <input type="password" name="new_password" required>

    <button type="submit" name="change_password">Change Password</button>
  </form>
</div>
</body>
</html>
