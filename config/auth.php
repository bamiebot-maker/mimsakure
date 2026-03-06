<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    $_SESSION['loginMessage'] = "Please log in to access this page.";
    header("Location: ../public/login.php");
    exit();
}

// Function to check relative paths for dashboards
function getDashboardPath($role) {
    switch ($role) {
        case 'admin':
            return '../admin/dashboard.php';
        case 'teacher':
            return '../teachers/dashboard.php';
        case 'student':
            return '../students/dashboard.php';
        default:
            return '../public/login.php';
    }
}
?>
