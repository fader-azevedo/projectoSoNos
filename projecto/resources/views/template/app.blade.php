<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Fader Azevedo">
        <meta name="keyword" content="">

        <title>Gestão de Mensalidades</title>

        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('font-awesome/css/font-awesome.css')!!}"  />
        <link rel="stylesheet" type="text/css" href="{!! asset('ionicons/css/ionicons.min.css')!!}"  />
        {{--<link rel="stylesheet" type="text/css" href="{!! asset('js/gritter/css/jquery.gritter.css')!!}" />--}}
        {{--<link rel="stylesheet" type="text/css" href="{!! asset('lineicons/style.css')!!}"/>--}}
        {{--<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">--}}


        <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css')!!}" />
        <link rel="stylesheet" type="text/css" href="{!! asset('css/style-responsive.css')!!}"/>

        <link rel="stylesheet" type="text/css" href="{!! asset('materialize/css/materialize.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/materialize.min.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/normalize.css')!!}"/>
    /    <link rel="stylesheet" type="text/css" href="{!! asset('css/material-design-iconic-font.min.css')!!}"/>

        <link rel="stylesheet" type="text/css" href="{!! asset('datatables.net-bs/css/dataTables.bootstrap.min.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/AdminLTE.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/_all-skins.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('charts/morris.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('select2/css/select2.min.css')!!}"/>

        {{--Tabelelas css--}}
{{--        <link rel="stylesheet" type="text/css" href="{!! asset('datatables/css/dataTables.bootstrap.min.css')!!}"/>--}}




        {{--<link rel="stylesheet" type="text/css" href="{!! asset('css/sweetalert.css')!!}"/>--}}
        {{--<script type="text/javascript" src="{!! asset('js/chart-master/Chart.js') !!}/"></script>--}}
    </head>
<!-- sidebar-collapse-->
    <body class="hold-transition skin-black sidebar-mini sidebar-collapse" >
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo" style="position: fixed">
                <span class="logo-mini"><img src="{!! asset('img/logo1.jpg')!!}" class="" width="50"></span>
                <span class="logo-lg"><img src="{!! asset('img/logo1.jpg')!!}" class="" width="70"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <div class="navbar navbar-fixed-top">
                <!-- Sidebar toggle button-->
                <a style="border: none" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li style="border: none" class="dropdown notifications-menu">
                            <a href="#" style="border: none" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu" style="border: none">
                            <a style="border: none" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p><img src="{{asset('img/logo1.jpg')}}" class="user-image" alt="User Image"></p>
                                <span class="hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('img/logo1.jpg')}}" class="img-circle" alt="">
                                    <p style="color: #3c3f41">
                                       So Nos
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" data-toggle="modal" href="#myModalLogOut">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a style="border: none" href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar" style="position: fixed">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree" style="margin-top: 50px">
                    @yield('menu')

                </ul>
            </section>
        </aside>

        <div class="lock-screen">
            <div class="modal fade" id="myModalLogOut"  role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h5 class="modal-title">Logout</h5>
                        </div>
                        <div class="modal-body">
                            <p class="centered"><img class="img-circle" width="80" src="{!! asset('img/logo.jpg')!!}"></p>
                            <p>Desejas Sair do Sistema ???</p>
                        </div>
                        <div class="modal-footer">
                            <button style="float: left" data-dismiss="modal" class="btn btn-danger" type="button">Nao</button>
                            <button class="btn btn-theme" type="button"><a href="{{url('/logon')}}">Sim</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content" style="padding-top: 80px">
                <div class="row">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Versão</b> 0.1
            </div>
            <strong>Sistema de Gestão de Mensalidades<a href=""></a>.</strong>
        </footer>
    </div>

    {{--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
    {{--<script src="{!! asset('js/jquery-2.2.0.min.js')!!}" type="text/javascript"></script>--}}
    <script src="{!! asset('jquery/dist/jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('bootstrap/dist/js/bootstrap.min.js')!!}"></script>
    {{--<script type="text/javascript" src="{!! asset('js/jquery.dcjqaccordion.2.7.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.scrollTo.min.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.nicescroll.js')!!}" type="text/javascript"></script>--}}
    {{--<script src="{!! asset('js/jquery.sparkline.js')!!}"></script>--}}

    {{--<script src="{!! asset('js/js/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}"></script>--}}

    {{--<script type="text/javascript" src="{!! asset('js/gritter/js/jquery.gritter.js')!!}"></script>--}}
    {{--<script type="text/javascript" src="{!! asset('js/gritter-conf.js')!!}"></script>--}}

    <!--script for this page-->
    {{--<script src="{!! asset('js/sparkline-chart.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/zabuto_calendar.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/common-scripts.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/sweetalert.min.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/materialize.min.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.mCustomScrollbar.concat.min.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.waypoints.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.counterup.min.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/form-component.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/bootstrap-switch.js')!!}"></script>--}}
    {{--<script src="{!! asset('js/jquery.tagsinput.js')!!}"></script>--}}



    <script src="{!! asset('js/adminlte.min.js')!!}"></script>
    <script src="{!! asset('charts/Chart.js')!!}"></script>
    <script src="{!! asset('charts/raphael.min.js')!!}"></script>
    <script src="{!! asset('charts/morris.min.js')!!}"></script>
    <script src="{!! asset('select2/js/select2.full.min.js')!!}"></script>


    <script src="{!! asset('datatables.net/js/jquery.dataTables.min.js')!!}"></script>
    <script src="{!! asset('datatables.net-bs/js/dataTables.bootstrap.min.js')!!}"></script>

    <script>
        $(function () {

//            $('#IDtabela1').DataTable({
//                'paging'      : false,
//                'lengthChange': false,
//                'searching'   : false,
//                'ordering'    : false,
//                'info'        : false,
//                'autoWidth'   : false
//            })
        });

//        $('.tooltipped').tooltip({delay: 50});
//        $(".counter").counterUp({
//            delay: 100,
//            time: 1200
////        });
//        var meses = ['Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
//        $('.select2').select2();

//        function buscarDados() {
//            $.ajax({
//                url: '/api/listarTodasMensalidades',
//                type: 'POST',
//                success: function (rs) {
//                    alert(rs);
//                }
//            });
//        }
    </script>
    @yield('scripts')
    </body>

    {{--<body onload="lerDados()">--}}
        {{--<section id="container" >--}}
            {{--<header class="header black-bg">--}}
                {{--<div id="log" class="col-md-2">--}}
                    {{--<p href="" class="logo"><b>Só Nós</b></p>--}}
                    {{--<p class="centered"><a href="{{url('/')}}"><img src="{!! asset('img/logo1.jpg')!!}" class="" width="95"></a></p>--}}
                {{--</div>--}}

                {{--<div class="top-menu">--}}
                    {{--<button id="butNav" class="btn btn-navbar tooltipped" data-tooltip="Menu" type="button">--}}
                        {{--<span class="zmdi zmdi-menu"></span>--}}
                    {{--</button>--}}
                    {{--<ul class="nav pull-right top-menu">--}}
                        {{--<li>--}}
                            {{--<a class="btn-Notification2 tooltipped"  data-tooltip="Notificações">--}}
                                {{--<i class="zmdi zmdi-notifications"></i>--}}
                                {{--<span class="top-menu-indicador bg-danger">2</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li ><button class="full-reset logout tooltipped" data-toggle="modal" data-tooltip="Logout" href="#myModalLogOut"><i class="zmdi zmdi-power"></i></button></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</header>--}}
            {{--<!--color draw-->--}}
            {{--<aside>--}}
                {{--<div id="sidebar"  class="nav-collapse ">--}}
                    {{--<ul class="sidebar-menu nav-list" id="nav-accordion">--}}

                        {{--<p class="centered"><a href="{{url('/')}}"><img src="{!! asset('img/logo.jpg')!!}" class="img-circle" width="100"></a></p>--}}
                        {{--<h5 class="centered">Fader x Azevedo</h5>--}}
                        {{--@yield('menu')--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</aside>--}}
            {{--<!--main content start-->--}}
            {{--<section id="main-content">--}}
                {{--<section class="wrapper">--}}
                    {{--@yield('content')--}}
                    {{--<div class="lock-screen">--}}
                        {{--<div class="modal fade" id="myModalLogOut"  role="dialog" data-keyboard="false" data-backdrop="static">--}}
                            {{--<div class="modal-dialog modal-sm">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                        {{--<h5 class="modal-title">Logout</h5>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<p class="centered"><img class="img-circle" width="80" src="{!! asset('img/logo.jpg')!!}"></p>--}}
                                        {{--<p>Desejas Sair do Sistema ???</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--<button style="float: left" data-dismiss="modal" class="btn btn-danger" type="button">Nao</button>--}}
                                        {{--<button class="btn btn-theme" type="button"><a href="{{url('/logon')}}">Sim</a></button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<section class="z-depth-3 NotificationArea">--}}
                        {{--<div class="text-center NotificationArea-title">Notificações <i class="btn-Notification">x</i></div>--}}
                        {{--<a href="#" class="waves-effect Notification">--}}
                            {{--<div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>--}}
                            {{--<div class="Notification-text ">--}}
                                {{--<p>--}}
                                    {{--<i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>--}}
                                    {{--<strong>Novo Aluno</strong>--}}
                                    {{--<br>--}}
                                    {{--<small>Just Now</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="waves-effect Notification">--}}
                            {{--<div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>--}}
                            {{--<div class="Notification-text">--}}
                                {{--<p>--}}
                                    {{--<strong>New Updates</strong>--}}
                                    {{--<br>--}}
                                    {{--<small>30 Mins Ago</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="waves-effect Notification">--}}
                            {{--<div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>--}}
                            {{--<div class="Notification-text">--}}
                                {{--<p>--}}
                                    {{--<strong>Archive uploaded</strong>--}}
                                    {{--<br>--}}
                                    {{--<small>31 Mins Ago</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="waves-effect Notification">--}}
                            {{--<div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>--}}
                            {{--<div class="Notification-text">--}}
                                {{--<p>--}}
                                    {{--<strong>New Mail</strong>--}}
                                    {{--<br>--}}
                                    {{--<small>37 Mins Ago</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</section>--}}
                {{--</section>--}}
            {{--</section>--}}

            {{--<footer class="site-footer">--}}
                {{--<div class="text-center">--}}
                    {{--Sistema de Controlo de Mensalidades--}}
                    {{--<a href="" class="go-top">--}}
                        {{--<i class="fa fa-angle-up"></i>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</footer>--}}
        {{--</section>--}}

        {{--<script src="{!! asset('js/jquery-2.2.0.min.js')!!}" type="text/javascript"></script>--}}
        {{--<script src="{!! asset('js/bootstrap.min.js')!!}"></script>--}}

        {{--<script type="text/javascript" src="{!! asset('js/jquery.dcjqaccordion.2.7.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.scrollTo.min.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.nicescroll.js')!!}" type="text/javascript"></script>--}}
        {{--<script src="{!! asset('js/jquery.sparkline.js')!!}"></script>--}}

        {{--<script src="{!! asset('js/js/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}"></script>--}}

        {{--<script type="text/javascript" src="{!! asset('js/gritter/js/jquery.gritter.js')!!}"></script>--}}
        {{--<script type="text/javascript" src="{!! asset('js/gritter-conf.js')!!}"></script>--}}

        {{--<!--script for this page-->--}}
        {{--<script src="{!! asset('js/sparkline-chart.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/zabuto_calendar.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/common-scripts.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/sweetalert.min.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/materialize.min.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.mCustomScrollbar.concat.min.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.waypoints.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.counterup.min.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/form-component.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/bootstrap-switch.js')!!}"></script>--}}
        {{--<script src="{!! asset('js/jquery.tagsinput.js')!!}"></script>--}}

        {{--<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>--}}
        {{--<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>--}}
        {{--<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>--}}

        {{--<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>--}}
        {{--<script>--}}
            {{--$('.tooltipped').tooltip({delay: 50});--}}
            {{--$(".counter").counterUp({--}}
                {{--delay: 100,--}}
                {{--time: 1200--}}
            {{--});--}}

            {{--lerDados = function () {--}}

            {{--}--}}
            {{--var meses = ['Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];--}}
        {{--</script>--}}
        {{--@yield('scripts')--}}


        {{--<script>--}}
            {{--<script type="text/javascript">--}}
{{--//                alert('asd');--}}
                {{--$(document).ready(function() {--}}
                    {{--var data = '';--}}
{{--//                    lerDados = function () {--}}
                        {{--$.ajax({--}}
                            {{--url: 'api/listar',--}}
                            {{--type: 'POST',--}}
                            {{--success: function (rs) {--}}
                                {{--$('.tr').remove();--}}
                                {{--data = rs.data;--}}
                                {{--for (var i = 0; i < rs.data.length; i++) {--}}
                                    {{--$('#tby').append(" <tr><tr>"+rs.data[i].mes+"</tr></tr>");--}}
                                {{--}--}}
                            {{--}--}}
                        {{--});--}}
{{--//                    };--}}
                {{--});--}}
        {{--</script>--}}
        {{--</script>--}}
        {{--<script src="{!! asset('js/main.js')!!}"></script>--}}

        {{--<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>--}}

        {{--<script type="text/javascript">--}}
            {{--$(document).ready(function () {--}}
                {{--var unique_id = $.gritter.add({--}}
                    {{--// (string | mandatory) the heading of the notification--}}
                    {{--title: 'Bem Vindo A SCM!',--}}
                    {{--// (string | mandatory) the text inside the notification--}}
                    {{--text: 'Aqui entra texto <a href="#" style="color:#ffd777">SoNos.com</a>.',--}}
                    {{--// (string | optional) the image to display on the left--}}
                    {{--image: '{!! asset('img/logo.jpg') !!}',--}}
                    {{--// (bool | optional) if you want it to fade out on its own or just sit there--}}
                    {{--sticky: true,--}}
                    {{--// (int | optional) the time you want it to be alive for before fading out--}}
                    {{--time: '',--}}
                    {{--// (string | optional) the class name you want to apply to that specific message--}}
                    {{--class_name: 'my-sticky-class'--}}
                {{--});--}}

                {{--return false;--}}
            {{--});--}}
        {{--</script>--}}
    {{--</body>--}}
</html>
