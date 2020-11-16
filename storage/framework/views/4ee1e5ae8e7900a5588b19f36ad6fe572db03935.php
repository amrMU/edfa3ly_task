
<?php if($item->offers_type == 'percent'): ?>
    <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
        <i class="icon-percent"></i>
        <?php echo app('translator')->getFromJson('home.discount'); ?> <?php echo e($item->percent); ?> 🔥 	🥳
         <?php echo e($item->price- $item->percent / 100); ?> instead of <del><?php echo e($item->price); ?></del>

    </h2> <br>
<?php elseif($item->offers_type == 'pieces'): ?>
    <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
        <?php echo app('translator')->getFromJson('home.sell'); ?>  <?php echo e(@$item->paid_pieces); ?> <?php echo app('translator')->getFromJson('home.and_get'); ?>  <?php echo e(@$item->free_pieces); ?> <?php echo app('translator')->getFromJson('home.free'); ?> 🔥 	🥳
    </h2> <br>
<?php else: ?>
    <br>

<?php endif; ?>
