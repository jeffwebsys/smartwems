
@extends('layouts.app')
@section('content')
@section('title','user')


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <a class="btn btn-primary mb-2 mr-2" href="javascript:void(0)" id="createNewuser"><i data-feather="plus-circle"></i> Add Account Type</a>
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">
            <table class="table table-hover data-table" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Registered Date</th>
                        <th>Email</th>
                        <th>User Role</th>
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
   


{{-- Modal --}}
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Add User Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm" class="simple-example" action="javascript:void(0);" required>
                    <input type="hidden" name="user_id" id="user_id">
                    <div id="validation-errors"></div>
                    <div class="form-row">
                        <div class="col-md-6 mb-4">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
                            <br><label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" value="" required>
                         <br><label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="" required>
                           
                           
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="usertype">Account Type</label>
                            <select class="form-control" name="user_type">
                                <option value="2">Supervisor</option>
                                <option value="3">Maintenance Staff</option>
                                <option value="4">Staff</option>
                                <option value="5">Supply Officer</option>
                                <option value="6">Supplier</option>
                            </select><br>
                            <label for="usertype">Lock Out</label>
                             <select class="form-control" name="banned_until">
                                <option value="">None</option>
                                 <option value="7">7 Days</option>
                                <option value="15">15 Days</option>
                                <option value="30">30 days</option>
                            </select><br>
                        </div>
                    </div>
                  
               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary" id="userSave">Save</button>
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
        ajax: "{{ route('admin.users') }}",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: "name", name: "name" },
            { data: "date", name: "date" },
            { data: "email", name: "email" },
            { data: "user_type", name: "user_type" },
            { data: "action", name: "action", orderable: false, searchable: false },
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
    //   edit
    $("body").on("click", ".editUser", function () {
        var user_id = $(this).data("id");
        $.get("{{ route('admin.users') }}" + "/" + user_id + "/edit", function (data) {
            $("#userHeading").html("Edit user");
            $("#userSave").val("edit-user");
            $("#userModal").modal("show");
            $("#user_id").val(data.id);
            $("#name").val(data.name);
            // $("#password").val(data.password);
            $("#email").val(data.email);
            $("#user_type").val(data.user_type);
        });
    });
    if ($("#userForm").length > 0) {
        $("#userForm").validate({
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
                $(".submit").attr("disabled", true);
                $.ajax({
                    data: $("#userForm").serialize(),
                    url: "{{ route('admin.users.store') }}",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#userForm").trigger("reset");
                        $("#userModal").modal("hide");
                        $("#municipalityModal").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Data added Successfully!",
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
                        url: "{{ route('admin.users.store') }}" + "/" + user_id,
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
  
@endpush