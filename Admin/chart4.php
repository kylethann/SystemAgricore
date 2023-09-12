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
$labels = [];
$values = [];
foreach ($data as $row) {
    $labels[] = $row['gender'];
    $values[] = (int)$row['count'];
}

$labelsJson = json_encode($labels);
$valuesJson = json_encode($values);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gender Distribution</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div id="chart-container">
        <canvas id="barChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var labels = <?php echo $labelsJson; ?>;
        var values = <?php echo $valuesJson; ?>;

        var data = {
            labels: labels,
            datasets: [{
                label: 'Gender Distribution',
                data: values,
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
