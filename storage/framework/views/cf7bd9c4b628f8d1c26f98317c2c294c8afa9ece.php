
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Ticket Updates'); ?>

<div class="layout-px-spacing">   
    <?php if(Session::has('message')): ?>
    <span class="badge badge-secondary ml-2 mb-4"> <?php echo e(Session::get('message')); ?> </span>
    <?php endif; ?>             
    <div class="row analytics"> 
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 col-12 layout-spacing">      
                        <div class="widget widget-card-one">
                            <div class="widget-content">
                               
                                <div class="media">
                                    <form id="complete" action="<?php echo e(route('supervisor.notify.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="w-img">
                                        <img src="<?php echo e(asset('assets/img/90x90.jpg')); ?>" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                    <input type="text" name="equipment_id" value="<?php echo e($ticket->serviceEquipment->id); ?>" hidden>
                                    <input type="text" name="ticket_id" value="<?php echo e($ticket->serviceTicket->id); ?>" hidden>
                                        <h6><?php echo e($ticket->serviceEquipment->item_name); ?></h6>
                                        <p class="meta-date-time"><?php echo e($ticket->serviceTicket->created_at); ?></p>
                                    </div>
                                </div>
                                <p><span style="font-weight: 900">Smart Equipment Ticket Update Tracker: </span> <span class="badge badge-info"> <?php echo e($ticket->serviceUser->name); ?> </span> <i>wrote</i> "<?php echo e($ticket->remarks); ?>" -<i>this is a system automated transaction <?php echo e($ticket->updated_at); ?></i></p>
                                <div class="w-action">
                                    <div class="card-like">
                                        <button type="submit" class="btn btn-primary" <?php echo e(($ticket->serviceEquipment->status == 5 )  ? 'disabled' : ''); ?>><?php echo e(($ticket->serviceEquipment->status == 5 )  ? 'Ticket Completed' : 'Complete Ticket'); ?></button> 
                                    </div>
                                </div>
                            </form>
                            <div class="w-action">
                                <div class="card-like">
                                    <?php if($ticket->serviceEquipment->status == 5): ?>
                                    <form action="<?php echo e(route('supervisor.notify.ticketUpdate')); ?>" method="POST" id="update" style="margin-top: 10px">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="equipment_update" value="<?php echo e($ticket->serviceEquipment->id); ?>" hidden>
                                        <input type="text" name="ticket_update" value="<?php echo e($ticket->serviceTicket->id); ?>" hidden>
                                    <button type="submit" class="btn btn-danger">Re-Open Ticket</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    <?php echo e($data->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/dropify/dropify.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/users/account-setting.css')); ?>"/>  
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('plugins/dropify/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/blockui/jquery.blockUI.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/users/account-settings.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/supervisor/main/notify.blade.php ENDPATH**/ ?>