
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-default " data-toggle="modal" data-target="#product_images<?php echo e(@$product->id); ?>">
    <img src="<?php echo e(asset('/uploads/images/products/50x50/'.$product->images->first()->image)); ?>" width="50" height="50" class="img-responsive" alt="<?php echo e(@$product->name); ?>">
</button>


<!-- Modal -->
<div id="product_images<?php echo e(@$product->id); ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.product_images'); ?></h4>
            </div>
            <div class="modal-body">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item <?php if($loop->first): ?> active <?php endif; ?>  ">
                                <img src="<?php echo e(asset('/uploads/images/products/org/'.@$image->image)); ?>" alt="Los Angeles">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
            </div>
        </div>

    </div>
</div>
