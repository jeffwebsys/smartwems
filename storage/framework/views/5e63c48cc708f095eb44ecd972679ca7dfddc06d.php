<?php $__env->startComponent('mail::message'); ?>
# Hello smartwems user,

Supply Officer Update: <?php echo e($report->report); ?> 
<br> 
Procurement ID: <?php echo e($procurement); ?> 
please keep this record for your reference.<br>

This is system generated email - SmartWEM Bot.


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\xampp\htdocs\capstone2\resources\views/emails/report.blade.php ENDPATH**/ ?>