@extends('dashboard.layouts.main')
@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">@lang('home.categories')</span> - @lang('home.dashboard')</h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('ar/admin/home') }}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                        <li class="active">@lang('home.update_info')</li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                @lang('home.settings')
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">

                              <li><a href="{{ URL::to('ar/admin/setting') }}"><i class="icon-gear"></i>@lang('home.settings')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

             <!-- Content area -->
            <div class="content">
                <!-- Form validation -->
                    <div class="panel panel-flat col-md-10">
                        <div class="panel-heading">
                            <h5 class="panel-title">@lang('home.create_users')</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="post" action="{{ route('products.update',$product) }}" enctype='multipart/form-data'  >
                            <input name="_method" type="hidden" value="PUT">
                            <input name="use" type="hidden" value="{{@$product->id}}">
                                @csrf
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}
                                </div>
                                @endforeach
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}
                                </div>
                                @endif
                                {{-- general Info --}}
                                <fieldset class="content-group">
                                    <legend class="text-bold">@lang('home.edit_product')</legend>
                                    <!-- choose category input -->
                                    <div class="form-group" id="">
                                        <label class="control-label col-lg-3">@lang('home.main_categories') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="form-control" >
                                                <option value="">@lang('home.select_one')</option>
                                                @foreach($categories as $category)
                                                    <option value="{{@$category->id}}" @if($product->category_id == $category->id) selected @endif>{{(App::isLocale('en')  ? @$category->name_en : @$category->name_ar)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /choose category input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.name_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_ar" class="form-control" placeholder="@lang('home.name_ar')" value="{{@$product->name_ar}}">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.name_en') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_en" class="form-control"  placeholder="@lang('home.name_en')" value="{{$product->name_en}}">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <legend class="text-bold">@lang('home.prices')</legend>
                                    {{--        EgpPrice--}}
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3">@lang('home.egp_price') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="egp_price" class="form-control input-xlg" placeholder="1050" value="{{@$product->prices->where('currency','L.E')->first()->price}}">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
                                            </div>
                                        </div>

                                    </div>
                                    {{--    EgpPrice--}}
                                    {{--        usdPrice--}}
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3">@lang('home.usd_price') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="usd_price" class="form-control input-xlg" placeholder="68"  value="{{@$product->prices->where('currency','USD')->first()->price}}">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
                                            </div>
                                        </div>

                                    </div>
                                {{--    usdPrice--}}
                                <!-- Logo uploader -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.images') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="images[]" multiple class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /Logo uploader -->
                                    <!-- content ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.content_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea name="content_ar" id="editor-full" rows="4" cols="4">{!! @$product->content_ar !!}</textarea>
                                        </div>
                                    </div>
                                    <!-- /content ar input -->
                                    <!-- content en input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.content_en') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea name="content_en" id="editor-full-copy" rows="4" cols="4">{!! @$product->content_en !!}</textarea>
                                        </div>
                                    </div>
                                    <!-- /content en input -->

                                </fieldset>
                                {{-- general Info --}}




                                <div class="text-right">
                                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->
                    <div class="col-md-2">
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

                    </div>

            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
@stop
