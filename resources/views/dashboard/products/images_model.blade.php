
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-default " data-toggle="modal" data-target="#product_images{{@$product->id}}">
    <img src="{{asset('/uploads/images/products/50x50/'.$product->images->first()->image) }}" width="50" height="50" class="img-responsive" alt="{{ @$product->name }}">
</button>


<!-- Modal -->
<div id="product_images{{@$product->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('home.product_images')</h4>
            </div>
            <div class="modal-body">

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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
            </div>
        </div>

    </div>
</div>
