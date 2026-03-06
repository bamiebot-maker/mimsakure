<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
        header {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 15px 10%;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 22px;
            font-weight: bold;
        }

        .logo  img {
             width: 30px;
             margin-right: 10px;
             border-radius: 50%;
}

        /* Navigation */
        nav {
            display: flex;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }

        /* Hamburger Menu */
        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .close-menu {
            display: none;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            position: absolute;
            top: 15px;
            right: 10%;
        }

        /* Responsive Navigation */
        @media (max-width: 768px) {
            .nav {
                display: none;
                flex-direction: column;
                background: white;
                position: absolute;
                top: 60px;
                right: 10%;
                width: 200px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin-bottom: 15px;
            }

            .menu-toggle {
                display: block;
                margin-left: 220px;
            }
        }
/* Auth Buttons */
.auth-buttons {
    display: flex;
    gap: 10px;
}

.btn-light, .btn-dark {
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
}

.btn-light {
    background: transparent;
    border: 1px solidrgb(0, 0, 0);
    color: #070236ff;
}

.btn-dark {
    background: #070236ff;
    color: white;
    border: none;
}
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img id="logo" src="../asset/mims.png" alt="MSSN Logo">
            <span>MIMS</span>
            <button class="menu-toggle">☰</button>
            <button class="close-menu">✖</button>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../public/about.php">Mission</a></li>
                <li><a href="../public/about.php">About Us</a></li>
                <li><a href="../public/contact.php">Contact Us</a></li>
                <li><a href="../public/faq.php">FAQs</a></li>
            </ul>
            <div class="auth-buttons">
            <a href="../public/signup.php" class="btn-light">Sign Up</a>
            <a href="../public/login.php" class="btn-dark">Login</a>
        </div>
        </nav>
    </header>
    <script>
       // Hamburger Menu Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const closeMenu = document.querySelector('.close-menu');
        const nav = document.querySelector('nav');

        menuToggle.addEventListener('click', () => {
            nav.style.display = "flex";
            menuToggle.style.display = "none";
            closeMenu.style.display = "block";
        });

        closeMenu.addEventListener('click', () => {
            nav.style.display = "none";
            menuToggle.style.display = "block";
            closeMenu.style.display = "none";
        });

               // Close menu on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                nav.style.display = "flex";
                menuToggle.style.display = "none";
                closeMenu.style.display = "none";
            } else {
                nav.style.display = "none";
                menuToggle.style.display = "block";
            }
        });
    </script>
</body>
</html>