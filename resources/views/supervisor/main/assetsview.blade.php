
@extends('layouts.app')
@section('content')
@section('title','Settings')




    <div id="treeviewAnimated" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">

                    
                  
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Search Equipments</h4>
                        @if (session('error'))
                <span class="ml-3 mb-4 badge badge-warning">{{ session('error') }}</span><br>
                @endif
              
                    </div>
                   
                </div>
               
            </div>
           
                           
            <div class="widget-content widget-content-area">
                <button class="btn btn-primary ml-4" style="margin-bottom: 20px" id="category">Enter Equipment ID</button> <br>

            </div>
        </div>
    </div>
    

    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2f3545">
                    <h5 class="modal-title" id="userHeading" style="color: white">Enter Equipment ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm" name="userForm" class="simple-example" action="{{ route('supervisor.assetsStore') }}" method="POST" required>
                        @csrf
                        <div id="validation-errors"></div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Equipment ID</label>
                                <input type="number" class="form-control" id="equipment_id" name="equipment_id" value="" required>         
                            </div>
                            <div class="col-md-6 mb-4">
                                
                            </div>
                        </div>
                      
                   
                        
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary" id="userSave">Retrieve</button>
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