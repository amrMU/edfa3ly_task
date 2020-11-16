@extends('front.layouts.main')
@section('content')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          @lang('home.home') -  @lang('home.category') {{@$category->$name}} </span> </h4>
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
                    <li class="active"> @lang('home.category') {{@$category->$name}}</li>
                </ul>

                <ul class="breadcrumb-elements">
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
                            <h6 class="panel-title">@lang('home.products_list')</h6>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <!-- table reports -->

                        <div class="table-responsive">

                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th>@lang('home.name')</th>
                                    <th class="col-md-2">@lang('home.price')</th>
                                    <th class="col-md-2">@lang('home.category')</th>
                                    <th class="col-md-2">@lang('home.offer')</th>
                                    <th class="col-md-2">@lang('home.since')</th>
                                    <th class="col-md-2"><i class="icon-menu-open2"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($products->count() > 0)
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="media-left">
                                                <div class=""><a href="#" class="text-default text-semibold">{{@$product->$name}}</a></div>
                                            </div>
                                            <div class="media-left media-middle">
                                                <a href="#">
                                                    <img src="{{asset('/uploads/images/products/50x50/'.$product->images->first()->image) }}" width="50" height="50" class="img-responsive img-circle img-xs" alt="{{ @$product->$name }}">

                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="text-muted">{{@$product->price . ' ' . trans('home.'.$product->currency)}}</span></td>
                                        <td><span class="text-success-600">
                                                <a href="{{url(LaravelLocalization::getCurrentLocale()).'/category/'.str_replace(' ','_',$product->category->name_en).'/'.$product->category_id.'?cur='.\App\Helpers\DoFire::getCurrentCurrency()}}">{{@$product->category->$name}}</a>
                                            </span></td>
                                        <td>
                                          @include('front.products.in_offer')
                                        </td>
                                        <td><h6 class="text-semibold">{{@Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</h6></td>
                                        <td>
                                            @include('front.products.actions_list')
                                        </td>
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
