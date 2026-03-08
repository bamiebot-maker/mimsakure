<?php
session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Simple validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['contact_error'] = "All fields are required.";
        header("Location: contact.php");
        exit();
    }

    // In a real application, you might save this to a database or send an email.
    // For now, we'll just simulate success.
    
    $_SESSION['contact_success'] = "Thank you for reaching out! Your message has been sent successfully.";
    header("Location: contact.php");
    exit();
} else {
    header("Location: contact.php");
    exit();
}
?>
