<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | MSSN Islamic Model School</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #070236;
      --primary-light: #0f0457;
      --accent: #4a6da7;
      --text-light: #ffffff;
      --text-dark: #333333;
      --bg-light: #f8f9fa;
      --card-bg: #ffffff;
      --shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: var(--bg-light);
      color: var(--text-dark);
      display: flex;
      min-height: 100vh;
    }

    /* Header Styles */
    .header {
      position: fixed;
      top: 0;
      left: 250px;
      right: 0;
      height: 70px;
      background-color: var(--primary);
      color: var(--text-light);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      z-index: 900;
      box-shadow: var(--shadow);
      transition: left 0.3s ease;
    }

    .header-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }

    .header h2 {
      font-size: 22px;
      font-weight: 500;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--accent);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }

    /* Sidebar Styles */
    .sidebar {
      width: 250px;
      background-color: var(--primary);
      color: var(--text-light);
      height: 100vh;
      padding: 25px 0;
      position: fixed;
      top: 0;
      left: 0;
      transition: transform 0.3s ease;
      z-index: 1000;
      display: flex;
      flex-direction: column;
    }

    .sidebar-header {
      text-align: center;
      padding: 0 20px 25px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 20px;
    }

    .sidebar-header h2 {
      font-size: 18px;
      margin-top: 10px;
      line-height: 1.4;
    }

    .nav-links {
      flex: 1;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 14px 25px;
      color: var(--text-light);
      text-decoration: none;
      transition: all 0.3s;
      border-left: 4px solid transparent;
    }

    .sidebar a i {
      margin-right: 15px;
      width: 20px;
      text-align: center;
      font-size: 18px;
    }

    .sidebar a:hover {
      background-color: var(--primary-light);
      border-left: 4px solid var(--accent);
    }

    .sidebar a.active {
      background-color: var(--primary-light);
      border-left: 4px solid var(--accent);
    }

    .logout-container {
      padding: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-top: auto;
    }

    .logout-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 12px;
      background-color: rgba(255, 255, 255, 0.1);
      color: var(--text-light);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 16px;
    }

    .logout-btn:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Main Content */
    .main {
      flex: 1;
      margin-left: 250px;
      padding: 90px 30px 30px;
      transition: margin-left 0.3s ease;
    }

    .page-title {
      color: var(--primary);
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 25px;
      margin-bottom: 40px;
    }

    .card {
      background: var(--card-bg);
      border-radius: 10px;
      padding: 25px;
      box-shadow: var(--shadow);
      text-align: center;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      font-size: 24px;
      background-color: rgba(74, 109, 167, 0.1);
      color: var(--accent);
    }

    .card h2 {
      margin: 0;
      color: var(--primary);
      font-size: 32px;
    }

    .card p {
      margin-top: 10px;
      font-weight: 600;
      color: var(--primary);
      font-size: 16px;
    }

    /* Mobile Menu Button */
    .menu-btn {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1100;
      background: var(--primary);
      color: white;
      border: none;
      font-size: 24px;
      width: 45px;
      height: 45px;
      border-radius: 5px;
      cursor: pointer;
      align-items: center;
      justify-content: center;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
      .cards {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        width: 270px;
      }

      .sidebar.active {
        transform: translateX(0);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      }

      .header {
        left: 0;
      }

      .main {
        margin-left: 0;
        padding: 80px 20px 20px;
      }

      .menu-btn {
        display: flex;
      }

      .cards {
        grid-template-columns: 1fr;
      }
    }

    /* Demo content for the dashboard */
    .welcome-message {
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      padding: 25px;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: var(--shadow);
    }

    .welcome-message h2 {
      margin-bottom: 10px;
    }

    .recent-activity {
      background: var(--card-bg);
      border-radius: 10px;
      padding: 25px;
      box-shadow: var(--shadow);
    }

    .recent-activity h3 {
      color: var(--primary);
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .activity-item {
      display: flex;
      align-items: center;
      padding: 15px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .activity-item:last-child {
      border-bottom: none;
    }

    .activity-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgba(74, 109, 167, 0.1);
      color: var(--accent);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      font-size: 16px;
    }

    .activity-content {
      flex: 1;
    }

    .activity-content p {
      margin: 0;
    }

    .activity-time {
      color: #777;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>

  <button class="menu-btn" id="menuBtn">
    <i class="fas fa-bars"></i>
  </button>

  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <div style="font-size: 32px; color: #fff;">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <h2>MSSN ISLAMIC<br>MODEL SCHOOL</h2>
    </div>

    <div class="nav-links">
      <a href="./dashboard.php" class="active">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
      </a>
      <a href="./manage_teachers.php">
        <i class="fas fa-chalkboard-teacher"></i>
        <span>Manage Teachers</span>
      </a>
      <a href="./manage_students.php">
        <i class="fas fa-user-graduate"></i>
        <span>Manage Students</span>
      </a>
      <a href="./settings.php">
        <i class="fas fa-cog"></i>
        <span>Settings</span>
      </a>
    </div>

    <div class="logout-container">
      <button class="logout-btn" onclick="window.location.href='../config/logout.php'">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </button>
    </div>
  </div>

  <div class="header">
    <div class="header-content">
      <h2>Admin Dash</h2>
      <div class="user-info">
        <div class="user-avatar">Bam</div>
        <span>Admin</span>
      </div>
    </div>
  </div>

  
  <script>
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("active");
    }

    document.getElementById("menuBtn").addEventListener("click", toggleSidebar);

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      const sidebar = document.getElementById('sidebar');
      const menuBtn = document.getElementById('menuBtn');
      
      if (window.innerWidth <= 768 && 
          sidebar.classList.contains('active') && 
          !sidebar.contains(event.target) && 
          event.target !== menuBtn && 
          !menuBtn.contains(event.target)) {
        toggleSidebar();
      }
    });

    // Set active navigation link based on current page
    document.addEventListener('DOMContentLoaded', function() {
      const currentPage = window.location.pathname.split('/').pop();
      const navLinks = document.querySelectorAll('.nav-links a');
      
      navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    });
  </script>
</body>
</html>