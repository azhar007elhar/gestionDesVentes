@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 style="text-align: center">Statistique vente Par Produit</h1>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="barchart_material" style="width: 100%; height: 500px;"></div>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Produit', 'Total Ventes', ],
                    // 'Quantités'],

                    @php
                    foreach ($listVenteByProducts as $product) {
                        echo "['" . $product->libelle . "', "  . $product->qty . '],';
                    }
                    @endphp
                ]);

                var options = {
                    chart: {
                        title: 'Bar Graph | Total Ventes',
                        subtitle: 'Ventes, et Quantités: @php echo $listVenteByProducts[0]->created_at @endphp',
                    },
                    bars: 'vertical'
                };
                var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

    </div>


@endsection
