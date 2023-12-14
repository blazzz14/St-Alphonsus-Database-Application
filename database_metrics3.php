<!DOCTYPE html>
<html lang="en">
<head>
    <title>Metrics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="metrics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            margin: 0 auto; /* Center the container so chart is central*/
            width: 50%;
        }
    </style>
</head>

<body>
    <h1>Distribution of Database Entities represented by Bar Chart</h1>
    
    <?php
    include 'dbconnect2.php'; // Connect to XAMPP

    // Function to get row count from a table
    function getRowCount($conn, $tableName) {
        $countQuery = "SELECT COUNT(*) as count FROM `$tableName`"; // Enclose table name in backticks
        $result = mysqli_query($conn, $countQuery);
        
        if (!$result) {
            die("Error getting row count: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }

    // Get row counts for each table
    $tables = array(
        'class',
        'deputy head teachers',
        'external contractors',
        'head teacher',
        'parent pairs',
        'st alphonsus1',
        'students',
        'teachers',
        'teaching assistants'
    );

    $labels = [];
    $data = [];

    // Loop through each table to get row count
    foreach ($tables as $table) {
        $labels[] = $table;
        $data[] = getRowCount($conn, $table);
    }
    ?>

    <!--Edit canvas to manage bar chart size-->
    <div id="chart-container">
        <canvas id="entitiesChart" width="400" height="300"></canvas>
    </div>

    <script>
        // Pass PHP data to JavaScript
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;

        // Chart.js configuration
        var ctx = document.getElementById('entitiesChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Entities',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <hr>
    <a href="stalphonsus_db.php">Return to Database main page</a>
</body>
</html>
