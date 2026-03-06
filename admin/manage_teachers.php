<?php

session_start();
include("../config/db.php");
$edit_mode = false;
$edit_data = ['id' => '', 'full_name' => '', 'username' => '', 'email' => '', 'password' => ''];

// Add new teacher
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_teacher'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $full_name = $_POST['full_name'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, email, password, role, full_name) 
          VALUES ('$name', '$email', '$password', 'teacher', '$full_name')";
  mysqli_query($conn, $sql);
}

// Update teacher
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_teacher'])) {
  $id = $_POST['edit_id'];
  $name = $_POST['username'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "UPDATE users SET username='$name', email='$email', password='$password', full_name='$full_name'
          WHERE id=$id AND role='teacher'";
  mysqli_query($conn, $sql);
}

// Delete
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  mysqli_query($conn, "DELETE FROM users WHERE id=$id AND role='teacher'");
}

// Prepare for editing
if (isset($_GET['edit'])) {
  $edit_mode = true;
  $id = intval($_GET['edit']);
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id AND role='teacher'");
  if ($row = mysqli_fetch_assoc($result)) {
    $edit_data = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Lecturers | MIMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: Arial, sans-serif;
      background-color: #e8f5e9;
      display: flex;
    }
    .sidebar {
      width: 220px;
      background-color: #070236ff;
      color: white;
      height: 100vh;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
    }
    .main {
      flex: 1;
      margin-left: 220px;
      padding: 80px 30px 30px;
    }
    h1 { color: #070236ff; margin-bottom: 20px; }
    button {
      background-color: #070236ff;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 8px 15px;
      cursor: pointer;
      margin-bottom: 15px;
    }
    button:hover { background-color: #070236ff; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #070236ff;
      color: #ecf3f3ff;
    }
    .actions button {
      margin-right: 5px;
      background-color: #070236ff;
      color: white;
      border-radius: 4px;
      padding: 6px 10px;
    }
    .actions .delete { background-color: #e53935; }
    form input {
      padding: 8px;
      margin-right: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
  </style>
</head>
<?php include("../admin/admin_nav.php"); ?>
<div class="main">
  <h2>Manage Teachers</h2>

  <form method="POST">
    <input type="hidden" name="edit_id" value="<?= htmlspecialchars($edit_data['id']) ?>">
    <input type="text" name="full_name" placeholder="Full Name" value="<?= htmlspecialchars($edit_data['full_name']) ?>" required>
    <input type="text" name="username" placeholder="Teacher username" value="<?= htmlspecialchars($edit_data['username']) ?>" required>

    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($edit_data['email']) ?>" required>
    <input type="text" name="password" placeholder="Password" value="<?= htmlspecialchars($edit_data['password']) ?>" required>
    <?php if ($edit_mode): ?>
      <button type="submit" name="update_teacher">Update Teacher</button>
      <a href="manage_teachers.php"><button type="button">Cancel</button></a>
    <?php else: ?>
      <button type="submit" name="add_teacher">Add Teacher</button>
    <?php endif; ?>
  </form>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Lecturers Name</th>
        <th>Userame</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $teacher = mysqli_query($conn, "SELECT * FROM users WHERE role='teacher' ORDER BY id DESC");
        $i = 1;
        while ($teach = mysqli_fetch_assoc($teacher)) {
          echo "<tr>
                  <td>$i</td>
                  <td>{$teach['full_name']}</td>
                  <td>{$teach['username']}</td>
                  <td>{$teach['email']}</td>
                  <td class='actions'>
                    <a href='?edit={$teach['id']}'><button>Edit</button></a>
                    <a href='?delete={$teach['id']}' onclick=\"return confirm('Delete this teacher?')\">
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
