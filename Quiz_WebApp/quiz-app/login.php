<?php
session_start();
include 'config.php';  // Database connection

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    // SQL query to fetch user data
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Check if the query returns any results
    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);
        
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variable for logged in user
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");  // Redirect to the dashboard
            exit();
        } else {
            echo "Invalid login credentials!";  // Incorrect password
        }
    } else {
        echo "Invalid login credentials!";  // Username not found
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: scale(1.05);
        }

        h2 {
            color: #2575fc;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border-color: #2575fc;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #2575fc;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #6a11cb;
        }

        .form-footer {
            margin-top: 15px;
            font-size: 14px;
        }

        .form-footer a {
            color: #2575fc;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <input type="text" name="username" class="input-field" id="username" placeholder="Username" required>
            <input type="password" name="password" class="input-field" id="password" placeholder="Password" required>
            <button type="submit" name="submit" class="submit-btn">Login</button>
        </form>
        <div class="form-footer">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>
