<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $contractorId = $_POST['Contractor_ID'];
    $newFirstName = $_POST['first_name'];
    $newLastName = $_POST['last_name'];
    $newSector = $_POST['Sector'];

    // Validate and sanitize input
    $contractorId = mysqli_real_escape_string($conn, $contractorId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newSector = mysqli_real_escape_string($conn, $newSector);

    // Get the existing values from the database
    $selectQuery = "SELECT `First Name`, `Last Name`, `Sector` FROM `external contractors` WHERE `Contractor ID` = ?";
    $stmtSelect = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmtSelect, "s", $contractorId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $existingFirstName, $existingLastName, $existingSector);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Use existing values if corresponding $_POST values are empty
    $newFirstName = empty($newFirstName) ? $existingFirstName : $newFirstName;
    $newLastName = empty($newLastName) ? $existingLastName : $newLastName;
    $newSector = empty($newSector) ? $existingSector : $newSector;

    // Update contractor's information in the database
    $updateQuery = "UPDATE `external contractors` SET
        `First Name` = ?,
        `Last Name` = ?,
        `Sector` = ?
        WHERE `Contractor ID` = ?";

    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "ssss", $newFirstName, $newLastName, $newSector, $contractorId);
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
            echo "<tr><th>Contractor ID</th><td>" . htmlspecialchars($contractorId) . "</td></tr>";
            echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
            echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
            echo "<tr><th>Sector</th><td>" . htmlspecialchars($newSector) . "</td></tr>";
            echo "</table>";

            echo "Update successful!";
            echo "<hr><br><a href='stalphonsus_db.php'>Return to Database main page</a></body></html>";
        } else {
            echo "No records updated. Please check your Contractor ID.";
        }

        mysqli_stmt_close($stmtUpdate);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
}
?>
