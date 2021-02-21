@extends('adminlte::page')

@section('title' , 'Chart')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title"><h2 class="center">Usuarios Registrados por Mes</h2></div>
        </div>
        <div class="row col-8">
            <div class="chart-container" style="position: relative">
                <canvas id="userChart" width="1030" height="500"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
<!-- CDN y Script de chartjs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
     var ctx = document.getElementById('userChart').getContext('2d');
     var userChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: '# de usuarios registrados segun el mes en el año 2020',
                /* Le paso la variable datas con la propiedad json_encode para convertir
                el array en string, ya que el echo no imprime arrays*/
                data: <?php echo json_encode($datas) ?>,
                borderColor: 'rgb( 82, 193, 42)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
        });
</script>
@endsection


