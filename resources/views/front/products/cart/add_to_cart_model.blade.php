
<a  data-toggle="modal" data-target="#open_cart{{@$product->id}}" class="btn bg-blue legitRipple">
    <i class="icon-cart position-left"></i>
    @lang('home.add_to_cart')
</a>

<!-- Modal -->
<div id="open_cart{{@$product->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{url(LaravelLocalization::getCurrentLocale()).'/add/cart/'.$product->id}}" method="post">
            @csrf
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('home.add_to_cart')</h4>
            </div>
            <div class="modal-body">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if($product->offers_type == 'pieces')
                        <button class="btn btn-grey btn-sm" id="getOffer" type="button"> @lang('home.get_offer')</button>

                        @endif
                            @include('front.products.in_offer')

                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label col-lg-3">@lang('home.quantity') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                            <div class="col-lg-9">
                                <input type="number" name="quantity" id="quantity" class="form-control input-xlg" placeholder="1" value="{{Request::old('quantity')}}" min="1" required>
                                <div class="form-control-feedback">
                                    <i class="icon-cart"></i>
                                </div>
                            </div>
                        </div>
{{--                     //contnet--}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
                <button type="submit" class="btn btn-info">@lang('home.add_to_cart')</button>
            </div>
        </div>
        </form>

    </div>
</div>
