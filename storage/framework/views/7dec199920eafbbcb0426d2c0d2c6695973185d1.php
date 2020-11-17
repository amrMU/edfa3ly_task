
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#items<?php echo e(@$order->id); ?>">
    <i class="icon-list-ordered"></i>
</button>


<!-- Modal -->
<div id="items<?php echo e(@$order->id); ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-hover">

                      <tbod>
                          <tr>
                              <td><?php echo app('translator')->getFromJson('home.name'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.tax'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.total_tax'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.price_one_piece'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.quantity'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.in_offer'); ?></td>
                              <td><?php echo app('translator')->getFromJson('home.offer'); ?></td>

                          </tr>
                          <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                  <th><?php echo e(@$item->product->$name); ?></th>
                                  <th>
                                      <?php
                                      $tax = $item->product->price * $item->product->tax / 100;
                                      ?>
                                      <?php echo e(@$tax.trans('home.'.$item->currency)); ?>

                                  </th>
                                  <th>
                                      <?php
                                          $tax_plus = $item->product->price * $item->product->tax_plus / 100;
                                      ?>
                                      <?php echo e(@$tax_plus.trans('home.'.$item->currency)); ?>

                                  </th>
                                  <th>
                                      <?php if($item->offers_type == 'percent'): ?>

                                          <?php
                                             $price_discount = $item->product->price * $item->product->percent / 100 ;
                                             $price = $item->product->price - $price_discount
                                          ?>

                                          <?php echo e(@$price . ' ' . trans('home.'.$item->currency)); ?>

                                      <?php else: ?>
                                          <?php echo e(@$item->price . ' ' . trans('home.'.$item->currency)); ?>


                                      <?php endif; ?>

                                  </th>

                                  <th><?php echo e(@$item->quantity); ?></th>
                                  <th><?php echo e(@$item->offers_type); ?></th>
                                  <th>
                                      <?php echo $__env->make('front.products.cart.in_offer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                  </th>

                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbod>
                  </table>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
            </div>
        </div>

    </div>
</div>
