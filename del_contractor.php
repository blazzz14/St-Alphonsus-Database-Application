<?php
include 'dbconnect2.php'; // Connect to XAMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Contractor ID from the form
    $contractorId = $_POST['Contractor_ID'];

    // Validate and sanitize input
    $contractorId = mysqli_real_escape_string($conn, $contractorId);

    // Perform deletion
    $deleteQuery = "DELETE FROM `external contractors` WHERE `Contractor ID` = '$contractorId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($conn);

        if ($affectedRows > 0) {
            echo "Contractor deleted successfully!";
        } else {
            echo "No matching record found for deletion. Please check the Contractor ID.";
        }
    } else {
        echo "Error deleting contractor: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>

