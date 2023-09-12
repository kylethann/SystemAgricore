<?php
include('../config.php');
// include('includes/header.php');

// Fetch data from the database
$query = "SELECT gender, COUNT(*) AS count FROM farmer1 GROUP BY gender";
$stmt = $pdo->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;

// Prepare data for the donut pie chart
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

<body>     
    <script>
        var ctx = document.getElementById('genderDonutChart').getContext('2d');
        var genderLabels = <?php echo $genderLabelsJson; ?>;
        var genderCounts = <?php echo $genderCountsJson; ?>;

        var data = {
            labels: genderLabels,
            datasets: [{
                data: genderCounts,
                backgroundColor: ['rgba(54, 162, 235, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                borderWidth: 1
            }]
        };

        var options = {
            cutout: '70%',
            responsive: true
        };

        var myDonutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>



     <!-- Page level plugins -->
     <script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
</body>
</html>

