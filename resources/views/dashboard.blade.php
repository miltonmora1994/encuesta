@extends('layouts.app')


@section('content')



    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.get("{{url('empleados')}}",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var contar = [];
                    var empresa = [];

                    for (var i in data) {
                        name.push(data[i].fecha);
                        contar.push(data[i].CONTAR);
                        empresa.push(data[i].EMPRESA);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Encuestas',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: contar
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>




@endsection