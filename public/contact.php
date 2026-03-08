<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | MIMS</title>
</head>
<body class="bg-light">
    <?php include '../hedfoot/header.php'; ?>

    <main class="container my-5 pt-4">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm h-100">
                    <h2 class="display-6 fw-bold mb-4" style="color: #074C3E;">Get in Touch</h2>
                    <p class="text-muted mb-5">Have questions or need assistance? Our team is here to help you. Fill out the form or reach us via the details below.</p>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-geo-alt fs-4 text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Address</h5>
                            <p class="mb-0 text-muted">Akure, Ondo State, Nigeria</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-envelope fs-4 text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Email</h5>
                            <p class="mb-0 text-muted">info@mimsakure.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-telephone fs-4 text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold">Phone</h5>
                            <p class="mb-0 text-muted">+234 800 000 0000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-4">Send us a Message</h3>
                    <form action="contact_process.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="How can we help?" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us more about your inquiry..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-auth-filled w-100 py-3 mt-2">Send Message Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include '../hedfoot/footer.php'; ?>
</body>
</html>
