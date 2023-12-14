<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $studentId = $_POST['student_id'];
    $newFirstName = $_POST['first_name'];
    $newLastName = $_POST['last_name'];
    $newTeacherId = $_POST['teacher_id'];
    $newTaId = $_POST['ta_id'];
    $newClassName = $_POST['class_name'];
    $newParentId = $_POST['parent_id'];

    // Validate and sanitize input
    $studentId = mysqli_real_escape_string($conn, $studentId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newTeacherId = mysqli_real_escape_string($conn, $newTeacherId);
    $newTaId = mysqli_real_escape_string($conn, $newTaId);
    $newClassName = mysqli_real_escape_string($conn, $newClassName);
    $newParentId = mysqli_real_escape_string($conn, $newParentId);

    // Get the existing values from the database
    $selectQuery = "SELECT `Student ID`, `First Name`, `Last Name`, `Teacher ID`, `TA ID`, `Class name`, `Parent Pair ID` FROM `students` WHERE `Student ID` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $studentId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingStudentId, $existingFirstName, $existingLastName, $existingTeacherId, $existingTaId, $existingClassName, $existingParentPairId);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newFirstName = empty($newFirstName) ? $existingFirstName : $newFirstName;
    $newLastName = empty($newLastName) ? $existingLastName : $newLastName;
    $newTeacherId = empty($newTeacherId) ? $existingTeacherId : $newTeacherId;
    $newTaId = empty($newTaId) ? $existingTaId : $newTaId;
    $newClassName = empty($newClassName) ? $existingClassName : $newClassName;
    $newParentId = empty($newParentId) ? $existingParentPairId : $newParentId;

    // Update student's information in the database
    $updateQuery = "UPDATE `students` SET
        `First Name` = ?,
        `Last Name` = ?,
        `Teacher ID` = ?,
        `TA ID` = ?,
        `Class name` = ?,
        `Parent Pair ID` = ?
        WHERE `Student ID` = ?";

    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "sssssss", $newFirstName, $newLastName, $newTeacherId, $newTaId, $newClassName, $newParentId, $studentId);
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
            echo "<tr><th>Student ID</th><td>" . htmlspecialchars($studentId) . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
            echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($newTeacherId) . "</td></tr>";
            echo "<tr><th>TA ID</th><td>" . htmlspecialchars($newTaId) . "</td></tr>";
            echo "<tr><th>Class Name</th><td>" . htmlspecialchars($newClassName) . "</td></tr>";
            echo "<tr><th>Parent Pair ID</th><td>" . htmlspecialchars($newParentId) . "</td></tr>";
            echo "</table>";

            echo "Update successful!";
        } else {
            echo "No records updated. Please check your Student ID.";
        }

        mysqli_stmt_close($stmtUpdate);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }

    echo "</body></html>";
}
?>
<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
