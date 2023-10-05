<?php
include("dbcon.php");
session_start();

if (!isset($_GET['technology'])) {
    header("Location: dashboard.php");
    exit();
}

$selectedTechnologyId = $_GET['technology'];

$sql = "SELECT id, question_text FROM questions WHERE technology_id = $selectedTechnologyId";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$questions = array();

while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
}

if (isset($_POST['save'])) {
    if (isset($_POST['answer'])) {
        $selectedOptionId = $_POST['answer'];

        $_SESSION['user_answers'][$_SESSION['current_question']] = $selectedOptionId;
    }
}

if (isset($_POST['previous'])) {

    if ($_SESSION['current_question'] > 0) {
        $_SESSION['current_question']--;
    }
}

if (isset($_POST['next'])) {

    if ($_SESSION['current_question'] < count($questions) - 1) {
        $_SESSION['current_question']++;
    }
}

if (isset($_POST['skip'])) {

    if ($_SESSION['current_question'] < count($questions) - 1) {
        $_SESSION['current_question']++;
    }
}


function calculateScore($userAnswers, $questions)
{
    $score = 0;

    foreach ($questions as $index => $question) {
        $correctOptionId = getCorrectOptionIdForQuestion($question['id']);
        if (isset($userAnswers[$index]) && $userAnswers[$index] == $correctOptionId) {
            $score++;
        }
    }

    return $score;
}

function getCorrectOptionIdForQuestion($questionId)
{

    global $conn;
    $sql = "SELECT id FROM options WHERE question_id = $questionId AND is_correct = 1";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    return $row['id'];
}

if (isset($_POST['complete_quiz'])) {

    $score = calculateScore($_SESSION['user_answers'], $questions);

    $_SESSION['quiz_score'] = $score;


    $userId = $_SESSION['user_id'];

    $sqlInsertResult = "INSERT INTO results (user_id, technology_id, score) VALUES ($userId, $selectedTechnologyId, $score)";

    if (mysqli_query($conn, $sqlInsertResult)) {

        header("Location: quiz_result.php");
        exit();
    } else {
        $errorLog = "Error inserting quiz result into the database: " . mysqli_error($conn);
        error_log($errorLog, 3, "error_log.txt");
        die("An error occurred. Please try again later.");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 45px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin: 10px;
        }

        label.question {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        label span.option {
            display: block;
            font-size: 18px;
            color: #333;
            padding: 10px 20px;
            border: 2px solid #0078d4;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }

        label span.option input:checked {
            background-color: #0078d4;
            color: #fff;
            border-color: #0078d4;
        }

        input[type="submit"],
        button {
            background-color: #0078d4;
            color: #fff;
            font-size: 20px;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0052a4;
        }

        button.edit-button {
            background-color: transparent;
            color: #0078d4;
            border: 2px solid #0078d4;
        }

        button.edit-button:hover {
            background-color: #0078d4;
            color: #fff;
        }

        input.save-button {
            background-color: #4caf50;
        }

        input.save-button:hover {
            background-color: #45a049;
        }

        input[name="complete_quiz"] {
            background-color: #f44336;
        }

        input[name="complete_quiz"]:hover {
            background-color: #d32f2f;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editButton = document.querySelector(".edit-button");
            const saveButton = document.querySelector(".save-button");
            const answerInputs = document.querySelectorAll('input[name="answer"]');


            editButton.addEventListener("click", function () {

                answerInputs.forEach(function (input) {
                    input.disabled = false;
                });


                saveButton.style.display = "inline-block";
            });
        });
    </script>
</head>

<body>
    <h1>Quiz</h1>
    <form action="quiz.php?technology=<?php echo $selectedTechnologyId; ?>" method="post">
        <?php

        if ($_SESSION['current_question'] < count($questions)) {
            $currentQuestion = $questions[$_SESSION['current_question']];
            ?>
            <p>Question
                <?php echo $_SESSION['current_question'] + 1; ?>:
            </p>
            <p>
                <?php echo $currentQuestion['question_text']; ?>
            </p>
            <?php

            $questionId = $currentQuestion['id'];
            $sql = "SELECT id, option_text FROM options WHERE question_id = $questionId";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Error: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $optionId = $row['id'];
                $optionText = $row['option_text'];
                $userAnswer = isset($_SESSION['user_answers'][$_SESSION['current_question']]) ? $_SESSION['user_answers'][$_SESSION['current_question']] : '';
                ?>
                <label>
                    <input type="radio" name="answer" value="<?php echo $optionId; ?>" <?php
                       if ($optionId == $userAnswer) {
                           echo 'checked';
                       }

                       echo 'disabled';
                       ?>>
                    <?php echo $optionText; ?>
                </label>
                <?php
            }
            ?>
            <br>
            <input type="submit" name="previous" value="Previous">
            <input type="submit" name="next" value="Next">
            <input type="submit" name="skip" value="Skip">
            <button class="edit-button" type="button">Edit Answer</button>
            <input type="submit" name="save" class="save-button" value="Save Answer" style="display: none;">
            <input type="submit" name="complete_quiz" value="Complete Quiz">
            <?php
        } else {

        }
        ?>
    </form>
</body>

</html>