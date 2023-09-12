<?php
include('../config.php');

// Fetch data from the database
$query = "SELECT gender, value FROM farmer1";
$stmt = $pdo->prepare($query);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;

// Prepare data for Google Charts
$chartData = [];
foreach ($data as $row) {
    $chartData[] = [$row['category'], (int)$row['value']];
}

// Convert data to JSON format
$chartDataJson = json_encode($chartData);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart Example</title>
    <!-- Load Google Charts library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Value');
            data.addRows(<?php echo $chartDataJson; ?>);

            var options = {
                title: 'Pie Chart Example',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="piechart" style="width: 500px; height: 300px;"></div>
</body>
</html>
