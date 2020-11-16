<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#"><i class="icon-cart"></i> <?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a></li>
            <li><a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/product/'.str_replace(' ','_',$product->name_en).'/'.$product->id.'?cur='.\App\Helpers\DoFire::getCurrentCurrency()); ?>"><i class="icon-info3"></i> <?php echo app('translator')->getFromJson('home.show'); ?></a></li>
        </ul>
    </li>
</ul>
