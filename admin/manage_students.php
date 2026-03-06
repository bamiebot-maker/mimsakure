<?php

session_start();
include'../config/db.php';

$edit_mode = false;
$edit_data = [
  'id' => '',
  'username' => '',
  'email' => '',
  'password' => '',
  'age' => '',
  'gender' => '',
  'phone' => '',
  'address' => ''
];
// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $insert_user = "INSERT INTO users (username, email, password, role) 
                  VALUES ('$name', '$email', '$password', 'student')";
  mysqli_query($conn, $insert_user);
  $user_id = mysqli_insert_id($conn);

  $insert_student = "INSERT INTO students (firstname, user_id, dob, gender, address)
                     VALUES ('$name','$user_id', '$age', '$gender', '$address')";
  mysqli_query($conn, $insert_student);
}

// Handle Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_student'])) {
  $id = $_POST['edit_id'];
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $sql_user = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id AND role='student'";
  $sql_student = "UPDATE students SET firstname='$name', dob='$age', gender='$gender', phone='$phone', address='$address' WHERE user_id=$id";

  mysqli_query($conn, $sql_user);
  mysqli_query($conn, $sql_student);
}

// Handle Delete
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  mysqli_query($conn, "DELETE FROM users WHERE id=$id AND role='student'");
}

// Prepare Edit
if (isset($_GET['edit'])) {
  $edit_mode = true;
  $id = intval($_GET['edit']);
  $result = mysqli_query($conn, "SELECT u.*, s.age, s.gender, s.phone, s.address 
                                 FROM users u 
                                 JOIN student s ON u.id = s.user_id 
                                 WHERE u.id=$id AND u.role='student'");
  if ($row = mysqli_fetch_assoc($result)) {
    $edit_data = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Students | MIMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    *{
      padding: 0;
      margin: 0;

    }
    body {
      font-family: Arial, sans-serif;
      background-color: #e8f5e9;
      
    }
    .sidebar {
      width: 220px;
      background-color: #070236ff;
      color: white;
      height: 100vh;
      padding: 20px;
      position: fixed;
    }
    .main {
      margin-left: 220px;
      padding: 80px 30px 30px;
      flex: 1;
    }
    h1 {
      color: #070236ff;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      padding: 0 20px;
      margin-left: 20px;
    }
    th, td {
      padding: 5px;
      border: 1px solid #ccc;
    }
    th {
      background: #070236ff;
      color: #f3efefff;
    }
    form{
      padding: 20px;
    }
    form input, select, textarea {
      padding: 8px;
      margin: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background: #070236ff;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 4px;
      margin: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #070236ff;
    }
    .actions button {
      margin-right: 5px;
    }
    .delete {
      background: #e53935;
    }
  </style>
</head>
<?php include("../admin/admin_nav.php"); ?>
<body>
<div class="main">
  <h2 style="position: relative; padding: 20px;">Manage Students</h2>

  <form method="POST">
    <input type="hidden" name="edit_id" value="<?= $edit_data['id'] ?>">
    <input type="text" name="username" placeholder="Name" value="<?= $edit_data['username'] ?>" required>
    <input type="email" name="email" placeholder="Email" value="<?= $edit_data['email'] ?>" required>
    <input type="text" name="password" placeholder="Password" value="<?= $edit_data['password'] ?>" required>
    <input type="number" name="age" placeholder="Age" value="<?= $edit_data['age'] ?>" required>
    <input type="text" name="phone" placeholder="Phone" value="<?= $edit_data['phone'] ?>" required>
    <select name="gender" required>
      <option value="">Gender</option>
      <option value="male" <?= $edit_data['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
      <option value="female" <?= $edit_data['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
    </select>
    
    <textarea name="address" placeholder="Address"><?= $edit_data['address'] ?></textarea>
    <?php if ($edit_mode): ?>
      <button type="submit" name="update_student">Update Students</button>
      <a href="manage_students.php"><button type="button">Cancel</button></a>
    <?php else: ?>
      <button type="submit" name="add_student">Add Student</button>
    <?php endif; ?>
  </form>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT u.id, u.username, u.email, s.dob, s.gender, s.guardian_phone, s.address
                FROM users u
                JOIN students s ON u.id = s.user_id
                WHERE u.role='students'
                ORDER BY u.id DESC";
      $result = mysqli_query($conn, $query);
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$i}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td class='actions'>
                  <a href='?edit={$row['id']}'><button>Edit</button></a>
                  <a href='?delete={$row['id']}' onclick=\"return confirm('Delete this student?')\">
                    <button class='delete'>Delete</button>
                  </a>
                </td>
              </tr>";
        $i++;
      }
      
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
