@extends('template.app')

@section('menu')
    < <li class="treeview">
        <a href="{{url('/')}}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-money"></i>
            <span>Mensalidades</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Alunos</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-pencil"></i> Registar</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Estatísticas</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-pencil"></i>Alunos</a></li>
            <li><a href=""><i class="fa fa-money"></i> Mensalidade</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-history"></i>
            <span>Históricos</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-users"></i> Alunos</a></li>
            <li><a href=""><i class="fa fa-money"></i> Mensalidades</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Extras</span>
            <span class="pull-right-container">
                                 <i class="fa fa-angle-left pull-right"></i>
                            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-lock"></i> Bloquear Tela</a></li>
            <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
        </ul>
    </li>

@endsection
@section('content')

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>6</h3>

                <p>Disciplinas</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-bookmark"></i>
            </div>
            <a href="#" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Pagamento do Mes</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>Alunos Incritos</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        {{--<div class="small-box bg-red">--}}
            {{--<div class="inner">--}}
                {{--<h3>65</h3>--}}

                {{--<p>Unique Visitors</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
                {{--<i class="ion ion-pie-graph"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
    </div>
    <!-- ./col -->
    </div>

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Mensalidades</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:290px"></canvas>
                    </div>
                </div>
            </div>

        </section>

        <section class="col-lg-3 connectedSortable">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Alunos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="sales-chart" style="height: 300px;"></div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>

        var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'Junho', 'July','Agosto'],
            datasets: [
                {
                    label               : 'Electronics',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [50, 29, 40, 21, 56, 55, 40,11]
                },
                {
                    label               : 'Digital Goods',
                    fillColor           : 'rgba(60,141,188,0.9)',
                    strokeColor         : 'rgba(60,141,188,0.8)',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [28, 48, 40, 19, 46, 27, 30,40]
                }
            ]
        }


        var barChartCanvas                   = $('#barChart').get(0).getContext('2d');
        var barChart                         = new Chart(barChartCanvas);
        var barChartData                     = areaChartData;
        barChartData.datasets[1].fillColor   = '#00a65a';
        barChartData.datasets[1].strokeColor = '#00a65a';
        barChartData.datasets[1].pointColor  = '#00a65a';
        var barChartOptions                  = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero        : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : true,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - If there is a stroke on each bar
            barShowStroke           : true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth          : 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing         : 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing       : 1,
            //String - A legend template
            {{--legendTemplate          : '<ul class='<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',--}}
            //Boolean - whether to make the chart responsive
            responsive              : true,
            maintainAspectRatio     : true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions)


        /*grafico de alunos*/

        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#f56954", "#00a65a"],
            data: [
                {label: "Alunos Não Devedores", value: 40},
                {label: "Alunos Devedores", value: 60},
            ],
            hideHover: 'auto'
        });

    </script>
@endsection