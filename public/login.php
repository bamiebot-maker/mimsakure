<?php
session_start();
include '../config/db.php';

// Check for signup message
$message = isset($_SESSION["signupmessage"]) ? $_SESSION["signupmessage"] : "";
if ($message) {
    unset($_SESSION["signupmessage"]);
}

// Check for login error message
$loginMessage = isset($_SESSION["loginMessage"]) ? $_SESSION["loginMessage"] : "";
if ($loginMessage) {
    unset($_SESSION["loginMessage"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT `id`, `username`, `password`, `role`, `email`, `status` FROM `users` WHERE `email` = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Check password (allow for plain text if old hash hasn't been migrated, but prefer password_verify)
            if (password_verify($password, $row['password']) || $password === $row['password']) {
                $_SESSION["email"] = $row["email"];
                $_SESSION["usertype"] = $row["role"];
                $_SESSION["user_id"] = $row["id"];
                
                // Redirect based on role securely
                if ($row["role"] === "admin") {
                    header("Location: ../admin/dashboard.php");
                } elseif ($row["role"] === "teacher") {
                    header("Location: ../teachers/dashboard.php");
                } elseif ($row["role"] === "student") {
                    header("Location: ../students/dashboard.php");
                }
                exit();
            } else {
                $_SESSION["loginMessage"] = "Invalid email or password!";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION["loginMessage"] = "Invalid email or password!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION["loginMessage"] = "Database error occurred.";
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MIMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-image: linear-gradient(135deg, #074C3E 0%, #158f76 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            margin: 0;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.6s ease;
        }
        .btn-theme {
            background-color: #074C3E;
            color: white;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-theme:hover {
            background-color: #05332a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(7, 76, 62, 0.3);
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(7, 76, 62, 0.15);
            border-color: #074C3E;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .logo-container {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #074C3E;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="glass-card">
        <div class="logo-container">
            <a href="../index.php">
                <img src="../asset/mims.png" alt="MIMS Logo">
            </a>
            <h2 class="mt-3 fw-bold" style="color: #074C3E;">Login to MIMS</h2>
            <p class="text-muted">Welcome back! Please enter your details.</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i> <?php echo htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($loginMessage): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-2"></i> <?php echo htmlspecialchars($loginMessage); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-theme w-100 mb-3">Login Securely</button>
            
            <div class="text-center mt-4">
                <p class="mb-0 text-muted">Don't have an account? <a href="signup.php" class="text-decoration-none fw-bold" style="color: #074C3E;">Sign up here</a></p>
                <a href="../index.php" class="text-decoration-none text-muted small mt-2 d-inline-block"><i class="bi bi-arrow-left"></i> Back to Home</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
