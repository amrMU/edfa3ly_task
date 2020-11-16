<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#checkoutOrder{{@$cart->id}}"> @lang('home.complete_order') <li class="icon-database-arrow"></li></button>


<!-- Modal -->
<div id="checkoutOrder{{@$cart->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{url(LaravelLocalization::getCurrentLocale()).'/i/checkout/'.$order->id}}" method="post">
        @csrf
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('home.complete_order')</h4>
                </div>
                <div class="modal-body">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="form-group has-feedback has-feedback-left">
                                <label class="control-label col-lg-3">@lang('home.phone') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="phone" class="form-control input-xlg" placeholder="+201061637022" value="{{Request::old('phone')}}" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-mobile"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <label class="control-label col-lg-3">@lang('home.address') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="address" class="form-control input-xlg" placeholder="" value="{{Request::old('address')}}" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-location3"></i>
                                    </div>
                                </div>
                            </div>
                            {{--                     //contnet--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
                    <button type="submit" class="btn btn-info">@lang('home.complete_order')</button>
                </div>
            </div>
        </form>

    </div>
</div>
