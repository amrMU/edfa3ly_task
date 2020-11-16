<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#checkoutOrder<?php echo e(@$cart->id); ?>"> <?php echo app('translator')->getFromJson('home.complete_order'); ?> <li class="icon-database-arrow"></li></button>


<!-- Modal -->
<div id="checkoutOrder<?php echo e(@$cart->id); ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/i/checkout/'.$order->id); ?>" method="post">
        <?php echo csrf_field(); ?>
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.complete_order'); ?></h4>
                </div>
                <div class="modal-body">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="form-group has-feedback has-feedback-left">
                                <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.phone'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="phone" class="form-control input-xlg" placeholder="+201061637022" value="<?php echo e(Request::old('phone')); ?>" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-mobile"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.address'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="address" class="form-control input-xlg" placeholder="" value="<?php echo e(Request::old('address')); ?>" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-location3"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
                    <button type="submit" class="btn btn-info"><?php echo app('translator')->getFromJson('home.complete_order'); ?></button>
                </div>
            </div>
        </form>

    </div>
</div>
