<?php
include 'dbconnect2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the credentials exist in the database
    $sql = "SELECT * FROM `sign in` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Start the session (if not already started)
        session_start();

        // Store user information in the session (you can store more info if needed)
        $_SESSION['email'] = $email;

        //Upon Successful login, redirect to stalphonsus_db.php
        header("Location: stalphonsus_db.php");
        exit();
    } else {
        // Invalid credentials, you can display an error message or redirect to a login page
        echo "Invalid login credentials.";
    }
}
?>

