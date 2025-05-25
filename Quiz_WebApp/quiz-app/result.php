<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include 'db.php';

// Calculate score
$score = 0;
foreach ($_POST as $key => $answer) {
    $question_id = substr($key, 1);
    $query = "SELECT * FROM questions WHERE id = $question_id";
    $result = mysqli_query($conn, $query);
    $question = mysqli_fetch_assoc($result);

    if ($question['correct_option'] == $answer) {
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f2f5;
            overflow: hidden;
        }

        .result-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            text-align: center;
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 30px;
            animation: slideIn 1.2s ease-in-out;
        }

        .score {
            font-size: 30px;
            color: #28a745;
            font-weight: bold;
            margin-bottom: 40px;
            animation: fadeInText 1s ease-in-out;
        }

        .back-btn {
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes slideIn {
            0% { transform: translateY(-20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="result-container">
        <h1>Quiz Completed!</h1>
        <div class="score">
            Your score is: <?php echo $score; ?>
        </div>
        <a href="index.html" class="back-btn">Back to Dashboard</a>
    </div>

</body>
</html>
