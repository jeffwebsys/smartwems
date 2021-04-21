

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Assigned Maintenance Staff'); ?>


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">
            <table class="table table-hover data-table" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>Ticket ID</th>
                        <th>Equipment Name</th>
                        <th>Requested By</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                
            </table>
        </div>
    </div>
</div>
   




<div class="modal fade" id="userAssign" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Assign Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="userAssign" name="userAssign" class="simple-example" action="javascript:void(0);" required>
                    <div id="validation-errors"></div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <h3 style="font-size: 16px;"><strong>Ticket ID:</strong> <span id="ticks"></span></h3>
                            <input type="hidden" name="equipment_id" id="equipment_id" class="form-control">
                            <input type="hidden" name="ticket_id" id="ticket_id" class="form-control">
                             <input type="hidden" name="staff_name" id="staff_name" class="form-control">
                            <select class="form-control" name="user_id" id="user_id">
                                <?php 
                               $staff = App\User::role(3)->get();
                                ?>
                                <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($staf->id); ?>"><?php echo e($staf->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </select>
                           
                           
                        </div>
                        
                    </div>
                  
               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary" id="userSave">Assign</button>
                    </div>
                    
            </div>
          
        </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/swal.js')); ?>"></script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    var table = $(".data-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('supervisor.stafflist')); ?>",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: "id", name: "id" },
            { data: "item_name", name: "item_name" },
            { data: "name", name: "name" },
            { data: "status", name: "status" },
            { data: "reason", name: "reason" },
            { data: "assign", name: "assign", orderable: false, searchable: false },
        ],
    });
    // Add user
    $("#createNewuser").click(function () {
        $("#userSave").val("create-product");
        $("#user_id").val("");
        $("#userForm").trigger("reset");
        $("#userHeading").html("E-quipment");
        $("#userModal").modal("show");
    });
    //   assign SRL
    $("body").on("click", ".editUser", function () {
        var val = $(this).closest('tr').find('td:eq(2)').text(); // amend the index as needed
        var ticket_id = $(this).data("id");

        $.get("<?php echo e(route('supervisor.stafflist')); ?>" + "/" + ticket_id + "/edit", function (data) {
            // $("#userName").html(data.name);
            $("#userSave").val("edit-user");
            $("#ticket_id").val(ticket_id);
            $("#ticks").html(ticket_id);
            $("#equipment_id").val(data.equipment_id);
            $("#staff_name").val(val);
            $("#userAssign").modal("show");
        });
    });

    // User Assign
    if ($("#userAssign").length > 0) {
        $("#userAssign").validate({
            rules: {
                name: "required",
                password: "required",
                email: "required",
            },
            messages: {
                name: "Please Enter Username",
                password: "Please Enter Password",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com",
                },
            },

            submitHandler: function () {
                //   add data
                $(".submit").attr("disabled", true);
                //   add data
                var user_id = $("#user_id").val();
                var ticket_id = $("#ticket_id").val();
                var equipment_id = $("#equipment_id").val();
                var staff_name = $("#staff_name").val();

                $(".submit").attr("disabled", true);
                $.ajax({
                    data: { user_id: user_id, ticket_id: ticket_id, equipment_id: equipment_id, staff_name: staff_name },
                    url: "<?php echo e(route('supervisor.stafflist.store')); ?>",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#userForm").trigger("reset");
                        $("#userAssign").modal("hide");
                        $("#municipalityModal").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Assigned Successfully!",
                            showConfirmButton: false,
                            timer: 3500,
                        });
                          table.draw();
                    },
                });
            },
        });
    }

    //  Delete User Role
    $("body").on("click", ".deleteUser", function () {
        var user_id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");

                {
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('supervisor.stafflist.store')); ?>" + "/" + user_id,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log("Error:", data);
                        },
                    });
                }
            }
        });
    });
});


 
  </script>
  
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/supervisor/main/stafflist.blade.php ENDPATH**/ ?>