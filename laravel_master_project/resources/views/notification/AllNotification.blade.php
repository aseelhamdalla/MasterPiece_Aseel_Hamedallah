@extends('layout.public_main')	
@section('section1')



<div class="content">
    <div class="container mb-5 mt-5">  
       
        <div class="row justify-content-center">

          
      
            <div class="col-lg-10">
                <div>

                    <h4 class="widget-title">Notifications</h4>
              
                    <div class="notcenter">
                        @foreach($notifications  as $notification) 
                        <div class="notificationlist">
                            <div class="inner-content-blk position-relative">
                                <div class="d-flex text-dark">
                   <img class="rounded" src="{{asset('uploads/photo/'.$userImage)}}" width="50" alt="">
                                    <div class="noti-contents">
                           <h3><strong>{{$notification->data['user']['name'] }} booked
                                            {{$notification->data['booking']['service_name']}}</strong></h3>
                                        <span>{{ $notification->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach  
                    
                     </div>   
                   
                    
                        
                    {{-- <!-- Pagination -->
                    <div class="pagination">
                        <ul>
                            <li class="active">
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li class="arrow">
                                <a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Pagination -->
                     --}}
                </div>
            </div>
        </div>
    </div>
@endsection