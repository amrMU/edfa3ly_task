<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          <?php echo app('translator')->getFromJson('home.home'); ?> -  <?php echo app('translator')->getFromJson('home.products'); ?> - <?php echo e(@$product->$name); ?> </span> </h4>
                </div>

                <div class="heading-elements">
                    <div class="heading-btn-group">
                     </div>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(URL::to('ar?cur=usd')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                    <li class="active">  <?php echo e(@$product->$name); ?></li>
                </ul>

                <ul class="breadcrumb-elements">

                </ul>
            </div>
        </div>
        <!-- /page header -->

        <div class="content">
    <div class="container-detached">
    <div class="content-detached">

        <!-- Details -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="media stack-media-on-mobile text-left content-group-lg">


                    <div class="media-body">
                        <h5 class="media-heading text-semibold"><?php echo e(@$product->$name); ?></h5><?php echo $__env->make('front.products.in_offer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <ul class="list-inline list-inline-separate text-muted no-margin">
                            <li><?php echo e(@$product->category->$name); ?></li>
                            <li><?php echo e(@Carbon\Carbon::parse($product->created_at)->diffForHumans()); ?></li>
                            <li>
                                <?php echo e(@$product->price . ' ' . trans('home.'.$product->currency)); ?>

                            </li>
                        </ul>
                    </div>

                    <div class="media-right media-middle text-nowrap">
                    <?php echo $__env->make('front.products.cart.add_to_cart_model', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="content-group-lg">

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


                    <?php echo @$product->$content; ?>

                </div>




            </div>
        </div>
        <!-- /details -->




    </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
    <script>
        $('#getOffer').on('click',function (){
            $('#quantity').val("<?php echo e(@$product->paid_pieces + @$product->free_pieces); ?>");
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>