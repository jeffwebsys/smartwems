
@extends('layouts.app')
@section('content')
@section('title','Settings')




    <div id="treeviewAnimated" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">

                    
                  
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Ticket Status</h4>
                      
                    </div>
                   
                </div>
               
            </div>
           
                           
            <div class="widget-content widget-content-area">
              
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
              
                <span class="ml-4 mb-4" style="color:black"><strong>Ticket Status:</strong> {!! $notify->TicketStatus !!} </span><br><br>
                <span class="ml-4 mb-4" style="color:black"><strong>Requested By:</strong> <span class="badge outline-badge-success">{{ $notify->ticketuser->name }}</span></span>
                {{-- <span class="ml-4 mb-4" style="color:black"><strong>Action Taken By:</strong> <span class="badge outline-badge-info">{{ $who->serviceUser->name }}</span></span> --}}
                
               
               
               

            </div>
        </div>
    </div>
    

    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2f3545">
                    <h5 class="modal-title" id="userHeading" style="color: white">Enter Ticket ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm" name="userForm" class="simple-example" action="{{ route('staff.trackStore') }}" method="POST" required>
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div id="validation-errors"></div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Ticket ID</label>
                                <input type="number" class="form-control" id="ticket_id" name="ticket_id" value="" required>         
                            </div>
                            <div class="col-md-6 mb-4">
                                
                            </div>
                        </div>
                      
                   
                        
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary" id="userSave">Save</button>
                        </div>
                    </form>
                </div>
              
            
            </div>
        </div>
    </div>

    


@endsection

@push('styles')
<link href="{{ asset('assets/css/elements/custom-tree_view.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/swal.js') }}"></script>
<script src="{{ asset('plugins/treeview/custom-jstree.js') }}" ></script>
<script>
    $(document).ready(function () {
    $("#category").click(function () {
        $("#userModal").modal("show");
    });
});

</script>
@endpush