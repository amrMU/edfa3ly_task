
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#items{{@$order->id}}">
    <i class="icon-list-ordered"></i>
</button>


<!-- Modal -->
<div id="items{{@$order->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-hover">

                      <tbod>
                          <tr>
                              <td>@lang('home.name')</td>
                              <td>@lang('home.tax')</td>
                              <td>@lang('home.total_tax')</td>
                              <td>@lang('home.price_one_piece')</td>
                              <td>@lang('home.quantity')</td>
                              <td>@lang('home.in_offer')</td>
                              <td>@lang('home.offer')</td>

                          </tr>
                          @foreach($order->items as $item)

                              <tr>
                                  <th>{{@$item->product->$name}}</th>
                                  <th>
                                      @php
                                      $tax = $item->product->price * $item->product->tax / 100;
                                      @endphp
                                      {{@$tax.trans('home.'.$item->currency)}}
                                  </th>
                                  <th>
                                      @php
                                          $tax_plus = $item->product->price * $item->product->tax_plus / 100;
                                      @endphp
                                      {{@$tax_plus.trans('home.'.$item->currency)}}
                                  </th>
                                  <th>
                                      @if($item->offers_type == 'percent')

                                          @php
                                             $price_discount = $item->product->price * $item->product->percent / 100 ;
                                             $price = $item->product->price - $price_discount
                                          @endphp

                                          {{ @$price . ' ' . trans('home.'.$item->currency)}}
                                      @else
                                          {{@$item->price . ' ' . trans('home.'.$item->currency)}}

                                      @endif

                                  </th>

                                  <th>{{@$item->quantity}}</th>
                                  <th>{{@$item->offers_type}}</th>
                                  <th>
                                      @include('front.products.cart.in_offer')
                                  </th>

                              </tr>
                          @endforeach
                      </tbod>
                  </table>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
            </div>
        </div>

    </div>
</div>
