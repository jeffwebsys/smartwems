<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e(auth()->user()->name); ?>,

Greetings! The system automatically recorded your request This is Your Ticket ID: <?php echo e($ticket->id); ?> please keep this record for your reference.<br>
Reason: <?php echo e($reason); ?>



Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\capstone2\resources\views/emails/hello.blade.php ENDPATH**/ ?>