<?php

session_start();



include '../config/db.php';

$teacherCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role = 'teacher'"));
$studentCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role = 'student'"));
$adminCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role = 'admin'"));


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | MIMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
</head>
<?php 
  include("../admin/admin_nav.php");
  include("../config/greet.php");
  ?>
  <div class="main">
   
   
    <div class="main">
    <h1 class="page-title">Dashboard Overview</h1>
    
    <div class="welcome-message">
       <?php
      echo "<h2 style='color: #e3e2ebff; padding: 20px;'>" . htmlspecialchars($tim) . " Admin!</h2>";
        ?>
      <p>Here's what's happening in your school today.</p>
    </div>

    <div class="cards">
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-user-graduate"></i>
        </div>
        <h2>450</h2>
        <p>Total Students</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <h2>35</h2>
        <p>Total Teachers</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-book"></i>
        </div>
        <h2>18</h2>
        <p>Classes</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-clipboard-check"></i>
        </div>
        <h2>92%</h2>
        <p>Attendance</p>
      </div>
    </div>

    <div class="recent-activity">
      <h3>Recent Activity</h3>
      <div class="activity-item">
        <div class="activity-icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <div class="activity-content">
          <p>New student registered - Ibrahim Sobur Bamidele</p>
          <div class="activity-time">Today, 10:30 AM</div>
        </div>
      </div>
      <div class="activity-item">
        <div class="activity-icon">
          <i class="fas fa-edit"></i>
        </div>
        <div class="activity-content">
          <p>Grades updated for Mathematics - SS2</p>
          <div class="activity-time">Yesterday, 3:45 PM</div>
        </div>
      </div>
      <div class="activity-item">
        <div class="activity-icon">
          <i class="fas fa-chalkboard"></i>
        </div>
        <div class="activity-content">
          <p>New teacher assigned to SS3 Science</p>
          <div class="activity-time">October 12, 2023</div>
        </div>
      </div>
    </div>
  </div>


  

</body>
</html>
