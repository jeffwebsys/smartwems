
@extends('layouts.app')
@section('content')
@section('title','Settings')



<div id="treeviewAnimated" class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Equipment Status</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="equipment_name">Equipment Name</label>
                        <input type="text" class="form-control" id="equipment_name" name="equipment_name" value="{{ $equipment->item_name }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Service Life Years</label>
                        <input type="number" class="form-control" id="sv_life" name="sv_life" placeholder="Enter Years" min="1" max="10"/>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="equipment_name">Salvage Value</label>
                        <input type="number" class="form-control" id="sv_value" name="sv_value" placeholder="Enter Salvage Value" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Equipment Acquisition Cost</label>
                        <input type="number" class="form-control" id="ac_cost" name="ac_cost" value="{{ $equipment->unit_cost }}" disabled style="color: black;" />
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="equipment_name">Depreciation Value/Year</label>
                        <input type="number" class="form-control" id="d_value" name="d_value" placeholder="" disabled style="color: black">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Total Repair - Service Cost</label>
                        <input type="text" class="form-control" id="t_value" name="t_value" value="{{ $equipment->purchaseBudget->budget ?? "No records at the moment" }} "disabled style="color: black">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Year To Year Depreciation Value</label>
                        <p id="tx1" style="color: black; font-weight: 700;"></p>
                       
                    </div>
                    <div class="form-group col-md-6">
                   
                                <input type="text" id="tx2" hidden>
                                <button type="submit" class="btn btn-primary mt-3">Print Report</button>
                            
                    </div>
                </div>
              
              
            </form>
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
    $("#ac_cost, #sv_value, #sv_life").on("input", function () {
        let ac_cost = parseInt($("#ac_cost").val());
        let sv_value = parseInt($("#sv_value").val());
        let sv_life = parseInt($("#sv_life").val());

        $("#d_value").val(((ac_cost - sv_value) / sv_life ? (ac_cost - sv_value) / sv_life : 0));
        let test = $('#tx2').val(ac_cost - parseInt($("#d_value").val()));
       
        let text = "";
        let dc =  $("#d_value").val(); 
        let t = ac_cost - dc;
        let i;
        for (i = 0; i < sv_life; i++, t -= dc) {

        text += "Year " + (i + 1) + " - " + parseFloat(t.toFixed(2)) +" Php<br>";
        }
        $('#tx1').html(text);
        
    });
});


</script>
@endpush