<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    // Get data from the form
    $pairId = $_POST['Pair_ID'];
    $newParent1Id = $_POST['Parent1_ID'];
    $newParent2Id = $_POST['Parent2_ID'];
    $newStudentId = $_POST['Student_ID'];

    // Validate and sanitize input
    $pairId = mysqli_real_escape_string($conn, $pairId);
    $newParent1Id = mysqli_real_escape_string($conn, $newParent1Id);
    $newParent2Id = mysqli_real_escape_string($conn, $newParent2Id);
    $newStudentId = mysqli_real_escape_string($conn, $newStudentId);

    // Get the existing values from the database
    $selectQuery = "SELECT `Parent 1 ID`, `Parent 2 ID`, `Student ID` FROM `parent pairs` WHERE `Pair ID` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $pairId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingParent1Id, $existingParent2Id, $existingStudentId);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newParent1Id = empty($newParent1Id) ? $existingParent1Id : $newParent1Id;
    $newParent2Id = empty($newParent2Id) ? $existingParent2Id : $newParent2Id;
    $newStudentId = empty($newStudentId) ? $existingStudentId : $newStudentId;

    // Update family information in the database
    $updateQuery = "UPDATE `parent pairs` SET
        `Parent 1 ID` = ?,
        `Parent 2 ID` = ?,
        `Student ID` = ?
        WHERE `Pair ID` = ?";

    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "ssss", $newParent1Id, $newParent2Id, $newStudentId, $pairId);
        mysqli_stmt_execute($stmtUpdate);

        // Check if the update was successful
        if (mysqli_stmt_affected_rows($stmtUpdate) > 0) {
            echo "Update successful!";
        } else {
            echo "No records updated. Please check your Pair ID.";
        }

        mysqli_stmt_close($stmtUpdate);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
}
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
