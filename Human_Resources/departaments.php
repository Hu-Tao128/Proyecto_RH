<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php"; 
require_once "../functions.php"; 

$departament = showDepartment();

// Llamada a la función que obtiene los datos
$departmentsData = stadisticDepartment(); 

// Decodificar los datos JSON para pasarlos a JavaScript
$departmentsData = json_decode($departmentsData, true);
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  <!-- Cargar Chart.js -->
</head>

<section>
    <center>
        <div class="questions">
        <h2>Table for the departments</h2>
        <p>In this section you can see the departments that exist in the company.</p>
        </div>
    </center>
<br>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>name</th>
            </tr>
            <?php foreach($departament as $renglon) {?>
            <tr>
                <td><?= $renglon['code'] ?></td>
                <td><?= $renglon['name']?></td>
            </tr>
            <?php }?>
        </table>
    </div>

</section><br><br>

<section class="position">
    <div class="container">
        <h2>Average Department Statistics</h2>
        <canvas id="userChart" width="400" height="400"></canvas>
    </div>
</section>

<script>
    // Preparar los datos para Chart.js
    const departmentNames = <?php echo json_encode(array_column($departmentsData, 'department')); ?>;
    const averageScores = <?php echo json_encode(array_column($departmentsData, 'average_score')); ?>;

    // Crear la gráfica PolarArea
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: departmentNames,  // Los nombres de los departamentos
            datasets: [{
                label: 'Average Score per Department',
                data: averageScores,  // Los puntajes promedio por departamento
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2); // Formato con 2 decimales
                        }
                    }
                }
            },
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php include "../includes/footer.php"?>