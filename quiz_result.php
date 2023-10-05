<?php
session_start();

if (!isset($_SESSION['quiz_score'])) {
    header("Location: quiz.php");
    exit();
}

$score = $_SESSION['quiz_score'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Quiz Result</title>
    <style>
        body,
        h1,
        p,
        a {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 220px;
        }

        .result-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            max-width: 400px;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 24px;
            color: #555;
            margin-bottom: 20px;
        }

        a {
            background-color: #0078d4;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        a:hover {
            background-color: #0052a4;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <h1>Quiz Result</h1>
        <p>Your Score:
            <?php echo $score; ?>/5
        </p>

        <a href="user/dashboard.php">Start a New Quiz</a>
    </div>
</body>

</html>