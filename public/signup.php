<?php
session_start();
$message = isset($_SESSION["signupmessage"]) ? $_SESSION["signupmessage"] : "";
if ($message) {
    unset($_SESSION["signupmessage"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | MIMS</title>
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

<div class="container d-flex justify-content-center py-5">
    <div class="glass-card">
        <div class="logo-container">
            <a href="../index.php">
                <img src="../asset/mims.png" alt="MIMS Logo">
            </a>
            <h2 class="mt-3 fw-bold" style="color: #074C3E;">Create Account</h2>
            <p class="text-muted">Join the MIMS community today.</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i> <?php echo htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="signup_process.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>
            </div>

            <div class="mb-3">
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
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a secure password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-theme w-100 mb-3">Sign Up Securely</button>
            
            <div class="text-center mt-4">
                <p class="mb-0 text-muted">Already have an account? <a href="login.php" class="text-decoration-none fw-bold" style="color: #074C3E;">Login here</a></p>
                <a href="../index.php" class="text-decoration-none text-muted small mt-2 d-inline-block"><i class="bi bi-arrow-left"></i> Back to Home</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
