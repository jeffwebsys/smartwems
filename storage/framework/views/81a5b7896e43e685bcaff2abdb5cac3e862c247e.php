<?php $__env->startComponent('mail::message'); ?>
<?php if($name2): ?>
# Hello <?php echo e($name2); ?>, 
<?php else: ?>
# Hello <?php echo e($name); ?>,  
<?php endif; ?>

<?php if($name2): ?>
Greetings! You have one assigned ticket please have a look! <br> Ticket ID: <?php echo e($ticket); ?> <br> please keep this record for your reference.<br>
<?php else: ?>
Greetings! Ticket successfully assigned to one of our maintenance team! <br> Ticket ID: <?php echo e($ticket); ?> <br> please keep this record for your reference.<br>
<?php endif; ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\capstone2\resources\views/emails/staff.blade.php ENDPATH**/ ?>