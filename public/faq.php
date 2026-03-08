<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions | MIMS</title>
</head>
<body class="bg-light">
    <?php include '../hedfoot/header.php'; ?>

    <main class="container my-5 pt-4">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold" style="color: #074C3E;">Frequently Asked Questions</h1>
            <p class="text-muted fs-5">Find answers to common questions about MSSN Islamic Model School.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden" id="faqAccordion">
                    
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold py-4 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What is MIMS?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 text-muted fs-6">
                                MIMS stands for MSSN Islamic Model School (MIMS Akure). It is a comprehensive school management system designed to manage and facilitate educational processes, connecting students, teachers, and administrators seamlessly.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How can I reset my password?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 text-muted fs-6">
                                You can reset your password by clicking on the "Forgot Password" link on the login page. Follow the instructions sent to your registered email address to create a new secure password.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Who can I contact for support?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 text-muted fs-6">
                                You can contact our support team at <a href="mailto:support@mims.com" class="text-success text-decoration-none fw-bold">support@mims.com</a> or visit our <a href="contact.php" class="text-success text-decoration-none fw-bold">Contact Us</a> page to send a direct message. Our team is available Monday to Friday, 8:00 AM - 4:00 PM.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-4 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Is my data secure on MIMS?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body py-4 text-muted fs-6">
                                Yes, we take data security very seriously. We use advanced encryption and secure authentication protocols to ensure that all student, teacher, and administrative records are protected at all times.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php include '../hedfoot/footer.php'; ?>
</body>
</html>
