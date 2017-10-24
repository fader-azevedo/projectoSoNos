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
        <link rel="stylesheet" type="text/css" href="{!! asset('css/zabuto_calendar.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('js/gritter/css/jquery.gritter.css')!!}" />
        <link rel="stylesheet" type="text/css" href="{!! asset('lineicons/style.css')!!}"/>


        <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css')!!}" />
        <link rel="stylesheet" type="text/css" href="{!! asset('css/style-responsive.css')!!}"/>

        {{--<link rel="stylesheet" type="text/css" href="{!! asset('materialize/css/materialize.css')!!}"/>--}}
        <link rel="stylesheet" type="text/css" href="{!! asset('css/materialize.min.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/normalize.css')!!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/material-design-iconic-font.min.css')!!}"/>

        {{--<link rel="stylesheet" type="text/css" href="{!! asset('css/sweetalert.css')!!}"/>--}}
        {{--<script type="text/javascript" src="{!! asset('js/chart-master/Chart.js') !!}/"></script>--}}
    </head>

    <body onload="lerDados()">
        <section id="container" >
            <header class="header black-bg">
                <div id="log" class="col-md-2">
                    {{--<p href="" class="logo"><b>Só Nós</b></p>--}}
                    <p class="centered"><a href="{{url('/')}}"><img src="{!! asset('img/logo1.jpg')!!}" class="" width="95"></a></p>
                </div>

                <div class="top-menu">
                    <button id="butNav" class="btn btn-navbar tooltipped" data-tooltip="Menu" type="button">
                        <span class="zmdi zmdi-menu"></span>
                    </button>
                    <ul class="nav pull-right top-menu">
                        <li>
                            <a class="btn-Notification2 tooltipped"  data-tooltip="Notificações">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="top-menu-indicador bg-danger">2</span>
                            </a>
                        </li>
                        <li ><button class="full-reset logout tooltipped" data-toggle="modal" data-tooltip="Logout" href="#myModalLogOut"><i class="zmdi zmdi-power"></i></button></li>
                    </ul>
                </div>
            </header>
            <!--color draw-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <ul class="sidebar-menu nav-list" id="nav-accordion">

                        <p class="centered"><a href="{{url('/')}}"><img src="{!! asset('img/logo.jpg')!!}" class="img-circle" width="100"></a></p>
                        {{--<h5 class="centered">Fader x Azevedo</h5>--}}
                        @yield('menu')
                    </ul>
                </div>
            </aside>
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    @yield('content')
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

                    <section class="z-depth-3 NotificationArea">
                        <div class="text-center NotificationArea-title">Notificações <i class="btn-Notification">x</i></div>
                        <a href="#" class="waves-effect Notification">
                            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                            <div class="Notification-text ">
                                <p>
                                    {{--<i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>--}}
                                    <strong>Novo Aluno</strong>
                                    <br>
                                    <small>Just Now</small>
                                </p>
                            </div>
                        </a>
                        <a href="#" class="waves-effect Notification">
                            <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
                            <div class="Notification-text">
                                <p>
                                    <strong>New Updates</strong>
                                    <br>
                                    <small>30 Mins Ago</small>
                                </p>
                            </div>
                        </a>
                        <a href="#" class="waves-effect Notification">
                            <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
                            <div class="Notification-text">
                                <p>
                                    <strong>Archive uploaded</strong>
                                    <br>
                                    <small>31 Mins Ago</small>
                                </p>
                            </div>
                        </a>
                        <a href="#" class="waves-effect Notification">
                            <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
                            <div class="Notification-text">
                                <p>
                                    <strong>New Mail</strong>
                                    <br>
                                    <small>37 Mins Ago</small>
                                </p>
                            </div>
                        </a>
                    </section>
                </section>
            </section>

            <footer class="site-footer">
                <div class="text-center">
                    Sistema de Controlo de Mensalidades
                    <a href="" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
        </section>

        <script src="{!! asset('js/jquery-2.2.0.min.js')!!}" type="text/javascript"></script>
        <script src="{!! asset('js/bootstrap.min.js')!!}"></script>

        <script type="text/javascript" src="{!! asset('js/jquery.dcjqaccordion.2.7.js')!!}"></script>
        <script src="{!! asset('js/jquery.scrollTo.min.js')!!}"></script>
        <script src="{!! asset('js/jquery.nicescroll.js')!!}" type="text/javascript"></script>
        <script src="{!! asset('js/jquery.sparkline.js')!!}"></script>

        {{--<script src="{!! asset('js/js/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}"></script>--}}

        {{--<script type="text/javascript" src="{!! asset('js/gritter/js/jquery.gritter.js')!!}"></script>--}}
        {{--<script type="text/javascript" src="{!! asset('js/gritter-conf.js')!!}"></script>--}}

        <!--script for this page-->
        <script src="{!! asset('js/sparkline-chart.js')!!}"></script>
        <script src="{!! asset('js/zabuto_calendar.js')!!}"></script>
        <script src="{!! asset('js/common-scripts.js')!!}"></script>
        <script src="{!! asset('js/sweetalert.min.js')!!}"></script>
        <script src="{!! asset('js/materialize.min.js')!!}"></script>
        <script src="{!! asset('js/jquery.mCustomScrollbar.concat.min.js')!!}"></script>
        <script src="{!! asset('js/jquery.waypoints.js')!!}"></script>
        <script src="{!! asset('js/jquery.counterup.min.js')!!}"></script>
        <script src="{!! asset('js/form-component.js')!!}"></script>
        <script src="{!! asset('js/bootstrap-switch.js')!!}"></script>
        <script src="{!! asset('js/jquery.tagsinput.js')!!}"></script>

        {{--<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>--}}
        {{--<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>--}}
        {{--<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>--}}

        {{--<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>--}}
        <script>
            $('.tooltipped').tooltip({delay: 50});
            $(".counter").counterUp({
                delay: 100,
                time: 1200
            });

            lerDados = function () {

            }
        </script>
        @yield('scripts')


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
    </body>
</html>
