<?php
session_start();

if(isset($_SESSION['user_id'])) {

    $_SESSION = array();

    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Quiz App</title>
    <style>
        body,
        h1,
        p,
        a {
            margin: 0;
            padding: 0;
        }

        body {
            background: #f9f9f9;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            color: #333;
        }

        header {
            background: #3498db;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            color: #fff;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            font-size: 16px;
            margin: 0 20px;
            padding: 10px 20px;
            border: 2px solid #3498db;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        a:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to the Quiz App</h1>
    </header>
    <p>Test your knowledge in HTML, CSS, and JavaScript.</p>
    <a href="user/register.php">Register</a>
    <a href="user/login.php">Login</a>
</body>

</html>