<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                          <?php echo app('translator')->getFromJson('home.home'); ?> -  <?php echo app('translator')->getFromJson('home.orders_list'); ?> </span> </h4>
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
                    <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'admin/orders')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                    <li class="active"> <?php echo app('translator')->getFromJson('home.orders_list'); ?> </li>
                </ul>

                <ul class="breadcrumb-elements">

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
                            <h6 class="panel-title"><?php echo app('translator')->getFromJson('home.orders_list'); ?></h6>
                            <div class="heading-elements">

                            </div>
                        </div>
                        <!-- table reports -->
                        <div class="table-responsive">
                            <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-danger alert-dismissible" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e($error); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <table class="table text-nowrap">
                                <thead>
                                <tr>

                                    <th class="col-md-2">#</th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.status'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.items'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.total_price'); ?></th>
                                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.since'); ?></th>
                                    <th class="col-md-2"><i class="icon-menu-open2"></i></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if($orders->count() > 0): ?>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><span class="text-muted"><?php echo e(@$order->id); ?></span></td>
                                            <td><span class="text-muted"><?php echo app('translator')->getFromJson('home.'.@$order->status); ?></span></td>
                                            <td><h6 class="text-success-600"><?php echo $__env->make('front.orders.items', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></h6></td>
                                            <td><h6 class="text-success-600"><?php echo e(@$order->total_price . ' ' . trans('home.'.$order->currency)); ?></h6></td>
                                            <td><h6 class="text-semibold"><?php echo e(@Carbon\Carbon::parse($order->created_at)->diffForHumans()); ?></h6></td>
                                            <td>
                                                <?php echo $__env->make('dashboard.orders.actions', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th colspan="8" class="text-center"><?php echo e($orders->links()); ?></th>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <th colspan="8" class="text-center"> <?php echo app('translator')->getFromJson('home.empty_list'); ?> </th>
                                </tr>
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

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>