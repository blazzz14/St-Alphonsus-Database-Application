<?php
//Removed Debug at the start of the program, var_dump($_POST); for cleaner output

include 'dbconnect2.php'; // Connect to XAMPP

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get data from the form
    $contractorId = $_POST['Contractor_ID'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $sector = $_POST['Sector'];

    // Validate and sanitize input
    $contractorId = mysqli_real_escape_string($conn, $contractorId);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $sector = mysqli_real_escape_string($conn, $sector);

    // Construct the SQL query based on the provided search criteria
    $sql = "SELECT * FROM `external contractors` WHERE 1";

    if (!empty($contractorId)) {
        $sql .= " AND `Contractor ID` = '$contractorId'";
    }

    if (!empty($firstName)) {
        $sql .= " AND `First Name` = '$firstName'";
    }

    if (!empty($lastName)) {
        $sql .= " AND `Last Name` = '$lastName'";
    }

    if (!empty($sector)) {
        $sql .= " AND `Sector` = '$sector'";
    }

    // Execute the query and fetch results
    $result = mysqli_query($conn, $sql);

    // Display the results in an HTML table
    echo "<html><head><style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
            // Display table headers
            $row = mysqli_fetch_assoc($result);
            echo "<table><tr>";
            foreach ($row as $key => $value) {
                echo "<th>" . htmlspecialchars($key) . "</th>";
            }
            echo "</tr>";

            // Display the first row of results
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";

            // Display the remaining rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
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
