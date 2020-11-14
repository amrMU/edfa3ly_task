<?php $__env->startSection('content'); ?>
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"><?php echo app('translator')->getFromJson('home.categories'); ?></span> - <?php echo app('translator')->getFromJson('home.dashboard'); ?></h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                        <li class="active"><?php echo app('translator')->getFromJson('home.update_info'); ?></li>
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
                    <div class="panel panel-flat col-md-10">
                        <div class="panel-heading">
                            <h5 class="panel-title"><?php echo app('translator')->getFromJson('home.create_users'); ?></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="post" action="<?php echo e(route('products.update',$product)); ?>" enctype='multipart/form-data'  >
                            <input name="_method" type="hidden" value="PUT">
                            <input name="use" type="hidden" value="<?php echo e(@$product->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo e($error); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.edit_product'); ?></legend>
                                    <!-- choose category input -->
                                    <div class="form-group" id="">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.main_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="form-control" >
                                                <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(@$category->id); ?>" <?php if($product->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e((App::isLocale('en')  ? @$category->name_en : @$category->name_ar)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /choose category input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.name_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_ar" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.name_ar'); ?>" value="<?php echo e(@$product->name_ar); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.name_en'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_en" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.name_en'); ?>" value="<?php echo e($product->name_en); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->

                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.prices'); ?></legend>
                                    
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.egp_price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="egp_price" class="form-control input-xlg" placeholder="1050" value="<?php echo e(@$product->prices->where('currency','L.E')->first()->price); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    
                                    <div class="form-group has-feedback has-feedback-left">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.usd_price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="usd_price" class="form-control input-xlg" placeholder="68"  value="<?php echo e(@$product->prices->where('currency','USD')->first()->price); ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-coin-dollar"></i>
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
                                            <textarea name="content_ar" id="editor-full" rows="4" cols="4"><?php echo @$product->content_ar; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /content ar input -->
                                    <!-- content en input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_en'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea name="content_en" id="editor-full-copy" rows="4" cols="4"><?php echo @$product->content_en; ?></textarea>
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
                    <div class="col-md-2">
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

            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>