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

    // Validate and sanitize input
    $guardianId = mysqli_real_escape_string($conn, $guardianId);
    $newFirstName = mysqli_real_escape_string($conn, $newFirstName);
    $newLastName = mysqli_real_escape_string($conn, $newLastName);
    $newAddress = mysqli_real_escape_string($conn, $newAddress);
    $newPhoneNumber = mysqli_real_escape_string($conn, $newPhoneNumber);

    // Insert parent information into the database
    $insertQuery = "INSERT INTO `parents`(`Guardian ID`, `First Name`, `Last Name`, `Address`, `Phone number`)
                    VALUES ('$guardianId','$newFirstName','$newLastName','$newAddress','$newPhoneNumber')";
    
    $insertResult = mysqli_query($conn, $insertQuery);

    // Display the inserted information in a table
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
        echo "<table>";
        echo "<tr><th>Guardian ID</th><td>" . htmlspecialchars($guardianId) . "</td></tr>";
        echo "<tr><th>First Name</th><td>" . htmlspecialchars($newFirstName) . "</td></tr>";
        echo "<tr><th>Last Name</th><td>" . htmlspecialchars($newLastName) . "</td></tr>";
        echo "<tr><th>Address</th><td>" . htmlspecialchars($newAddress) . "</td></tr>";
        echo "<tr><th>Phone number</th><td>" . htmlspecialchars($newPhoneNumber) . "</td></tr>";
        echo "</table>";

        echo "Insert successful!";
    } else {
        echo "Error inserting parent information: " . mysqli_error($conn);
    }

    echo "</body></html>";
}
?>

<html>
    <hr>
    <br>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</html>
