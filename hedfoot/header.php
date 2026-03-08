<?php
if (!isset($_SESSION)) {
    session_start();
}
$is_logged_in = isset($_SESSION['user_id']);
$user_role = $_SESSION['role'] ?? '';

// Handle path depth
$current_dir = dirname($_SERVER['PHP_SELF']);
$is_in_public = str_contains($current_dir, '/public');
$base_path = $is_in_public ? '../' : './';
?>
<!-- MIMS Header Partial -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    :root {
        --primary-green: #074C3E;
        --secondary-green: #158f76;
    }
    .main-header {
        background: #ffffff;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        padding: 10px 0;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .navbar-brand img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid var(--primary-green);
    }
    .nav-link {
        font-weight: 500;
        color: #333 !important;
        transition: color 0.3s;
    }
    .nav-link:hover {
        color: var(--primary-green) !important;
    }
    .btn-auth-outline {
        border: 1px solid var(--primary-green);
        color: var(--primary-green);
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 20px;
        transition: all 0.3s;
    }
    .btn-auth-outline:hover {
        background: var(--primary-green);
        color: white;
    }
    .btn-auth-filled {
        background: var(--primary-green);
        color: white;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 20px;
        transition: all 0.3s;
    }
    .btn-auth-filled:hover {
        background: #05332a;
        color: white;
        box-shadow: 0 4px 12px rgba(7, 76, 62, 0.2);
    }
</style>

<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $base_path; ?>index.php">
            <img src="<?php echo $base_path; ?>asset/mims.png" alt="MIMS Logo" class="me-2">
            <span class="fw-bold fs-4" style="color: var(--primary-green);">MIMS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo $base_path; ?>index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo $base_path; ?>public/about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo $base_path; ?>public/contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="<?php echo $base_path; ?>public/faq.php">FAQs</a></li>
            </ul>
            <div class="d-flex gap-2 mt-3 mt-lg-0">
                <?php if ($is_logged_in): ?>
                    <?php 
                        $dashboard_path = $base_path . ($user_role == 'admin' ? 'admin' : ($user_role == 'teacher' ? 'teachers' : 'students')) . '/dashboard.php';
                    ?>
                    <a href="<?php echo $dashboard_path; ?>" class="btn btn-auth-outline text-decoration-none">Dashboard</a>
                    <a href="<?php echo $base_path; ?>config/logout.php" class="btn btn-auth-filled text-decoration-none">Logout</a>
                <?php else: ?>
                    <a href="<?php echo $base_path; ?>public/login.php" class="btn btn-auth-outline text-decoration-none">Login</a>
                    <a href="<?php echo $base_path; ?>public/signup.php" class="btn btn-auth-filled text-decoration-none">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>