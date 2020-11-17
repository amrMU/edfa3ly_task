<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            @if($order->status == 'pending')
            <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/in-progress/'.$order->id}}"><i class="icon-stack-check"></i> @lang('home.accept')</a></li>
            <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id}}"><i class="icon-stack-cancel"></i> @lang('home.reject')</a></li>
            @elseif($order->status == 'in_progress')
                <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/accept/'.$order->id}}"><i class="icon-stack-check"></i> @lang('home.accept')</a></li>
                <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id}}"><i class="icon-stack-cancel"></i> @lang('home.reject')</a></li>

            @elseif($order->status == 'accept')
                <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/deliverd/'.$order->id}}"><i class="icon-stack-check"></i> @lang('home.deliverd')</a></li>
                <li><a href="{{url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id}}"><i class="icon-stack-cancel"></i> @lang('home.reject')</a></li>
            @elseif($order->status == 'reject')
                <h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
                    {{$order->status}}

                </h2>
            @else
                <h2 class="label @if(LaravelLocalization::getCurrentLocale() == 'en') border-right-grey @else border-left-grey @endif label-striped ">
                   {{$order->status}} 🔥 	🥳

                </h2>
            @endif
        </ul>
    </li>
</ul>
