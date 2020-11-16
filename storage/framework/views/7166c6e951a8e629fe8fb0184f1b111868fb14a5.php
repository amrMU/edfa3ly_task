
<?php if($product->offers_type == 'percent'): ?>
<h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
    <i class="icon-percent"></i>
   <?php echo app('translator')->getFromJson('home.discount'); ?> <?php echo e($product->percent); ?> 🔥 	🥳

</h2> <br>
<?php elseif($product->offers_type == 'pieces'): ?>
    <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped ">
      <?php echo app('translator')->getFromJson('home.sell'); ?>  <?php echo e(@$product->paid_pieces); ?> <?php echo app('translator')->getFromJson('home.and_get'); ?>  <?php echo e(@$product->free_pieces); ?> <?php echo app('translator')->getFromJson('home.free'); ?> 🔥 	🥳
    </h2> <br>
<?php else: ?>


<?php endif; ?>
