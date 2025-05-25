<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include 'db.php';

// Fetch quiz questions from the database
$query = "SELECT * FROM questions";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto; /* Ensure scrolling is possible */
        }

        .quiz-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            width: 600px;
            max-width: 90%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-out;
            box-sizing: border-box;
            max-height: 90vh; /* Make the container scrollable if content overflows */
            overflow-y: auto; /* Enables scrolling within the quiz container */
        }

        h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 40px;
            color: #333;
            animation: fadeInText 1s ease-in-out;
        }

        .question {
            margin-bottom: 25px;
            font-size: 18px;
            color: #333;
            animation: fadeInText 1.5s ease-in-out;
        }

        .options {
            margin-left: 20px;
        }

        .option {
            display: block;
            background-color: #f8f9fa;
            padding: 12px;
            margin: 8px 0;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            border: 1px solid #ccc;
            transition: background-color 0.3s, transform 0.3s;
        }

        .option:hover {
            background-color: #007bff;
            color: white;
            transform: scale(1.05);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="quiz-container">
        <h2>Cybersecurity Quiz</h2>

        <form method="POST" action="result.php">
            <?php while ($question = mysqli_fetch_assoc($result)): ?>
                <div class="question">
                    <p><?php echo $question['question']; ?></p>
                    <div class="options">
                        <input type="radio" name="q<?php echo $question['id']; ?>" value="1" id="q<?php echo $question['id']; ?>_1">
                        <label for="q<?php echo $question['id']; ?>_1" class="option"><?php echo $question['option1']; ?></label><br>

                        <input type="radio" name="q<?php echo $question['id']; ?>" value="2" id="q<?php echo $question['id']; ?>_2">
                        <label for="q<?php echo $question['id']; ?>_2" class="option"><?php echo $question['option2']; ?></label><br>

                        <input type="radio" name="q<?php echo $question['id']; ?>" value="3" id="q<?php echo $question['id']; ?>_3">
                        <label for="q<?php echo $question['id']; ?>_3" class="option"><?php echo $question['option3']; ?></label><br>

                        <input type="radio" name="q<?php echo $question['id']; ?>" value="4" id="q<?php echo $question['id']; ?>_4">
                        <label for="q<?php echo $question['id']; ?>_4" class="option"><?php echo $question['option4']; ?></label><br>
                    </div>
                </div>
            <?php endwhile; ?>

            <button type="submit" class="submit-btn">Submit Quiz</button>
        </form>
    </div>

</body>
</html>
