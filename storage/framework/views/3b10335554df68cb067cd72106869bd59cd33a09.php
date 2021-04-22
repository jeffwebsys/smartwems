
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Ticket Updates'); ?>
<div id="timelineImages" class="col-lg-12 layout-spacing">
   
    <div class="statbox widget box box-shadow">
       <div class="widget-header">
           <div class="row">
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                   <h4>Ticket Logs History </h4>
               </div>
           </div>
       </div>
      
       <div class="widget-content widget-content-area">
           <div class="mt-container mx-auto">
               <div class="timeline-alter">

                <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <div class="item-timeline">
                       <div class="t-time"> 
                           <p class="" style="font-weight: 900">Remarks: <?php echo e($t->description); ?></p>
                       </div>
                       <div class="t-usr-txt">
                           <p><span></span></p>
                       </div>
                       <div class="t-meta-time">
                           <p class="">Time: <?php echo e(date('F j, Y, g:i a', strtotime($t->created_at))); ?></p>
                       </div>
                       
                       <div class="t-text">
                           <p>Action Taken By: <?php echo e($t->logs); ?></p>
                       </div>
                   </div>
                   <hr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <p>No Logs at the moment</p>
                   <?php endif; ?>
               </div>
           </div>
           <?php echo e($history->links()); ?>

       </div>
      
   </div>
   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/supplier/main/history.blade.php ENDPATH**/ ?>