<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <?php if($order->status == 'pending'): ?>
            <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/in-progress/'.$order->id); ?>"><i class="icon-stack-check"></i> <?php echo app('translator')->getFromJson('home.accept'); ?></a></li>
            <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id); ?>"><i class="icon-stack-cancel"></i> <?php echo app('translator')->getFromJson('home.reject'); ?></a></li>
            <?php elseif($order->status == 'in_progress'): ?>
                <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/accept/'.$order->id); ?>"><i class="icon-stack-check"></i> <?php echo app('translator')->getFromJson('home.accept'); ?></a></li>
                <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id); ?>"><i class="icon-stack-cancel"></i> <?php echo app('translator')->getFromJson('home.reject'); ?></a></li>

            <?php elseif($order->status == 'accept'): ?>
                <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/deliverd/'.$order->id); ?>"><i class="icon-stack-check"></i> <?php echo app('translator')->getFromJson('home.deliverd'); ?></a></li>
                <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/admin/orders/reject/'.$order->id); ?>"><i class="icon-stack-cancel"></i> <?php echo app('translator')->getFromJson('home.reject'); ?></a></li>
            <?php elseif($order->status == 'reject'): ?>
                <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
                    <?php echo e($order->status); ?>


                </h2>
            <?php else: ?>
                <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
                   <?php echo e($order->status); ?> 🔥 	🥳

                </h2>
            <?php endif; ?>
        </ul>
    </li>
</ul>
