@extends('adminlte::page')

@section('title' , 'Chart')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title"><h2 class="center">Usuarios Registrados por Ficha</h2></div>
        </div>
        <div class="row col-9">
            <div class="chart-container" style="position: relative">
                <canvas id="myChart2" width="1030" height="500"></canvas>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <!-- CDN y Script de chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            /* Le paso la variable ficha con la propiedad json_encode para convertir
            el array en string, ya que el echo no imprime arrays*/
            labels: <?php echo json_encode($ficha) ?>,
            datasets: [{
                label: '# de usuarios registrados segun las fichas registradas',
                /* Le paso la variable cantFicha con la propiedad json_encode para convertir
                el array en string, ya que el echo no imprime arrays*/
                data: <?php echo json_encode($cantFicha) ?>,
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


