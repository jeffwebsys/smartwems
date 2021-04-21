
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Equipment Information'); ?>

<div class="layout-px-spacing">                
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" class="section general-info">
                                        <div class="info">
                                               <?php if(Session::has('message')): ?>
                                                <span class="badge badge-secondary ml-2 mb-4"> <?php echo e(Session::get('message')); ?> </span>
                                                <?php endif; ?>
                                            <h6 class="">Equipment Information</h6>
                                            <div class="row">
                                                
                                            
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <div class="avatar avatar-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label style="color: black;"><strong>Equipment Name</strong></label>
                                                                            <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="<?php echo e($equipment->item_name); ?>" disabled style="color: black">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label style="color: black;"><strong> Equipment QR Code </label></label><br>
                                                                        <?php
                                                                        use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                                                        $qrcode = url("staff/equipmentview/$equipment->id");
                                                                        $qr = Qrcode::size(100)
                                                                        ->backgroundColor(255, 0, 0, 25)
                                                                        ->generate($qrcode);

                                                                        echo $qr;
                                                                        ?>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-4">                                                       
                                                          <span class="badge badge-primary"> <?php echo e($equipment->eqcategory->title); ?> </span> 
                                                          <span class="badge badge-success"> <?php echo e($equipment->eqcategory->description); ?></span> 
                                                          
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                 <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="editProc" name="editProc" class="section work-experience" action="<?php echo e(route('staff.submitTicket')); ?>" method="POST" required>
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="info">
                                            <h5 class="">Equipment Data</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-2">
                                                   
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="work-section">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <input type="text" name="equipment_id" value="<?php echo e($equipment->id); ?>" hidden>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree3">Equipment Status</label><br>
                                                                               <?php echo $equipment->EquipmentStatus; ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree4">Equipment Location</label>
                                                                            <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->eqlocation->title); ?>" disabled style="color: black">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Serial No. / Model No.</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->serial_no); ?>" disabled style="color: black">
                
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->model_no); ?>" disabled style="color: black">
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Next PM / Last PM</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->next_pm); ?>" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->last_pm); ?>" disabled style="color: black">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Acquisition Date / Unit Cost</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->ac_date); ?>" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="PHP <?php echo e($equipment->unit_cost); ?>" disabled style="color: black">
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Responsible Personnel / Equipment Logged Date</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->res_personnel); ?>" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="<?php echo e($equipment->created_at); ?>" disabled style="color: black">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="col-md-12">
                                                                <?php if(($equipment->status == 2)): ?>
                                                                <span class="badge badge-secondary ml-2 mb-4"> Ticket is On Progress </span>
                                                                <?php elseif($equipment->status == 3): ?>
                                                                <span class="badge badge-secondary ml-2 mb-4"> Your Ticket is Already Assigned to One Of Maintenance Staff</span>
                                                                <?php elseif($equipment->status == 4): ?>
                                                                <span class="badge badge-secondary ml-2 mb-4"> Your Ticket is For Approval</span>
                                                                <?php elseif($equipment->status == 5): ?>
                                                                <span class="badge badge-secondary ml-2 mb-4"> Your Ticket is Marked as Complete</span>
                                                                <?php else: ?>
                                                                <label>Ticket Remarks</label>
                                                                <textarea class="form-control" placeholder="Please Enter Detail" name="equipment_remarks" rows="2" value="" style="color: black" required></textarea>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                   
                                </div> 

                            </div>
                        </div>
                    </div>s

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">
                            <button  type="submit" class="btn btn-primary" <?php echo e(($equipment->status >= 2 )  ? 'disabled' : ''); ?>> Submit Ticket</button>
                            <div class="blockui-growl-message">
                                <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                            </div>
                            

                        </div>
                    </form>

                    </div>
                </div>

            </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/dropify/dropify.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/users/account-setting.css')); ?>"/>  
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/swal.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/dropify/dropify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/blockui/jquery.blockUI.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/users/account-settings.js')); ?>"></script>
    <script>
   
   $("form#editProc").submit(function (e) {
       e.preventDefault();
      
    var form = this;
    e.preventDefault();
    
    setTimeout(function () {
        form.submit();
    }, 3000); // in milliseconds
    Swal.fire({
        position: "center",
        icon: "info",
        title: "Requesting...",
        showConfirmButton: false,
        timer: 3000,
    });

});
 

 </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/staff/main/equipmentview.blade.php ENDPATH**/ ?>