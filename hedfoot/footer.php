<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <style>
        /* Footer */
footer {
    display: grid;
    grid-template-columns: 1fr;
    background: #024410ff;
    padding: 20px;
    margin: 0;
    height: 150px;
    width: 100%;
    text-align: center;
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr;
    text-align: center;
}

.footer-content .footer-logo {
    display: flex;
    position: relative;
    margin: auto auto;
}

.footer-logo {
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: bold;
}

.footer-logo img {
    width: 30px;
    margin-right: 10px;
    border-radius: 50%;
}

 .footer-content span {
    color: white;
}

.footer-content .newsletter {
    margin: auto;
    width: 300px;
    display: flex;
    align-items: center;
}

.newsletter input {
    padding: 10px;
    width: 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.newsletter button {
    cursor: pointer;
    background: #000000;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    margin-left: 5px;
}
.newsletter button:hover {
    background-color: #024410ff;
}


.footer-content .newsletter input {
    width: 200px;
    height: 35px;
}

.footer-nav {
    margin: auto 0px;
    margin-top: 10px;
    color: white;
    align-items: center;
}

.footer-nav a {
    margin: 0 10px;
    color: #fcf9f9;
    text-decoration: none;
    font-size: 16px;
}

    </style>
</head>
<body>
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img id="logo" src="../asset/mims.png " alt="MSSN Logo">
                <span>MIMS</span>
            </div>
            <div class="newsletter">
                <input type="email" placeholder="Input your email">
                <button>Subscribe</button>
            </div>
        </div>
        <nav class="footer-nav">
            <a href="../public/about.php">About Us</a>
            <a href="../public/contact.php">Contact Us</a>
            <a href="../public/faq.php">FAQs</a>
        </nav>
    </footer>
</body>
</html>