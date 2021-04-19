@extends('layouts.app')
@section('content')
@section('title','Ticket Updates')

<div class="layout-px-spacing">   
    @if(Session::has('message'))
    <span class="badge badge-secondary ml-2 mb-4"> {{ Session::get('message') }} </span>
    @endif             
    <div class="row analytics"> 
            @foreach($data as $ticket)
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 col-12 layout-spacing">      
                        <div class="widget widget-card-one">
                            <div class="widget-content">
                               
                                <div class="media">
                                    <form id="complete" action="{{ route('supervisor.notify.store')}}" method="POST">
                                    @csrf
                                    <div class="w-img">
                                        <img src="{{ asset('assets/img/90x90.jpg') }}" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                    <input type="text" name="equipment_id" value="{{ $ticket->serviceEquipment->id }}" hidden>
                                    <input type="text" name="ticket_id" value="{{ $ticket->serviceTicket->id }}" hidden>
                                        <h6>{{ $ticket->serviceEquipment->item_name }}</h6>
                                        <p class="meta-date-time">{{ $ticket->serviceTicket->created_at }}</p>
                                    </div>
                                </div>
                                <p><span style="font-weight: 900">Smart Equipment Ticket Update Tracker: </span> <span class="badge badge-info"> {{ $ticket->serviceUser->name }} </span> <i>wrote</i> "{{ $ticket->remarks }}" -<i>this is a system automated transaction {{ $ticket->updated_at }}</i></p>
                                <div class="w-action">
                                    <div class="card-like">
                                        <button type="submit" class="btn btn-primary" {{ ($ticket->serviceEquipment->status == 5 )  ? 'disabled' : '' }}>{{ ($ticket->serviceEquipment->status == 5 )  ? 'Ticket Completed' : 'Complete Ticket' }}</button> 
                                    </div>
                                </div>
                            </form>
                            <div class="w-action">
                                <div class="card-like">
                                    @if($ticket->serviceEquipment->status == 5)
                                    <form action="{{ route('supervisor.notify.ticketUpdate')}}" method="POST" id="update" style="margin-top: 10px">
                                        @csrf
                                        <input type="text" name="equipment_update" value="{{ $ticket->serviceEquipment->id }}" hidden>
                                        <input type="text" name="ticket_update" value="{{ $ticket->serviceTicket->id }}" hidden>
                                    <button type="submit" class="btn btn-danger">Re-Open Ticket</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
    {{ $data->links() }}
</div>

@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}"/>  
@endpush
@push('scripts')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
@endpush
