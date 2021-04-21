<?php $__env->startComponent('mail::message'); ?>
# Hello,

Greetings! Ticket ID: <?php echo e($ticket); ?> is successfully assigned to one of our maintenance staff <br> please keep this record for your reference.<br>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\capstone2\resources\views/emails/assign.blade.php ENDPATH**/ ?>