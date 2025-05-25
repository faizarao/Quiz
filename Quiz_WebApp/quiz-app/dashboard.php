<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(45deg, #ff6a00, #ee0979);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard-container {
            background: rgba(0, 0, 0, 0.5);
            padding: 40px 50px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .dashboard-container:hover {
            transform: scale(1.05);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .welcome-message {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeIn 2s ease-in-out forwards;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
        }

        .dashboard-button {
            padding: 12px 30px;
            font-size: 18px;
            background-color: #ee0979;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #ff6a00;
            transform: scale(1.1);
        }

        .form-footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer a {
            color: #ee0979;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p class="welcome-message">You have successfully logged in. Choose an option below to continue.</p>
        
        <div class="button-container">
            <button class="dashboard-button" onclick="window.location.href='quiz.php'">Start Quiz</button>
            <button class="dashboard-button" onclick="window.location.href='logout.php'">Logout</button>
        </div>
        
        <div class="form-footer">
            <p>Need help? <a href="contact.php">Contact Support</a></p>
        </div>
    </div>

</body>
</html>
