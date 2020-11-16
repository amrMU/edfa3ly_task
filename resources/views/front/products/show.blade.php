@extends('front.layouts.main')
@section('content')

    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          @lang('home.home') -  @lang('home.products') - {{@$product->$name}} </span> </h4>
                </div>

                <div class="heading-elements">
                    <div class="heading-btn-group">
                     </div>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{URL::to('ar?cur=usd')}}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                    <li class="active">  {{@$product->$name}}</li>
                </ul>

                <ul class="breadcrumb-elements">

                </ul>
            </div>
        </div>
        <!-- /page header -->

        <div class="content">
    <div class="container-detached">
    <div class="content-detached">

        <!-- Details -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="media stack-media-on-mobile text-left content-group-lg">


                    <div class="media-body">
                        <h5 class="media-heading text-semibold">{{@$product->$name}}</h5>@include('front.products.in_offer')

                        <ul class="list-inline list-inline-separate text-muted no-margin">
                            <li>{{@$product->category->$name}}</li>
                            <li>{{@Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</li>
                            <li>
                                {{@$product->price . ' ' . trans('home.'.$product->currency)}}
                            </li>
                        </ul>
                    </div>

                    <div class="media-right media-middle text-nowrap">
                    @include('front.products.cart.add_to_cart_model')
                    </div>
                </div>
                <div class="content-group-lg">
{{--                    slidder--}}
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($product->images as $key=> $image)
                                <div class="item @if($loop->first) active @endif  ">
                                    <img src="{{asset('/uploads/images/products/org/'.@$image->image)}}" alt="Los Angeles">
                                </div>
                            @endforeach
                        </div>
                    </div>
{{--                    slidder--}}

                    {!! @$product->$content !!}
                </div>




            </div>
        </div>
        <!-- /details -->




    </div>
    </div>
    </div>
    </div>
@stop
@section('jsCode')
    <script>
        $('#getOffer').on('click',function (){
            $('#quantity').val("{{@$product->paid_pieces + @$product->free_pieces}}");
        });
    </script>
@stop
