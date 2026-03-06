<?php 
include'../config/db.php'
?>
0912
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Results</title>
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
            padding: 50px;
            background-color: #f4f4f4;
           margin: 50px 50px;
        }
        form input{
            width:100%;
            height: 40px;
            margin: 10px 10px 10px 10px;
            padding: 20px;
        }

    </style>
</head>
<body>
    <?php include '../teachers/teacher_nav.php';?>
    <main>
    <h2>Enter Result</h2>
    <form action="enter.php" method="post">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <input type="number" name="score" placeholder="Score" required>
        <input type="text" name="term" placeholder="Term" required>
        <input type="number" name="year" placeholder="Year" required>
        <input type="submit" name="compute" placeholder="Enter result">

    </form>

    </main>
</body>
</html>
<?php 

?>