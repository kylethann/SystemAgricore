<?php
include('../config.php');


// Fetch data from the database
$query = "SELECT gender, COUNT(*) AS count FROM farmer1 GROUP BY gender";
$stmt = $pdo->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;

// Prepare data for the bar graph
$genderLabels = [];
$genderCounts = [];
foreach ($data as $row) {
    $genderLabels[] = $row['gender'];
    $genderCounts[] = (int)$row['count'];
}

$genderLabelsJson = json_encode($genderLabels);
$genderCountsJson = json_encode($genderCounts);
?>

<!DOCTYPE html>
<html>
<head>
    <title>3D-like Bar Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div id="chart-container">
        <canvas id="genderBarGraph"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('genderBarGraph').getContext('2d');
        var genderLabels = <?php echo $genderLabelsJson; ?>;
        var genderCounts = <?php echo $genderCountsJson; ?>;

        var data = {
            labels: genderLabels,
            datasets: [{
                label: 'Gender Distribution',
                data: genderCounts,
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                },
                z: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        };

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
