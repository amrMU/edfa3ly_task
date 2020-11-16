
<a  data-toggle="modal" data-target="#open_cart<?php echo e(@$product->id); ?>" class="btn bg-blue legitRipple">
    <i class="icon-cart position-left"></i>
    <?php echo app('translator')->getFromJson('home.add_to_cart'); ?>
</a>

<!-- Modal -->
<div id="open_cart<?php echo e(@$product->id); ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/add/cart/'.$product->id); ?>" method="post">
            <?php echo csrf_field(); ?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></h4>
            </div>
            <div class="modal-body">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php if($product->offers_type == 'pieces'): ?>
                        <button class="btn btn-grey btn-sm" id="getOffer" type="button"> <?php echo app('translator')->getFromJson('home.get_offer'); ?></button>

                        <?php endif; ?>
                            <?php echo $__env->make('front.products.in_offer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="form-group has-feedback has-feedback-left">
                            <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.quantity'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                            <div class="col-lg-9">
                                <input type="number" name="quantity" id="quantity" class="form-control input-xlg" placeholder="1" value="<?php echo e(Request::old('quantity')); ?>" min="1" required>
                                <div class="form-control-feedback">
                                    <i class="icon-cart"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
                <button type="submit" class="btn btn-info"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></button>
            </div>
        </div>
        </form>

    </div>
</div>
