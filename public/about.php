<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | MIMS</title>
    <!-- Bootstrap and Google Fonts will be included via header.php -->
</head>
<body class="bg-light">
    <?php include '../hedfoot/header.php'; ?>

    <section class="py-5 text-white" style="background: linear-gradient(rgba(7, 76, 62, 0.9), rgba(21, 143, 118, 0.9)), url('../asset/about-bg.jpg') center/cover;">
        <div class="container py-5 text-center">
            <h1 class="display-3 fw-bold mb-4">Our Mission & Vision</h1>
            <p class="lead mx-auto" style="max-width: 700px;">Streamlining educational processes and enhancing the learning experience through innovation and dedication.</p>
        </div>
    </section>

    <main class="container my-5">
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4" style="color: #074C3E;">Who We Are</h2>
                <p class="fs-5 text-muted">MIMS (MSSN Islamic Model School) is dedicated to providing a comprehensive platform that supports students, teachers, and administrators in managing academic tasks efficiently.</p>
                <p class="fs-5 text-muted">We believe in the power of technology to transform education and are committed to continuous improvement and innovation in the digital age.</p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg overflow-hidden rounded-4">
                    <img src="../asset/mims.png" class="card-img-top p-5 bg-white" alt="MIMS Logo" style="max-height: 350px; object-fit: contain;">
                </div>
            </div>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="display-4 text-primary mb-3"><i class="bi bi-lightbulb"></i></div>
                    <h4 class="fw-bold">Innovation</h4>
                    <p class="text-muted">Constantly evolving our tools to meet the modern needs of students and educators.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="display-4 text-success mb-3"><i class="bi bi-shield-check"></i></div>
                    <h4 class="fw-bold">Integrity</h4>
                    <p class="text-muted">Maintaining highest standards of academic excellence and data security.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="display-4 text-info mb-3"><i class="bi bi-people"></i></div>
                    <h4 class="fw-bold">Community</h4>
                    <p class="text-muted">Building a supportive environment for collaborative learning and growth.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include '../hedfoot/footer.php'; ?>
</body>
</html>
