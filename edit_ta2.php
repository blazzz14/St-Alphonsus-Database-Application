<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $teach_assistId = $_POST['ta_id']; // Match name attribute in form
    $teacherId = $_POST['teacher_id'];
    $newClassId = $_POST['class_id'];
    $newFirstName = $_POST['first_name'];
    $newLastName = $_POST['last_name'];
    $newAddress = $_POST['address'];
    $newPhoneNumber = $_POST['phone_number'];
    $newAnnualSalary = $_POST['annual_salary'];
    $newBackgroundCheck = $_POST['background_check'];

    // Validate and sanitize input
    $teach_assistId = mysqli_real_escape_string($conn, $teach_assistId);
    $teacherId = mysqli_real_escape_string($conn, $teacherId);
    $newClassId = mysqli_real_escape_string($conn, $newClassId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newAddress = mysqli_real_escape_string($conn, $newAddress);
    $newPhoneNumber = mysqli_real_escape_string($conn, $newPhoneNumber);
    $newAnnualSalary = mysqli_real_escape_string($conn, $newAnnualSalary);
    $newBackgroundCheck = mysqli_real_escape_string($conn, $newBackgroundCheck);

    // Get the existing values from the database
    $selectQuery = "SELECT `Teacher ID`, `Class ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Annual salary`, `Background check` FROM `teaching assistants` WHERE `TA ID` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $teach_assistId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingTeacherId, $existingClassId, $existingFirstName, $existingLastName, $existingAddress, $existingPhoneNumber, $existingAnnualSalary, $existingBackgroundCheck);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newTeacherId = empty($teacherId) ? $existingTeacherId : $teacherId;
    $newClassId = empty($newClassId) ? $existingClassId : $newClassId;
    $newFirstName = empty($newFirstName) ? $existingFirstName : $newFirstName;
    $newLastName = empty($newLastName) ? $existingLastName : $newLastName;
    $newAddress = empty($newAddress) ? $existingAddress : $newAddress;
    $newPhoneNumber = empty($newPhoneNumber) ? $existingPhoneNumber : $newPhoneNumber;
    $newAnnualSalary = empty($newAnnualSalary) ? $existingAnnualSalary : $newAnnualSalary;
    $newBackgroundCheck = empty($newBackgroundCheck) ? $existingBackgroundCheck : $newBackgroundCheck;

    // Update teaching assistant's information in the database
    $updateQuery = "UPDATE `teaching assistants` SET
        `Teacher ID` = ?,
        `Class ID` = ?,
        `First Name` = ?,
        `Last Name` = ?,
        `Address` = ?,
        `Phone number` = ?,
        `Annual salary` = ?,
        `Background check` = ?
        WHERE `TA ID` = ?";

    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "sssssssss", $newTeacherId, $newClassId, $newFirstName, $newLastName, $newAddress, $newPhoneNumber, $newAnnualSalary, $newBackgroundCheck, $teach_assistId);
        mysqli_stmt_execute($stmtUpdate);

        // Check if the update was successful
        if (mysqli_stmt_affected_rows($stmtUpdate) > 0) {
            // Display teaching assistant information in a table
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
            echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($newTeacherId) . "</td></tr>";
            echo "<tr><th>Class ID</th><td>" . htmlspecialchars($newClassId) . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
            echo "<tr><th>Address</th><td>" . htmlspecialchars($newAddress) . "</td></tr>";
            echo "<tr><th>Phone number</th><td>" . htmlspecialchars($newPhoneNumber) . "</td></tr>";
            echo "<tr><th>Annual salary</th><td>" . htmlspecialchars($newAnnualSalary) . "</td></tr>";
            echo "<tr><th>Background check</th><td>" . htmlspecialchars($newBackgroundCheck) . "</td></tr>";
            echo "</table>";

            echo "</body></html>";

            echo "Update successful!";
        } else {
            echo "No records updated. Please check your TA ID.";
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
