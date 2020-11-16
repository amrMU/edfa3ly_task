
@if($product->offers_type == 'percent')
<h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
    <i class="icon-percent"></i>
   @lang('home.discount') {{$product->percent}} 🔥 	🥳

</h2> <br>
@elseif($product->offers_type == 'pieces')
    <h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
      @lang('home.sell')  {{@$product->paid_pieces}} @lang('home.and_get')  {{@$product->free_pieces}} @lang('home.free') 🔥 	🥳
    </h2> <br>
@else


@endif
