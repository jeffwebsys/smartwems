@extends('layouts.app')
@section('content')
@section('title','Ticket Updates')
<div id="timelineImages" class="col-lg-12 layout-spacing">
   
    <div class="statbox widget box box-shadow">
       <div class="widget-header">
           <div class="row">
               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                   <h4>Logs History </h4>
               </div>
           </div>
       </div>
      
       <div class="widget-content widget-content-area">
           <div class="mt-container mx-auto">
               <div class="timeline-alter">

                @forelse($history as $t)
                   <div class="item-timeline">
                       <div class="t-time"> 
                           <p class="">Remarks: {{ $t->description }}</p>
                       </div>
                       <div class="t-usr-txt">
                           <p><span></span></p>
                       </div>
                       <div class="t-meta-time">
                           <p class="">Time: {{ $t->created_at }}</p>
                       </div>
                       
                       <div class="t-text">
                           <p>Action Taken By: {{ $t->logs }}</p>
                       </div>
                   </div>
                   <hr>
                   @empty
                   <p>No logs at the moment</p>
                   @endforelse
               </div>
           </div>
           {{$history->links()}}

       </div>
      
   </div>
   
</div>

@endsection