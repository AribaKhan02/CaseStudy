



<?php


// Assuming you have a database connection established
require_once("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];

    // You should perform proper validation and sanitation here

    // Check if the email is already registered
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            echo "Email already registered.";
        } else {
            // Insert the new user
            $insertQuery = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $insertResult = mysqli_query($connection, $insertQuery);

            if ($insertResult) {
            
                echo '<script>';
                echo 'alert("Registration successful!");';
                echo 'window.location.href = "login.html";'; // Redirect to index.html
                echo '</script>';
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

