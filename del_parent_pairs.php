<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Pair ID from the form
    $pairId = $_POST['Pair_ID'];

    // Validate and sanitize input
    $pairId = mysqli_real_escape_string($conn, $pairId);

    // Perform deletion
    $deleteQuery = "DELETE FROM `parent pairs` WHERE `Pair ID` = '$pairId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Parent pair deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the Pair ID.";
        }
    } else {
        echo "Error deleting parent pair: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
