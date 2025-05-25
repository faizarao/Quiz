<?php
include 'config.php';  // Database connection

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert the new user into the database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #a8c0ff, #3f87a6);
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
        }

        /* Form Container Styling */
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            animation: slideIn 1s ease-out;
        }

        /* Form Heading */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            animation: fadeIn 1s ease-out;
        }

        /* Input Styling */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        /* Link Styling */
        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #45a049;
            text-decoration: underline;
        }

        /* Animations */
        @keyframes slideIn {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" name="submit">Register</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
