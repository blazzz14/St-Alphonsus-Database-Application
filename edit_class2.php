<?php
include 'dbconnect2.php'; // Connect to XAMPP
$ClassName = $_POST['class_name']; // Must match form

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newteacherId = $_POST['teacher_id'];
    $newTaId = $_POST['ta_id'];
    // Not including students for editing here, can be done in students table

    // Validate and sanitize input
    $ClassName = mysqli_real_escape_string($conn, $ClassName);
    $newteacherId = mysqli_real_escape_string($conn, $newteacherId);
    $newTaId = mysqli_real_escape_string($conn, $newTaId);

    // Get the existing values from the database
    $selectQuery = "SELECT `Teacher ID`, `TA ID` FROM class WHERE `Class Name` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $ClassName);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingTeacherId, $existingTaId);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newteacherId = empty($newteacherId) ? $existingTeacherId : $newteacherId;
    $newTaId = empty($newTaId) ? $existingTaId : $newTaId;

    // Update teacher's information in the database
    $updateQuery = "UPDATE class SET `Teacher ID` = ?, `TA ID` = ? WHERE `Class Name` = ?";
    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "sss", $newteacherId, $newTaId, $ClassName);
        mysqli_stmt_execute($stmtUpdate);

        // Check if the update was successful
        if (mysqli_stmt_affected_rows($stmtUpdate) > 0) {
            // View updated class information
            $viewQuery = "SELECT * FROM class WHERE `Class Name` = '$ClassName'";
            $viewResult = mysqli_query($conn, $viewQuery);

            //Use echo to render output in legible format
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

            if ($viewResult) {
                // Display class information in a table
                echo "<table>";
                while ($row = mysqli_fetch_assoc($viewResult)) {
                    echo "<tr><th>Class name</th><td>" . htmlspecialchars($row['Class Name']) . "</td></tr>";
                    echo "<tr><th>Teacher ID</th><td>" . htmlspecialchars($row['Teacher ID']) . "</td></tr>";
                    echo "<tr><th>Teaching Assistants ID</th><td>" . htmlspecialchars($row['TA ID']) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Error viewing updated teacher information: " . mysqli_error($conn);
            }

            echo "<hr><br><a href='stalphonsus_db.php'>Return to Database main page</a></body></html>";
        } else {
            echo "No records updated. Please check your Class Name.";
        }

        mysqli_stmt_close($stmtUpdate);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
}
?>
