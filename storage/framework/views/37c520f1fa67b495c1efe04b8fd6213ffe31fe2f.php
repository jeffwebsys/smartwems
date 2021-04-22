

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Procurement Request'); ?>


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">
            <table class="table table-hover data-table" style="width:100%">
                <thead>
                    <tr>
                       
                        <th>Procurement ID</th>
                        <th>Date Requested</th>
                        <th>Equipment Name</th>
                        <th>Request Origin</th>
                        <th>Request By</th>
                        <th>Status</th>
                        <th>Attach Quotation</th> 
                         <th>Attachment Preview</th> 
                   
                    
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                
            </table>
        </div>
    </div>
</div>
   




<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Attach Quotation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="best" name="best" class="simple-example" action="javascript:void(0);" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                            <div id="validation-errors"></div>
                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                           <input type="hidden" name="procurement_id" id="procurement_id"/>
                           <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image[]" id="image">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                            </div>
                           
                        </div>
                    </div>
                  
               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                
            </div>
        </form>
        </div>
    </div>
</div>



<div class="modal fade" id="test2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Attach Quotation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                test
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    
<?php $__env->stopPush(); ?>
<link href="<?php echo e(asset('assets/css/scrollspyNav.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/file-upload/file-upload-with-preview.min.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/swal.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollspyNav.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/file-upload/file-upload-with-preview.min.js')); ?>"></script>
<script>
var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
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
        ajax: "<?php echo e(route('supplier.procurement')); ?>",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: "id", name: "id" },
                { data: "created_at", name: "created_at" },
                { data: "equip_name", name: "equip_name" },
                { data: "request_origin", name: "request_origin" },
                { data: "request_by", name: "request_by" },
                { data: "status", name: "status" },
                { data: "assign", name: "assign" },
                { data: "file", name: "file" },
              
    
            // { data: "action", name: "action", orderable: false, searchable: false },
        ],
    });
 
    //   assign SRL
    $("body").on("click", ".editUser", function () {
        var ticket_id = $(this).data("id");
        var procurement_id = $(this).closest('tr').find('td:eq(0)').text(); // amend the index as needed
        $('#procurement_id').val(procurement_id);
        // var ticket_id 
        $.get("<?php echo e(route('supplier.procurement')); ?>" + "/" + ticket_id + "/edit", function (data) {
            
            $("#test").modal("show");
        });
    });

    //   View File
    $("body").on("click", ".viewFile", function () {
        var ticket_id = $(this).data("id");
        var procurement_id = $(this).closest('tr').find('td:eq(0)').text(); // amend the index as needed
        $('#procurement_id').val(procurement_id);
        // var ticket_id 
        $.get("<?php echo e(route('supplier.procurement')); ?>" + "/" + ticket_id + "/edit", function (data) {
            
            $("#test2").modal("show");
        });
    });
   
    // User Assign
    if ($("#best").length > 0) {
        $("#best").validate({
            rules: {
                name: "required",
                password: "required",
                email: "required"
            },
            messages: {
                name:  "Please Enter Username",
                password: "Please Enter Password",  
                email: {
                required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                }
            },

            submitHandler: function () {
                //   add data

                var formData = new FormData(document.getElementById("best"));
    
                $(".submit").attr("disabled", true);
                
                $.ajax({
                    data: formData,
                    contentType: false,
                    processData: false,
                    url: "<?php echo e(route('supplier.file.store')); ?>",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#test").trigger("reset");
                        $("#test").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "File Uploaded Successfully!",
                            showConfirmButton: false,
                            timer: 3500,
                        });
                        table.draw();
                    },
                    error:function (response){
                    $.each(response.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="alert alert-gradient mb-4">' +error+ '</span>')
                        $('.alert').delay(3000).fadeOut();
                    })
                }
                });

                //end scripts
            },
        });
    }
   
});

 
  </script>
  
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\capstone2\resources\views/supplier/main/procurement.blade.php ENDPATH**/ ?>