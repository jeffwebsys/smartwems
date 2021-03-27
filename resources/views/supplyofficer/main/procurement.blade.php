
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
                        <th>Equipment Location</th>
                         <th>Request Origin</th>
                        <th>Reason</th>
                        <th>Request By</th>
                         <th>Request ID</th>
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
            <div class="modal-header" style="background: #2f3545">
                <h5 class="modal-title" id="userHeading"  style="color: white;">Notify Supplier</h5>
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
                            <input type="text" name="procurement_id" id="procurement_id" hidden>
                     <select name="supplier_id" id="supplier_id" class="form-control">
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

{{-- Assign Modal --}}
<div class="modal fade" id="editProc" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #2f3545">
                <h5 class="modal-title" id="userHeading" style="color: white;">Purchase Request Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProc" name="editProc" class="simple-example" action="{{ route('supplyofficer.printPdf') }}" method="POST"  target="_blank" required>
                    @csrf
                    <div id="validation-errors"></div>
                    <div class="form-row" style="color: black; font-weight: 900">
                        <input type="text" name="user_id" class="form-control" id="user_id" hidden>
                        <input type="text" name="ticket_id" class="form-control" id="ticket_id" hidden>
                        <input type="text" name="pro_id" class="form-control" id="pro_id" hidden>
                        <input type="text" name="eqid" class="form-control" id="eqid" hidden>
                        <div class="col-md-6 mb-4">
                           
                           <span>Section: </span><span id="loc"></span>
                        </div>

                        <div class="col-md-6 mb-4">
                            <span>Procurement Id No: </span><span id="proc_id"></span>
                           
                        </div>
                    </div>
                    <div class="form-row" style="margin-bottom: 20px; font-weight: 900; color: white; background: #2f3545;">
                    <div class="col">Equipment ID</div>
                    <div class="col">Equipment Name</div>
                    <div class="col">Problem</div>
                    <div class="col">Remarks</div>
                    <div class="col">Required Budget</div>
                    </div>


                    <div class="form-row" style="color: black; font-weight: 900;">
                        <div class="col"><span id="equip_id"></span></div>
                        <div class="col" id="equip_name">Equipment Name</div>
                        <div class="col" id="reason">Description</div>
                        <div class="col"><input type="text" name="remarks" class="form-control" id="remarks" required></div>
                        <div class="col"><input type="text" name="budget" class="form-control" id="budget" required></div>
                    </div>


                    <div class="form-row" style="margin-top: 50px; font-weight: 900; color: white; background: #2f3545;">
                        <div class="col">Requested By: <span id="requested_by"></span></div>

                        <div class="col"  id="approved_by">Approved By: {{ auth()->user()->name }}</div>
                    </div>

               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary" id="userSave">Print</button>
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
        ajax: "{{ route('supplyofficer.procurement') }}",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: "id", name: "id" },
            { data: "created_at", name: "created_at" },
            { data: "equip_name", name: "equip_name" },
            { data: "equip_loc", name: "equip_loc", orderable: false, visible: false },
            { data: "request_origin", name: "request_origin" },
             { data: "reason", name: "reason", orderable: false, visible: false },
            { data: "request_by", name: "request_by" },
             { data: "user_id", name: "user_id" , visible: false},
            { data: "status", name: "status" },
            { data: "assign", name: "assign" },
            { data: "action", name: "action" },

            // { data: "action", name: "action", orderable: false, searchable: false },
        ],
    });

    //   Assign Supplier
    $("body").on("click", ".editUser", function () {
        var procurement_id = $(this).data("id");
        var proc_id = $(this).closest("tr").find("td:eq(0)").text(); // amend the index as needed
        // var ticket_id
        $.get("{{ route('supplyofficer.procurement') }}" + "/" + procurement_id + "/edit", function (data) {
            // $("#userName").html(data.name);
            $("#userSave").val("edit-user");
            $("#procurement_id").val(proc_id);
            $("#userAssign").modal("show");
        });
    });
  // Purchase Request
    $("body").on("click", ".Proc", function () {
        let procurement_id = $(this).data("id");
        let equip_name = $(this).closest("tr").find("td:eq(2)").text();

        let currentRow = $(this).closest("tr");
        let data = $(".data-table").DataTable().row(currentRow).data();
        let loc = data["equip_loc"];
        let reason = data["reason"];
        let staff = data["request_by"];
        let user_id = data["user_id"];
        let ticket_id = data["request_origin"];

        // var ticket_id
        $.get("{{ route('supplyofficer.procurement') }}" + "/" + procurement_id + "/edit", function (data) {
            // $("#userName").html(data.name);
            $("#user_id").val(user_id);
            $("#ticket_id").val(ticket_id);
            $("#eqid").val(data.equipment_id);
            $("#pro_id").val(data.id);
            $("#loc").html(loc);
            $("#reason").html(reason);
            $("#requested_by").html(staff);
            $("#equip_id").html(data.equipment_id);
            $("#equip_name").html(equip_name);
            $("#proc_id").html(data.id);
            $("#editProc").modal("show");
        });
    });
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
        title: "Please wait...",
        showConfirmButton: false,
        timer: 3000,
    });

});

    // Purchase Request
    if ($("#editProc").length > 0) {
        $("#editProc").validate({
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
                let user_id = $("#user_id").val();
                let ticket_id = $("#ticket_id").val();
                let procurement_id = $("#pro_id").val();
                let eqid = $("#eqid").val();
                let remarks = $("#remarks").val();
                let budget = $("#budget").val();
                
                $(".submit").attr("disabled", true);

                $.ajax({
                    data: { 
                        procurement_id: procurement_id, 
                        eqid: eqid, 
                        user_id: user_id, 
                        ticket_id: ticket_id ,
                        remarks: remarks,
                        budget: budget
                    },
                    url: "{{ route('supplyofficer.printPdf') }}",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#editProc").trigger("reset");
                        $("#editProc").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Printing!",
                            showConfirmButton: false,
                            timer: 3500,
                        });
                        table.draw();
                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            $(document)
                                .find("[name=" + field_name + "]")
                                .after('<span class="alert alert-gradient mb-4">' + error + "</span>");
                            $(".alert").delay(3000).fadeOut();
                        });
                    },
                });

                //end scripts
            },
        });
    }

    // Assign SUpplier
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
                let procurement_id = $("#procurement_id").val();
                let supplier_id = $("#supplier_id").val();
                 
                $(".submit").attr("disabled", true);

                $.ajax({
                    data: { 
                        procurement_id: procurement_id, 
                        supplier_id: supplier_id, 
                    },
                    url: "{{ route('supplyofficer.procurement.store') }}",
                    type: "POST",
                    dataType: "json",
                    success: function (data) {
                        $("#userAssign").trigger("reset");
                        $("#userAssign").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Assigned!",
                            showConfirmButton: false,
                            timer: 3500,
                        });
                        table.draw();
                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            $(document)
                                .find("[name=" + field_name + "]")
                                .after('<span class="alert alert-gradient mb-4">' + error + "</span>");
                            $(".alert").delay(3000).fadeOut();
                        });
                    },
                });

                //end scripts
            },
        });
    }






});


 
  </script>
  
@endpush