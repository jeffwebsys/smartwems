
@extends('layouts.app')
@section('content')
@section('title','Procurement Request')


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    {{-- <a class="btn btn-primary mb-2 mr-2" href="javascript:void(0)" id="createNewuser"><i data-feather="plus-circle"></i> Add user</a> --}}
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
                        <th>Attachments</th> 
                        <th>Action</th> 
                    
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                {{-- <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>user</th>
                        <th>Action</th>
                         
                       
                    </tr>
                </thead> --}}
            </table>
        </div>
    </div>
</div>
   



{{-- Assign Modal --}}
<div class="modal fade" id="userAssign" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Notify Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="userAssign" name="userAssign" class="simple-example" action="javascript:void(0);" required>
                    <div id="validation-errors"></div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <h3 style="font-size: 16px;"><strong>Supplier details:</strong> </h3>
                     <select name="supplier" id="supplier" class="form-control">
                        @foreach($user as $user)
                         <option value="{{ $user->id }}">{{ $user->name }}</option>
                         @endforeach
                       
                     </select>
                           
                        </div>
                    </div>
                  
               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary" id="userSave">Send</button>
                    </div>
                    
            </div>
          
        </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/swal.js') }}"></script>
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
        ajax: "{{ route('supplier.procurement') }}",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: "id", name: "id" },
                { data: "created_at", name: "created_at" },
                { data: "equip_name", name: "equip_name" },
                { data: "request_origin", name: "request_origin" },
                { data: "request_by", name: "request_by" },
                { data: "status", name: "status" },
                { data: "assign", name: "assign" },
                { data: "action", name: "action" },
               
    
            // { data: "action", name: "action", orderable: false, searchable: false },
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
        var ticket_id = $(this).data("id");
        var equipment_id = $(this).closest('tr').find('td:eq(0)').text(); // amend the index as needed
        // var ticket_id 
        $.get("{{ route('maintenancestaff.pending') }}" + "/" + ticket_id + "/edit", function (data) {
            // $("#userName").html(data.name);
            $("#userSave").val("edit-user");
            $("#ticket_id").val(ticket_id);
            $("#equipment_id").val(equipment_id);
            $("#userAssign").modal("show");
        });
    });
   
    // User Assign
    if ($("#userAssign").length > 0) {
        $("#userAssign").validate({
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
                var equipment_id = $("#equipment_id").val();
                var ticket_id =  $("#ticket_id").val();
                var remarks =  $("textarea#t_name").val();
                $(".submit").attr("disabled", true);
                $.ajax({
                    data:{ equipment_id: equipment_id, ticket_id: ticket_id, remarks: remarks  },
                    url: "{{ route('maintenancestaff.pending.store') }}",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#userAssign").trigger("reset");
                        $("#userAssign").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Ticket Updated Successfully!",
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
  
@endpush