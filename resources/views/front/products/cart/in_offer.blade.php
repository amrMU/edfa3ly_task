
@if($item->offers_type == 'percent')
    <h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
        <i class="icon-percent"></i>
        @lang('home.discount') {{$item->percent}} 🔥 	🥳
         {{$item->price- $item->percent / 100}} instead of <del>{{$item->price}}</del>

    </h2> <br>
@elseif($item->offers_type == 'pieces')
    <h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
        @lang('home.sell')  {{@$item->paid_pieces}} @lang('home.and_get')  {{@$item->free_pieces}} @lang('home.free') 🔥 	🥳
    </h2> <br>
@else
    <br>

@endif
