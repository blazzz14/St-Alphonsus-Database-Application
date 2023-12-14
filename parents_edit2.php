<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $guardianId = $_POST['Guardian_ID'];
    $newFirstName = $_POST['First_Name'];
    $newLastName = $_POST['Last_Name'];
    $newAddress = $_POST['Address'];
    $newPhoneNumber = $_POST['Phone_number'];
    $newStudentId = $_POST['Student_ID'];

    // Validate and sanitize input
    $guardianId = mysqli_real_escape_string($conn, $guardianId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newAddress = mysqli_real_escape_string($conn, $newAddress);
    $newPhoneNumber = mysqli_real_escape_string($conn, $newPhoneNumber);
    $newStudentId = mysqli_real_escape_string($conn, $newStudentId);

    // Get the existing values from the database
    $selectQuery = "SELECT `Guardian ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Student ID` FROM `parents` WHERE `Guardian ID` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $guardianId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingGuardianId, $existingFirstName, $existingLastName, $existingAddress, $existingPhoneNumber, $existingStudentId);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newFirstName = empty($newFirstName) ? $existingFirstName : $newFirstName;
    $newLastName = empty($newLastName) ? $existingLastName : $newLastName;
    $newAddress = empty($newAddress) ? $existingAddress : $newAddress;
    $newPhoneNumber = empty($newPhoneNumber) ? $existingPhoneNumber : $newPhoneNumber;
    $newStudentId = empty($newStudentId) ? $existingStudentId : $newStudentId;

    // Update parent's information in the database
    $updateQuery = "UPDATE `parents` SET
        `First Name` = ?,
        `Last Name` = ?,
        `Address` = ?,
        `Phone number` = ?,
        `Student ID` = ?
        WHERE `Guardian ID` = ?";

    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "ssssss", $newFirstName, $newLastName, $newAddress, $newPhoneNumber, $newStudentId, $guardianId);
        mysqli_stmt_execute($stmtUpdate);

        // Check if the update was successful
        if (mysqli_stmt_affected_rows($stmtUpdate) > 0) {
            // Display the updated information in a table
            echo "<html><head><style>
                    table {
                        font-family: Arial, sans-serif;
                        border-collapse: collapse;
                        width: 50%;
                    }

                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                </style></head><body>";

            echo "<table>";
            echo "<tr><th>Guardian ID</th><td>" . htmlspecialchars($guardianId) . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
            echo "<tr><th>Address</th><td>" . htmlspecialchars($newAddress) . "</td></tr>";
            echo "<tr><th>Phone number</th><td>" . htmlspecialchars($newPhoneNumber) . "</td></tr>";
            echo "<tr><th>Student ID</th><td>" . htmlspecialchars($newStudentId) . "</td></tr>";
            echo "</table>";

            echo "Update successful!";
        } else {
            echo "No records updated. Please check your Guardian ID.";
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
