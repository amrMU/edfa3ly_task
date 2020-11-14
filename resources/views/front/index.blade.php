@extends('front.layouts.main')
@section('content')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">@lang('home.home')</span> - @lang('home.dashboard')</h4>
                </div>

                <div class="heading-elements">
                    <div class="heading-btn-group">
                        <!-- <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                        <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                        <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a> -->
                    </div>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{URL::to('ar/admin/home')}}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                    <li class="active"> @lang('home.dashboard')</li>
                </ul>

                <ul class="breadcrumb-elements">
                    <!-- <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li> -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear position-left"></i>
                            @lang('home.settings')
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{ URL::to('ar/admin/setting') }}"><i class="icon-gear"></i>@lang('home.general_settings')</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Main charts -->
            <div class="row">
            </div>
            <!-- /main charts -->



            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Marketing campaigns -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">@lang('home.browsing_info')</h6>
                            <div class="heading-elements">
                                <span class="label bg-success heading-text"> @lang('home.active')</span>

                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                           <li><a href="{{ URL::to('ar/admin/reports_browsing') }}"><i class="icon-copy"></i> @lang('home.full_report')</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- table reports -->
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th>@lang('home.user')</th>
                                    <th class="col-md-2">@lang('home.action')</th>
                                    <th class="col-md-2">@lang('home.since')</th>
                                    <th class="col-md-2">@lang('home.ip')</th>
                                    <th class="col-md-2">@lang('home.location')</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            <div class="media-left">
                                                <div class=""><a href="#" class="text-default text-semibold">sldv</a></div>
                                               kul
                                            </div>
                                            <div class="media-left media-middle">
                                                <a href="#"><img src="{{ asset('img/visitor.png') }}" class="img-circle img-xs" alt=""></a>
                                            </div>
                                        </td>
                                        <td><span class="label bg-blue">نص</span></td>
                                        <td><span class="text-muted">منذ</span></td>
                                        <td><span class="text-success-600"><i class="icon-stats-growth2 position-left"></i>192</span></td>
                                        <td><h6 class="text-semibold">القاهره</h6></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- table reports -->

                    </div>
                    <!-- /marketing campaigns -->
                </div>

            </div>
            <!-- /dashboard content -->


            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2019. <a href="#">Dashboard Web App Developed By </a>  <a href="https://www.linkedin.com/in/amrmuhamed" target="_blank">Amr Muhamed</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@stop
