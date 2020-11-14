
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#Prices{{@$product->id}}">
    <i class="icon-coin-dollar"></i>
</button>


<!-- Modal -->
<div id="Prices{{@$product->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('home.product_prices')</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">

                    <tbod>
                        @foreach($product->prices as $price)
                            <tr>
                                <th>{{@$price->currency}}</th>
                                <td>{{@$price->price}}</td>
                            </tr>
                        @endforeach
                    </tbod>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
            </div>
        </div>

    </div>
</div>
