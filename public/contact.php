<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | MIMS</title>
  <style>
     body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
        }
        main {
            padding: 20px;
            background-color: #f4f4f4;
        }
   

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    h1 {
      color: #024410ff;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #024410ff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #024410ff;
    }
  </style>
</head>
<body><?php include '../hedfoot/header.php'; ?>
<main>
  <div class="container">
    <h1>Contact Us</h1>
    <form action="contact_process.php" method="POST">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <input type="submit" value="Send Message">
    </form>
  </div>
  </main>
<?php include '../hedfoot/footer.php'; ?>
</body>
</html>
