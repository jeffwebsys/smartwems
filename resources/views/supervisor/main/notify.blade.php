@extends('layouts.app')
@section('content')
@section('title','Ticket Updates')

<div class="layout-px-spacing">                
    <div class="row analytics">
            @foreach($data as $ticket)
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 col-12 layout-spacing">
                        <div class="widget widget-card-one">
                            <div class="widget-content">

                                <div class="media">
                                    <div class="w-img">
                                        <img src="{{ asset('assets/img/90x90.jpg') }}" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                        <h6>{{ $ticket->serviceEquipment->item_name }}</h6>
                                        <p class="meta-date-time">{{ $ticket->serviceTicket->created_at }}</p>
                                    </div>
                                </div>

                                <p><span style="font-weight: 900">Smart Equipment Ticket Update Tracker: </span> <span class="badge badge-info"> {{ $ticket->serviceUser->name }} </span> <i>wrote</i> "{{ $ticket->remarks }}" -<i>this is a system automated transaction {{ $ticket->updated_at }}</i></p>

                                <div class="w-action">
                                    <div class="card-like">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                        <span>Complete Ticket</span>
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
