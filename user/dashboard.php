
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
    <style>
        body, h2, p, ul, li, a {
            margin: 0;
            padding: 0;
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
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        ul li a {
            text-decoration: none;
            background-color: #0078d4;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            display: inline-block;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #0078d4;
            margin: 5px;
        }

        ul li a:hover {
            background-color: #0052a4;
        }

        a.logout {
            text-decoration: none;
            background-color: #f00; 
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a.logout:hover {
            background-color: #ff5555; 
        }
        .content-container {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 500px;
        margin: 110px;
        display: inline-block;
    }
    </style>
</head>

<body>
<div class="content-container">
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

    <p>Select a technology to start the quiz:</p>
    <ul>
        <li><a href="../quiz.php?technology=1">HTML</a></li>
        <li><a href="../quiz.php?technology=2">CSS</a></li>
        <li><a href="../quiz.php?technology=3">JavaScript</a></li>
    </ul>
    <a href="logout.php" class="logout">Logout</a>
    </div>
</body>

</html>
