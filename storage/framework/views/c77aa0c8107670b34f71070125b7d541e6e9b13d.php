<?php $__env->startSection('content'); ?>
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"><?php echo app('translator')->getFromJson('home.create_products'); ?></span> - <?php echo app('translator')->getFromJson('home.dashboard'); ?></h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                        <li class="active"><?php echo app('translator')->getFromJson('home.create_products'); ?></li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                <?php echo app('translator')->getFromJson('home.settings'); ?>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="<?php echo e(URL::to('ar/admin/setting')); ?>"><i class="icon-gear"></i><?php echo app('translator')->getFromJson('home.settings'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

             <!-- Content area -->
            <div class="content">
                <!-- Form validation -->
                    <div class="panel panel-flat col-md-12">


                        <div class="panel-heading">


                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="POST" action="<?php echo e(URL::to('/admin/products')); ?>" enctype='multipart/form-data'>
                                <?php echo csrf_field(); ?>
                                <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e($error); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.create_products'); ?></legend>
                                    <!-- choose category input -->
                                    <div class="form-group" id="">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.main_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="form-control" >
                                                <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$category->id); ?>"><?php echo e((App::isLocale('en')  ? @$category->name_en : @$category->name_ar)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /choose category input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.name_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_ar" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.name_ar'); ?>" value="<?php echo e(Request::old('name_ar')); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.name_en'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_en" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.name_en'); ?>" value="<?php echo e(Request::old('name_en')); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.prices'); ?></legend>
                                    
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.egp_price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="egp_price" class="form-control input-xlg" placeholder="1050" value="<?php echo e(Request::old('egp_price')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.tax'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="egp_tax" class="form-control input-xlg" placeholder="14" value="<?php echo e(Request::old('egp_tax')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-percent"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.total_tax'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="egp_total_tax" class="form-control input-xlg" placeholder="17" value="<?php echo e(Request::old('egp_tax')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.usd_price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="usd_price" class="form-control input-xlg" placeholder="68"  value="<?php echo e(Request::old('usd_price')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.tax'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="usd_tax" class="form-control input-xlg" placeholder="14" value="<?php echo e(Request::old('egp_tax')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-percent"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.total_tax'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="usd_total_tax" class="form-control input-xlg" placeholder="17" value="<?php echo e(Request::old('egp_tax')); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-percent"></i>
                                            </div>
                                        </div>
                                    </div>
                                
                                <legend class="text-bold"><?php echo app('translator')->getFromJson('home.notes'); ?></legend>
                                    <h2 class="label <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-warning ">Important</h2> <br>
                                    <h4 class="label  <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped">1- Offers none just select none</h4> <br>
                                    <h4 class="label  <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped">2- Offers Pieces Ex sell 2 Opposite 1 Free  </h4> <br>
                                    <h4 class="label  <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> border-right-grey <?php else: ?> border-left-grey <?php endif; ?> label-striped">3- Offers percent just write percent ex: 1 application will handel percent (%)  </h4> <br>

                                    
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.available_offers'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-sm-3">
                                            <label for="available_offers">
                                                <input type="radio" name="available_offers" class="available_offers"  value="pieces" >
                                                <?php echo app('translator')->getFromJson('home.pieces'); ?>
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="available_offers">
                                                <input type="radio" name="available_offers" class="available_offers" value="percent" >
                                                  <?php echo app('translator')->getFromJson('home.percent'); ?>
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="available_offers">
                                                <input type="radio" name="available_offers" class="available_offers" value="none" checked>
                                                <?php echo app('translator')->getFromJson('home.none'); ?>
                                            </label>
                                        </div>
                                    </div>
                                
                                
                                    <div class="form-group has-feedback has-feedback-left pieces-offers">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.pieces'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-4">

                                            <input type="text" name="paid_pieces" class="form-control input-xlg" placeholder="2" value="<?php echo e(Request::old('paid_pieces')); ?>">
                                            <div class="form-control-feedback " >
                                                <?php echo app('translator')->getFromJson('home.count'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">

                                            <input type="text" name="free_pieces" class="form-control input-xlg" placeholder="1" value="<?php echo e(Request::old('free_pieces')); ?>">
                                            <div class="form-control-feedback " >
                                                <?php echo app('translator')->getFromJson('home.opposite'); ?>
                                            </div>
                                        </div>
                                    </div>
                                

                                
                                    <div class="form-group has-feedback has-feedback-left percent-offers">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.percent'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="percent" class="form-control input-xlg" placeholder="17" value="<?php echo e(Request::old('percent')); ?>">
                                            <div class="form-control-feedback">
                                                <li class="icon-percent"></li>
                                            </div>
                                        </div>

                                    </div>
                                
                                    <!-- Logo uploader -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.images'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="images[]" multiple class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /Logo uploader -->
                                    <!-- content ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea name="content_ar" id="editor-full" rows="4" cols="4"></textarea>
                                        </div>
                                    </div>
                                    <!-- /content ar input -->
                                    <!-- content en input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_en'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea name="content_en" id="editor-full-copy" rows="4" cols="4"></textarea>
                                        </div>
                                    </div>
                                    <!-- /content en input -->

                                </fieldset>
                                


                                <div class="text-right">
                                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->


            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsCode'); ?>
    <script>
    $('.pieces-offers').hide();
    $('.percent-offers').hide();
    $('.available_offers').click(function(){
       current_offer  = $(this).val();
       if (current_offer == 'pieces'){
           $('.pieces-offers').show();
           $('.percent-offers').hide();
       }else if(current_offer == 'percent'){
           $('.pieces-offers').hide();
           $('.percent-offers').show();
       }else{
           $('.pieces-offers').hide();
           $('.percent-offers').hide();
       }
    });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>