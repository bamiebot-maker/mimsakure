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
        <a class="navbar-brand d-flex align-items-center" href="../index.php">
            <img src="../asset/mims.png" alt="MIMS Logo" class="me-2">
            <span class="fw-bold fs-4" style="color: var(--primary-green);">MIMS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link px-3" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="../public/about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="../public/contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="../public/faq.php">FAQs</a></li>
            </ul>
            <div class="d-flex gap-2 mt-3 mt-lg-0">
                <a href="../public/login.php" class="btn btn-auth-outline text-decoration-none">Login</a>
                <a href="../public/signup.php" class="btn btn-auth-filled text-decoration-none">Sign Up</a>
            </div>
        </div>
    </nav>
</header>