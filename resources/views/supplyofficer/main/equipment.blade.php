@extends('layouts.app')
@section('content')
@section('title','Equipments Dashboard')


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
	<a class="btn btn-primary mb-2 mr-2" href="javascript:void(0)" id="createNewuser"><i data-feather="plus-circle"></i> Create Equipment</a>
	<div class="widget-content widget-content-area br-6">
		<div class="table-responsive mb-4 mt-4">
			<table class="table table-hover data-table" style="width:100%">
				<thead>
					<tr>
						
						<th>Item Name</th>
						<th>Item Description</th>
						<th>AC Date</th>
						<th>Serial Number</th>
                        <th>Status</th>
						<th>QR Code</th>
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
				<h5 class="modal-title" id="userHeading">Add Equipment Info</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
			</div>
			<div class="modal-body">
				<form id="userForm" name="userForm" class="simple-example" action="javascript:void(0);" required>
					<input type="hidden" name="equipment_id" id="equipment_id">
					<div id="validation-errors"></div>
					<div class="form-row">
						<div class="col-md-6 mb-4 fw-900">
							<label for="item_name">Item Name</label>
							<input type="text" class="form-control" id="item_name" name="item_name" value="" required>
							<br><label for="item_description">Item Description</label>
						  <input type="text" class="form-control" id="item_description" name="item_description" value="" required>
						 <br><label for="model_no">Model #</label>
						  <input type="text" class="form-control" id="model_no" name="model_no" value="" required>
						  <br><label for="serial_no">Serial #</label>
						  <input type="text" class="form-control" id="serial_no" name="serial_no" value="" required>
						  <br><label for="property_no">Property #</label>
						  <input type="text" class="form-control" id="property_no" name="property_no" value="" required>
						  <br><label for="property_no">Acquisition Date</label>
						  <input type="date" class="form-control" id="ac_date" name="ac_date" value="" required> 
                          <br>
                          <label for="equipment_categories">Categories</label>
							<select class="form-control" name="equipment_categories_id">
								@foreach($equipment as $equipmentCat)
								<option value="{{$equipmentCat->id}}">{{ $equipmentCat->title }}</option>
								@endforeach
							</select>
							
						   
						   
						</div>
						<div class="col-md-6 mb-4 fw-900">
							<label for="equipment_locations">Area Locations</label>
							<select class="form-control" name="equipment_locations_id">
								@foreach($locations as $location)
								<option value="{{$location->id}}">{{ $location->title }}</option>
								@endforeach
							</select>
							<br><label for="unit_cost">Unit Cost</label>
						  <input type="text" class="form-control" id="unit_cost" name="unit_cost" value="" required>
						  <br><label for="unit_cost">Responsible Personnel</label>
						  <input type="text" class="form-control" id="res_personnel" name="res_personnel" value="" required>
						  <br><label for="remarks">Remarks</label>
						  <input type="text" class="form-control" id="remarks" name="remarks" value="" required>
                          	<br>
                          <label for="property_no">Last PM Date</label>
						  <input type="date" class="form-control" id="last_pm" name="last_pm" value="" required>
                          <br><label for="property_no">Next PM Date</label>
						  <input type="date" class="form-control" id="next_pm" name="next_pm" value="" required>
                          <br>
							<label for="status">Status</label>
                            <select class="form-control" name="status">
								<option value="0">Inactive</option>
                                <option value="1">Active</option>
							</select>
						  {{-- <br><label for="unit_cost">Last PM</label>
						  <input type="date" class="form-control" id="last_pm" name="last_pm" value="" required>
						  <br><label for="unit_cost">Next PM</label>
						  <input type="date" class="form-control" id="next_pm" name="next_pm" value="" required> --}}
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
<!--  Edit Equipment -->
<div class="modal fade" id="equipmentDetail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="userHeading">Equipment Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</button>
			</div>
			<div class="modal-body">
				<form id="equipmentForm" name="equipmentForm" class="simple-example" action="javascript:void(0);" required>
					<input type="hidden" name="edit_equipment_id" id="edit_equipment_id">
					<div id="validation-errors"></div>
					<div class="form-row">
						<div class="col-md-6 mb-4  fw-900">
							<label for="item_name">Item Name</label>
							<input type="text" class="form-control" id="edit_item_name" name="item_name" value="" required>
							<br><label for="item_description">Item Description</label>
						  <input type="text" class="form-control" id="edit_item_description" name="item_description" value="" required>
						 <br><label for="model_no">Model #</label>
						  <input type="text" class="form-control" id="edit_model_no" name="model_no" value="" required>
						  <br><label for="serial_no">Serial #</label>
						  <input type="text" class="form-control" id="edit_serial_no" name="serial_no" value="" required>
						  <br><label for="property_no">Property #</label>
						  <input type="text" class="form-control" id="edit_property_no" name="property_no" value="" required>
						  <br><label for="property_no">Acquisition Date</label>
						  <input type="date" class="form-control" id="edit_ac_date" name="ac_date" value="" required>
                          <br>
                          <label for="equipment_categories">Categories</label>
							<select class="form-control" name="equipment_categories_id">
								@foreach($equipment as $equipmentCat)
								<option value="{{$equipmentCat->id}}">{{ $equipmentCat->title }}</option>
								@endforeach
							</select>
							
						   {{-- <br><label for="qr_code">QR Code</label> <br>
						  <span id="qr_code"></span> --}}
						   
						</div>
						<div class="col-md-6 mb-4  fw-900">
							<label for="equipment_locations">Area Locations</label>
							<select class="form-control" name="equipment_locations_id">
								@foreach($locations as $location)
								<option value="{{$location->id}}">{{ $location->title }}</option>
								@endforeach
							</select>
							<br><label for="unit_cost">Unit Cost</label>
						  <input type="text" class="form-control" id="edit_unit_cost" name="unit_cost" value="" required>
						  <br><label for="unit_cost">Responsible Personnel</label>
						  <input type="text" class="form-control" id="edit_res_personnel" name="res_personnel" value="" required>
						  <br><label for="remarks">Remarks</label>
						  <input type="text" class="form-control" id="edit_remarks" name="remarks" value="" required>
                           <br><label for="unit_cost">Last PM</label>
						  <input type="date" class="form-control" id="edit_last_pm" name="last_pm" value="" required>
						  <br><label for="unit_cost">Next PM</label>
                          <br>
						  <input type="date" class="form-control" id="edit_next_pm" name="next_pm" value="" required>
                          <br>
							<label for="status">Status</label>
                            <select class="form-control" name="status">
								<option value="0">Inactive</option>
                                <option value="1">Active</option>
							</select>
						 
						</div>
					</div>
				  
			   
					
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
						<button type="submit" class="btn btn-primary" id="editSave">Save</button>
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
        ajax: "{{ route('supplyofficer.equipment') }}",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: "item_name", name: "item_name" },
            { data: "item_description", name: "item_description" },
            { data: "ac_date", name: "ac_date" },
            { data: "serial_no", name: "serial_no" },
            { data: "status", name: "status" },
			{ data: "qr_code", name: "qr_code" },
            { data: "action", name: "action", orderable: false, searchable: false },
        ],
    });
	// Hide QR Code from the table
	// table.column(5).visible(false);
    // Add Equipment
    $("#createNewuser").click(function () {
        $("#userSave").val("create-product");
        $("#equipment_id").val("");
        $("#userForm").trigger("reset");
        $("#userHeading").html("Add Equipment");
        $("#userModal").modal("show");
    });
    // Edit equipment
    $("body").on("click", ".editUser", function () {
        var equipment_id = $(this).data("id");
        var t = table.row(5).data();
        $.get("{{ route('supplyofficer.equipment') }}" + "/" + equipment_id + "/edit", function (data) {
            $("#edit_equipment_id").val(data.id);
            $("#edit_item_name").val(data.item_name);
            $("#edit_item_description").val(data.item_description);
            $("#edit_ac_date").val(data.ac_date);
            $("#edit_model_no").val(data.model_no);
            $("#edit_serial_no").val(data.serial_no);
            $("#edit_property_no").val(data.property_no);
            $("#edit_unit_cost").val(data.unit_cost);
            $("#edit_res_personnel").val(data.unit_cost);
            $("#edit_next_pm").val(data.next_pm);
            $("#edit_last_pm").val(data.last_pm);
            $("#edit_remarks").val(data.remarks);
            $("#editSave").val("edit-user");
            $("#equipmentDetail").modal("show");
        });
    });
    if ($("#userForm").length > 0) {
        $("#userForm").validate({
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
                $.ajax({
                    data: $("#userForm").serialize(),
                    url: "{{ route('supplyofficer.equipment.store') }}",
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
    // Edit Data
    if ($("#equipmentForm").length > 0) {
        $("#equipmentForm").validate({
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
                var edit_equipment_id = $(this).data("id");
                $.ajax({
                    data: $("#equipmentForm").serialize(),
                    url: "{{ url('supplyofficer/equipment') }}" + "/" + edit_equipment_id + "/update",
                    type: "PUT",
                    dataType: "json",
                    success: function (data) {
                        $("#equipmentForm").trigger("reset");
                        $("#equipmentDetail").modal("hide");
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Data updated Successfully!",
                            showConfirmButton: false,
                            timer: 3500,
                        });
                        table.draw();
                        console.log(data);
                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function (field_name, error) {
                            $(document)
                                .find("[name=" + field_name + "]")
                                .after('<span class="error">' + error + "</span>");
                            $(".alert").delay(3000).fadeOut();
                        });
                    },
                });

                //end scripts
            },
        });
    }

    //  Delete User Role
    $("body").on("click", ".deleteUser", function () {
        var equipment_id = $(this).data("id");
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
                        url: "{{ route('supplyofficer.equipment.store') }}" + "/" + equipment_id,
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
