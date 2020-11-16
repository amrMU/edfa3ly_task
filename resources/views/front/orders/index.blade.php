@extends('front.layouts.main')
@section('content')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          @lang('home.home') -  @lang('home.orders_list') </span> </h4>
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
                    <li><a href="{{URL::to(LaravelLocalization::getCurrentLocale().'/?cur=usd')}}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                    <li class="active"> @lang('home.orders_list') </li>
                </ul>

                <ul class="breadcrumb-elements">

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
                            <h6 class="panel-title">@lang('home.orders_list')</h6>
                            <div class="heading-elements"></div>
                        </div>
                        <!-- table reports -->
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>

                                    <th class="col-md-2">#</th>
                                    <th class="col-md-2">@lang('home.status')</th>
                                    <th class="col-md-2">@lang('home.items')</th>
                                    <th class="col-md-2">@lang('home.total_price')</th>
                                    <th class="col-md-2">@lang('home.since')</th>
                                   </tr>
                                </thead>
                                <tbody>
                                @if($orders->count() > 0)
                                    @foreach($orders as $order)
                                        <tr>

                                            <td><span class="text-muted">{{@$order->id}}</span></td>
                                            <td><span class="text-muted">@lang('home.'.@$order->status)</span></td>
                                            <td><h6 class="text-success-600">@include('front.orders.items')</h6></td>
                                            <td><h6 class="text-success-600">{{@$order->total_price . ' ' . trans('home.'.$order->currency)}}</h6></td>
                                            <td><h6 class="text-semibold">{{@Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</h6></td>

                                        </tr>
                                    @endforeach
                                @else
                                    <th colspan="8" class="text-center"> @lang('home.empty_list') </th>
                                @endif
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
