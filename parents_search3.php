<?php
include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get data from the form
    $guardianId = $_POST['Guardian_ID'];
    $firstName = $_POST['First_Name'];
    $lastName = $_POST['Last_Name'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['Phone_number'];
    $studentId = $_POST['Student_ID'];

    // Validate and sanitize input
    $guardianId = mysqli_real_escape_string($conn, $guardianId);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $address = mysqli_real_escape_string($conn, $address);
    $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
    $studentId = mysqli_real_escape_string($conn, $studentId);

    // Construct the SQL query based on the provided search criteria
    $sql = "SELECT * FROM `parents` WHERE 1";

    if (!empty($guardianId)) {
        $sql .= " AND `Guardian ID` = '$guardianId'";
    }

    if (!empty($firstName)) {
        $sql .= " AND `First Name` = '$firstName'";
    }

    if (!empty($lastName)) {
        $sql .= " AND `Last Name` = '$lastName'";
    }

    if (!empty($address)) {
        $sql .= " AND `Address` = '$address'";
    }

    if (!empty($phoneNumber)) {
        $sql .= " AND `Phone number` = '$phoneNumber'";
    }

    if (!empty($studentId)) {
        $sql .= " AND `Student ID` = '$studentId'";
    }
  
    // Execute the query and fetch results
    $result = mysqli_query($conn, $sql);

    // Display the results in a table
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

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><th>Guardian ID</th><td>" . htmlspecialchars($row['Guardian ID']) . "</td></tr>";
                    echo "<tr><th>First Name</th><td>" . htmlspecialchars($row['First Name']) . "</td></tr>";
            
                    // Check if the key 'Last name' exists in the array before accessing it
                    if (isset($row['Last name'])) {
                        echo "<tr><th>Last name</th><td>" . htmlspecialchars($row['Last name']) . "</td></tr>";
                    } else {
                        echo "<tr><th>Last name</th><td></td></tr>"; // Placeholder for missing data
                    }
            
                    echo "<tr><th>Address</th><td>" . htmlspecialchars($row['Address']) . "</td></tr>";
                    echo "<tr><th>Phone number</th><td>" . htmlspecialchars($row['Phone number']) . "</td></tr>";
                    echo "<tr><th>Student ID</th><td>" . htmlspecialchars($row['Student ID']) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No records found.";
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }

    echo "<hr><br><a href='stalphonsus_db.php'>Return to Database main page</a></body></html>";
}
?>
