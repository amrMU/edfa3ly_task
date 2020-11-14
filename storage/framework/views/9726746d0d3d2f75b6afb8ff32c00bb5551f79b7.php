
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#Prices<?php echo e(@$product->id); ?>">
    <i class="icon-coin-dollar"></i>
</button>


<!-- Modal -->
<div id="Prices<?php echo e(@$product->id); ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.product_prices'); ?></h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">

                    <tbod>
                        <?php $__currentLoopData = $product->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e(@$price->currency); ?></th>
                                <td><?php echo e(@$price->price); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbod>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
            </div>
        </div>

    </div>
</div>
