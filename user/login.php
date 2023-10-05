<?php
session_start();

if(isset($_SESSION['user_id'])) {

    $_SESSION = array();

    session_destroy();
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <style>
        body,
        h2,
        form,
        label,
        input {
            margin: 0;
            padding: 0;
            text-align: left;
        }

        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        hr {
            color: #0078d4;
            margin-bottom: 40px;
        }

        form {
            margin-top: 100px !important;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px #888;
        }

        label {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #0078d4;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0052a4;
        }
    </style>
</head>

<body>
    <form method="post" action="login_process.php">
        <h2>Login</h2>
        <hr>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>