
@extends('layouts.app')
@section('content')
@section('title','Service Request List')


<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <a class="btn btn-primary mb-2 mr-2" href="javascript:void(0)" id="createNewuser"><i data-feather="plus-circle"></i> Open Service request</a>
    <div class="widget-content widget-content-area br-6">
        <div class="table-responsive mb-4 mt-4">
            <table class="table table-hover data-table" style="width:100%">
                <thead>
                    <tr>
                        
                        <th>Ticket ID</th>
                        <th>Item Name.</th>
                        <th>Requested By</th>
                        <th>Status</th>
                        <th>Registered Date</th>
                       
                       
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
                <h5 class="modal-title" id="userHeading">Please Enter Equipment ID</h5>
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
                        
                           <input type="text" class="form-control my-3 search-input" name="q">
                           <div class="card">
                               <div class="card-header">Search Result</div>
                               <div class="list-group list-group-flush search-result"></div>
                              
                           </div>
                        </div>
                        <div class="col-md-6 mb-4">
                           
                        </div>
                    </div>
                  
               
                    
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary" id="userSave">Search</button>
                    </div>
                    
            </div>
          
        </form>
        </div>
    </div>
</div>
{{-- Assign Modal --}}
<div class="modal fade" id="userAssign" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userHeading">Assign Service Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="userAssign" name="userAssign" class="simple-example" action="javascript:void(0);" required>
                    <input type="hidden" name="user_id" id="user_id">
                    <div id="validation-errors"></div>
                    <div class="form-row">
                        <div class="col-md-6 mb-4">
            
                           
                           
                        </div>
                        <div class="col-md-6 mb-4">
                           
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
@push('styles')
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/swal.js') }}"></script>
<script>
   $(document).ready(function () {
    $(".search-input").on("keyup", function () {
        var _q = $(this).val();
        console.log(_q);

        if (_q.length >= 3) {
            $.ajax({
                url: "{{ route('staff.servicelist.autocomplete') }}",
                data: {
                    q: _q,
                },
                dataType: "json",
                beforeSend: function () {
                         $(".search-result").html('<li class="list-group-item fw-900">Loading..</li>');
                },
                success: function (res) {
                    var _html = "";
                    $.each(res.data, function (index, data) {
                        _html += '<li class="list-group-item item1"> Item Name:  ' +data.item_name+ ' </li>';
                        _html += '<li class="list-group-item"> Equipment ID: <span class="item2">' +data.id+ '</span> </li>';
                        _html += '<li class="list-group-item item3">  Equipment Description: ' +data.item_description+ ' </li>';
                         _html += '<span class="list-group-item">Reason: <input type="text" class="form-control-sm pl-6 col-3 item4" required></span> ';
                        _html += '<button class="btn btn-primary openTicket mt-4"> Open a Ticket </button>';
                    });
                    
                    $(".search-result").html(_html);
                },
            });
        } 
    });
});

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
        ajax: "{{ route('staff.servicelist') }}",
        columns: [
            //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: "id", name: "id" },
            { data: "item_name", name: "item_name" },
             { data: "name", name: "name" },
            { data: "status", name: "status" },
            { data: "date", name: "date" },
        ],
    });
    // Add user
    $("a#createNewuser").click(function () {
        $("#userSave").val("create-product");
        $("#user_id").val("");
        $("#userForm").trigger("reset");
        $("#userHeading").html("E-quipment");
        $("#userModal").modal("show");
    });
    //   assign SRL
    $("body").on("click", ".editUser", function () {
        var user_id = $(this).data("id");
        $.get("{{ route('staff.servicelist') }}" + "/" + user_id + "/edit", function (data) {
            $("#userName").html(data.name);
            $("#userSave").val("edit-user");
            $("#userAssign").modal("show");
        });
    });
   
    $("body").on("click", ".openTicket", function () {
       
        var item2 = $(".item2").html();
        var item4 = $(".item4").val();
         
        if(item4 == ''){
                 Swal.fire("Please Enter Reason", "example: Damage",  "warning");
        }else{
        Swal.fire({
            title: "Are you sure to open a ticket?",
            text: "please press okay!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, open ticket!",
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire("Ticket is being processed!", "Please check after some time.", "success");
                setTimeout(location.reload.bind(location), 2000);

                {
                    $.ajax({
                        data: { item2: item2, item4: item4 } ,
                        url: "{{ route('staff.servicelist.openticket') }}",
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                        },
                        error: function (response) {
                            console.log(response);
                        },
                    });
                }
            }
        });
        }
    });
});


 
  </script>
  
@endpush