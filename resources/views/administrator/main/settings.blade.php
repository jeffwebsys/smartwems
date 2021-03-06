
@extends('layouts.app')
@section('content')
@section('title','Settings')




    <div id="treeviewAnimated" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Server Settings</h4>
                    </div>
                   
                </div>
                @if(Session::has('message'))
                <span class="badge badge-secondary ml-2 mb-4"> {{ Session::get('message') }} </span>
                @endif
            </div>
                           
            <div class="widget-content widget-content-area">
                <button class="btn btn-primary ml-4" style="margin-bottom: 20px" id="category">Add Category</button>     
                <ul class="file-tree">
                    <li class="file-tree-folder mt-8">Equipment Categories             
                    </li>
                        @foreach($equipmentCategory as $cat)
                        <li>{{ $cat->title }}</li>
                        @endforeach
                    <li class="file-tree-folder">Equipment Locations</li>
                    
                        @foreach($equipmentLocation as $loc)
                        <li>{{ $loc->title }}</li>
                        @endforeach
                </ul>

               

            </div>
        </div>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2f3545">
                    <h5 class="modal-title" id="userHeading" style="color: white">Manage Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm" name="userForm" class="simple-example" action="{{ route('admin.settingsStore') }}" method="POST" required>
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div id="validation-errors"></div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="" required>
                                <br><label for="desc">Description</label>
                      <input type="text" class="form-control" id="description" name="description" value="" required>
                            
                               
                               
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="usertype">Category Type</label>
                                <select class="form-control" name="category_type">
                                    <option value="1">Equipment Category</option>
                                    <option value="2">Location Category</option>
                                </select><br>
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