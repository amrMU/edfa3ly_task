<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          <?php echo app('translator')->getFromJson('home.home'); ?> -  <?php echo app('translator')->getFromJson('home.category'); ?> <?php echo e(@$category->$name); ?> </span> </h4>
                </div>

                <div class="heading-elements">
                    <div class="heading-btn-group">
                        <!-- <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                        <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                        <a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a> -->
                    </div>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                    <li class="active"> <?php echo app('translator')->getFromJson('home.category'); ?> <?php echo e(@$category->$name); ?></li>
                </ul>

                <ul class="breadcrumb-elements">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear position-left"></i>
                            <?php echo app('translator')->getFromJson('home.settings'); ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo e(URL::to('ar/admin/setting')); ?>"><i class="icon-gear"></i><?php echo app('translator')->getFromJson('home.general_settings'); ?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Main charts -->
            <div class="row">
            </div>
            <!-- /main charts -->



            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Marketing campaigns -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title"><?php echo app('translator')->getFromJson('home.products_list'); ?></h6>
                            <div class="heading-elements"></div>
                        </div>
                        <!-- table reports -->
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('home.name'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.price'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.category'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.offer'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.since'); ?></th>
                                    <th class="col-md-2"><i class="icon-menu-open2"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($products->count() > 0): ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="media-left">
                                                <div class=""><a href="#" class="text-default text-semibold"><?php echo e(@$product->$name); ?></a></div>
                                            </div>
                                            <div class="media-left media-middle">
                                                <a href="#">
                                                    <img src="<?php echo e(asset('/uploads/images/products/50x50/'.$product->images->first()->image)); ?>" width="50" height="50" class="img-responsive img-circle img-xs" alt="<?php echo e(@$product->$name); ?>">

                                                </a>
                                            </div>
                                        </td>
                                        <td><span class="text-muted"><?php echo e(@$product->price . ' ' . trans('home.'.$product->currency)); ?></span></td>
                                        <td><span class="text-success-600">
                                                <a href="<?php echo e(url(LaravelLocalization::getCurrentLocale()).'/category/'.str_replace(' ','_',$product->category->name_en).'/'.$product->category_id.'?cur='.\App\Helpers\DoFire::getCurrentCurrency()); ?>"><?php echo e(@$product->category->$name); ?></a>
                                            </span></td>
                                        <td>
                                          <?php echo $__env->make('front.products.in_offer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </td>
                                        <td><h6 class="text-semibold"><?php echo e(@Carbon\Carbon::parse($product->created_at)->diffForHumans()); ?></h6></td>
                                        <td>
                                            <?php echo $__env->make('front.products.actions_list', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <th colspan="8" class="text-center"> <?php echo app('translator')->getFromJson('home.empty_list'); ?> </th>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- table reports -->

                    </div>
                    <!-- /marketing campaigns -->
                </div>

            </div>
            <!-- /dashboard content -->


            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2019. <a href="#">Dashboard Web App Developed By </a>  <a href="https://www.linkedin.com/in/amrmuhamed" target="_blank">Amr Muhamed</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>