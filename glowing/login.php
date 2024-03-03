<?php
require_once("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // You should perform proper validation and sanitation here

    // Check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Successful login
            echo '<script>';
            echo 'alert("Login successful!");';
            echo 'window.location.href = "index.html";'; // Redirect to index.html
            echo '</script>';
        } else {
            echo 'Invalid email or password.';
        }
    } else {
        echo 'Error: ' . mysqli_error($connection);
    }
}
?>
