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

    // Insert contractor information into the database
    $insertQuery = "INSERT INTO `external contractors` (`Contractor ID`, `First Name`, `Last Name`, `Sector`)
                    VALUES ('$contractorId', '$newFirstName', '$newLastName', '$newSector')";

    $insertResult = mysqli_query($conn, $insertQuery);

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

    if ($insertResult) {
        // Display the inserted information in a table
        echo "<table>";
        echo "<tr><th>Contractor ID</th><td>" . htmlspecialchars($contractorId) . "</td></tr>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
        echo "<tr><th>Sector</th><td>" . htmlspecialchars($newSector) . "</td></tr>";
        echo "</table>";

        echo "Insert successful!";
    } else {
        echo "Error inserting contractor information: " . mysqli_error($conn);
    }

    echo "<hr><br><a href='stalphonsus_db.php'>Return to Database main page</a></body></html>";
}
?>
