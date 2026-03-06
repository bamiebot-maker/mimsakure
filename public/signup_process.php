<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $role = 'student'; // Default role for users signing up from the public page
    
    // Simple validation
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION["signupmessage"] = "All fields are required!";
        header("Location: signup.php");
        exit();
    }

    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if ($check_stmt) {
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $_SESSION["signupmessage"] = "Email is already registered!";
            header("Location: signup.php");
            exit();
        }
        $check_stmt->close();
    } else {
        $_SESSION["signupmessage"] = "Database error during validation.";
        header("Location: signup.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    if ($insert_stmt) {
        // Using $name as username. Adjust if schema prefers split names.
        $insert_stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
        
        if ($insert_stmt->execute()) {
            $_SESSION["signupmessage"] = "Account created successfully! You can now log in.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION["signupmessage"] = "Failed to create account. Please try again.";
            header("Location: signup.php");
            exit();
        }
        $insert_stmt->close();
    } else {
        $_SESSION["signupmessage"] = "Database error during registration.";
        header("Location: signup.php");
        exit();
    }
} else {
    header("Location: signup.php");
    exit();
}
?>
