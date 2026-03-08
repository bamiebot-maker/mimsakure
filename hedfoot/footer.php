<!-- MIMS<?php
// Handle path depth
$current_dir = dirname($_SERVER['PHP_SELF']);
$is_in_public = str_contains($current_dir, '/public');
$base_path = $is_in_public ? '../' : './';
?>
<!-- Footer Area Start -->
<footer class="footer py-5 mt-auto" style="background-color: #f8f9fa; border-top: 1px solid #eee;">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer__logo mb-4">
                    <a href="<?php echo $base_path; ?>index.php" class="text-decoration-none d-flex align-items-center">
                        <img src="<?php echo $base_path; ?>asset/mims.png" alt="Logo" style="width: 45px; height: 45px; border-radius: 50%;">
                        <span class="ms-2 fw-bold fs-4" style="color: #074C3E;">MIMS</span>
                    </a>
                </div>
                <p class="text-muted pe-lg-5">Empowering future leaders through quality Islamic and Western education. Nurturing students morally, academically, and spiritually.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="text-success fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-success fs-5"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-success fs-5"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-bold mb-4" style="color: #074C3E;">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?php echo $base_path; ?>index.php" class="text-muted text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="<?php echo $base_path; ?>public/about.php" class="text-muted text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="<?php echo $base_path; ?>public/contact.php" class="text-muted text-decoration-none">Contact</a></li>
                    <li class="mb-2"><a href="<?php echo $base_path; ?>public/faq.php" class="text-muted text-decoration-none">FAQs</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-4" style="color: #074C3E;">Contact Info</h5>
                <ul class="list-unstyled text-muted">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-geo-alt me-2 text-success"></i>
                        Akure, Ondo State, Nigeria
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone me-2 text-success"></i>
                        +234 800 000 0000
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-envelope me-2 text-success"></i>
                        info@mimsakure.com
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-4" style="color: #074C3E;">Newsletter</h5>
                <p class="text-muted mb-3">Subscribe to get our latest updates.</p>
                <form class="input-group">
                    <input type="email" class="form-control" placeholder="Email Address">
                    <button class="btn btn-auth-filled" type="button"><i class="bi bi-send"></i></button>
                </form>
            </div>
        </div>
        <hr class="my-5 text-muted opacity-25">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted small">&copy; <?php echo date('Y'); ?> MSSN Islamic Model School. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <ul class="list-inline mb-0 small">
                    <li class="list-inline-item"><a href="#" class="text-muted text-decoration-none">Privacy Policy</a></li>
                    <li class="list-inline-item ms-3"><a href="#" class="text-muted text-decoration-none">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- scroll to top -->
<a href="#" class="scrollToTop btn btn-success rounded-circle shadow-sm" style="display: none; position: fixed; bottom: 30px; right: 30px; width: 45px; height: 45px; z-index: 999;">
    <i class="bi bi-chevron-double-up"></i>
</a>

<!-- bootstrap five js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener('scroll', function() {
        var scroll = document.querySelector('.scrollToTop');
        if (window.scrollY > 300) {
            scroll.style.display = "flex";
            scroll.style.alignItems = "center";
            scroll.style.justifyContent = "center";
        } else {
            scroll.style.display = "none";
        }
    });

    document.querySelector('.scrollToTop')?.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>