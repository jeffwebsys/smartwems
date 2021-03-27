@extends('layouts.app')
@section('content')
@section('title','Equipment Information')

<div class="layout-px-spacing">                
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" class="section general-info">
                                        <div class="info">
                                               @if(Session::has('message'))
                                                <span class="badge badge-secondary ml-2 mb-4"> {{ Session::get('message') }} </span>
                                                @endif
                                            <h6 class="">Equipment Information</h6>
                                            <div class="row">
                                                
                                            
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <div class="avatar avatar-xl">
                                                                <img alt="avatar" src="{{ asset('assets/img/90x90.jpg') }}" class="rounded-circle" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label style="color: black;"><strong>Equipment Name</strong></label>
                                                                            <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{ $equipment->item_name }}" disabled style="color: black">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label style="color: black;"><strong> Equipment QR Code </label></label><br>
                                                                        @php
                                                                        use SimpleSoftwareIO\QrCode\Facades\QrCode;
                                                                        $qrcode = url("equipmentview/$equipment->id");
                                                                        $qr = Qrcode::size(100)
                                                                        ->backgroundColor(255, 0, 0, 25)
                                                                        ->generate($qrcode);

                                                                        echo $qr;
                                                                        @endphp
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-4">                                                       
                                                          <span class="badge badge-primary"> {{ $equipment->eqcategory->title }} </span> 
                                                          <span class="badge badge-success"> {{ $equipment->eqcategory->description }}</span> 
                                                          
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                 <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="editProc" name="editProc" class="section work-experience" action="{{ route('staff.submitTicket') }}" method="POST" required>
                                        @csrf
                                        {{-- <form id="editProc" name="editProc" class="section work-experiencee" action="{{ route('staff.printPdf') }}" method="POST"  target="_blank" required>
                                            @csrf --}}
                                        <div class="info">
                                            <h5 class="">Equipment Data</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-2">
                                                   
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="work-section">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <input type="text" name="equipment_id" value="{{ $equipment->id }}" hidden>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree3">Equipment Status</label><br>
                                                                               {!! $equipment->EquipmentStatus !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree4">Equipment Location</label>
                                                                            <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->eqlocation->title }}" disabled style="color: black">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Serial No. / Model No.</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->serial_no }}" disabled style="color: black">
                
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->model_no }}" disabled style="color: black">
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Next PM / Last PM</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->next_pm }}" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->last_pm }}" disabled style="color: black">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Acquisition Date / Unit Cost</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->ac_date }}" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="PHP {{ $equipment->unit_cost }}" disabled style="color: black">
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Responsible Personnel / Equipment Logged Date</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->res_personnel }}" disabled style="color: black">
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control mb-4" id="degree4" placeholder="" value="{{ $equipment->created_at }}" disabled style="color: black">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             
                                                            {{-- <div class="col-md-12">
                                                                <label>Ticket Remarks</label>
                                                                <textarea class="form-control" placeholder="Please Enter Detail" name="equipment_remarks" rows="2" value="" style="color: black" required></textarea>
                                                            </div> --}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-dark">Submit Ticket</button> --}}
                                   
                                </div> 

                            </div>
                        </div>
                    </div>s

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">
                            <div class="blockui-growl-message">
                                <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                            </div>
                            <button type="submit" class="btn btn-dark">Print QR Info</button>

                        </div>
                    </form>

                    </div>
                </div>

            </div>

@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}"/>  
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/swal.js') }}"></script>
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
    <script>
   
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
        title: "Requesting...",
        showConfirmButton: false,
        timer: 3000,
    });

});
 

 </script>
@endpush
