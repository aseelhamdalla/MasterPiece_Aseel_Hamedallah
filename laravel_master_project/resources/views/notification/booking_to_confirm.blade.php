<a href="{{'my_booking/'.$notification->data['booking']['user_id']}}">
    
    {{-- <div class="media"> --}}
        {{-- <span class="avatar avatar-sm">
            <img class="avatar-img rounded-circle" alt="User Image" src="{{asset('uploads/photo/'.$notification->data['booking']['user_id']->info->image)}}">
        </span> --}}
        {{-- <div class="media-body">
            <p class="noti-details"> <span class="noti-title">Jeffrey Akridge has booked your service</span></p>
            <p class="noti-time"><span class="notification-time">Today 10:04 PM</span></p>
        </div> --}}
    {{-- </div> --}}
    
    {{$notification->data['user']['name']}} booking this service <strong> {{$notification->data['booking']['service_name']}}</strong></a>

