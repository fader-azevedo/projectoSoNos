@extends('template.app')

@section('menu')
    <li class="mt">
        <a class="active" href="">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-money"></i>
            <span>Mensalidades</span>
        </a>
        <ul class="sub">
            <li><a  href="{!! url('/mensalidade/registar') !!}">Registar</a></li>
            <li><a  href="{!! url('/mensalidade') !!}">Listar</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-users"></i>
            <span>Alunos</span>
        </a>
        <ul class="sub">
            <li><a  href="{!! url('/aluno') !!}">Todos</a></li>
            <li><a  href="">Inscritos</a></li>
            <li><a  href="">Não Inscritos</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class="fa fa-history"></i>
            <span>Historico</span>
        </a>
        <ul class="sub">
            <li><a  href="">Aluno</a></li>
            <li><a  href="">Todos</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-bar-chart-o"></i>
            <span>Estatísticas</span>
        </a>
        <ul class="sub">
            <li><a>Chartjs</a></li>
        </ul>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" >
            <i class=" fa fa-book"></i>
            <span>Extras</span>
        </a>
        <ul class="sub">
            <li><a href="{{url('/extras')}}" >Lock</a></li>
        </ul>
    </li>
@endsection
@section('content')

    <div class="col-lg-12 main-chart">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="li_user"></span>
                    <h5 class="counter">{{$numAlunos}}</h5>
                </div>
                <p class="boxP">Alunos Inscritos!</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_banknote"></span>
                    <h5 class="counter">48</h5>
                </div>
                <p></p>
            </div>

            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_news"></span>
                    <h5 class="counter">{{$numDisc}}</h5>
                </div>
                <p>Disciplinas</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_data"></span>
                    <h5>OK!</h5>
                </div>
                <p></p>
            </div>
        </div>
        <div class="row mt">
            <!--CUSTOM CHART START -->
            <div class="border-head">
                <h3>Estatistica</h3>
            </div>
            <div class="custom-bar-chart">
                <ul class="y-axis">
                    <li><span>10.000</span></li>
                    <li><span>8.000</span></li>
                    <li><span>6.000</span></li>
                    <li><span>4.000</span></li>
                    <li><span>2.000</span></li>
                    <li><span>0</span></li>
                </ul>
                <div class="bar">
                    <div class="title">JAN</div>
                    <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                </div>
                <div class="bar ">
                    <div class="title">FEB</div>
                    <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                </div>
                <div class="bar ">
                    <div class="title">MAR</div>
                    <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                </div>
                <div class="bar ">
                    <div class="title">APR</div>
                    <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                </div>
                <div class="bar">
                    <div class="title">MAY</div>
                    <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                </div>
                <div class="bar ">
                    <div class="title">JUN</div>
                    <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                </div>
                <div class="bar">
                    <div class="title">JUL</div>
                    <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                </div>
            </div>
        </div>
    </div>
@endsection