@extends('layouts.app')
@section('content')
@section('title','Ticket Updates')
<div id="timelineImages" class="col-lg-12 layout-spacing">
   
    <div class="statbox widget box box-shadow">
       <div class="widget-header">
           <div class="row">
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                   <h4>Supplier Report </h4>
               </div>
           </div>
       </div>
      
       <div class="widget-content widget-content-area">
           <div class="mt-container mx-auto">
               <div class="timeline-alter">

                @forelse($supply as $t)
                   <div class="item-timeline">
                       <div class="t-time"> 
                           <p class="" style="font-weight: 900">Remarks: {{ $t->report }}</p>
                       </div>
                       <div class="t-usr-txt">
                           <p><span></span></p>
                       </div>
                       <div class="t-text">
                           <p>Equipment: {{ $t->procurement->procurementEquipment->item_name }}</p>
                       </div>
                       <div class="t-text">
                        <p>Requested By: {{ $t->procurement->procurementUser->name }} <br> Reference Ticket Log ID: @php echo '<a href="' . route('supplier.history', $t->procurement->procurementTicket->id) . '"><span style="color: blue; font-weight: 900;"">Click Here</span></a>' @endphp  </p>
                    </div>
                    <div class="t-meta-time">
                        <p style="font-weight:900">Reporting Time: {{ date('F j, Y, g:i a', strtotime($t->created_at)) }}</p>
                    </div>
                   </div>
                   <hr>
                   @empty
                   <p>No Logs at the moment</p>
                   @endforelse
               </div>
           </div>
           {{$supply->links()}}
       </div>
      
   </div>
   
</div>

@endsection