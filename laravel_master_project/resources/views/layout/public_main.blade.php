<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>we care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
      content="wecare Bussiness Owner BY Aseel .This web application was created to help people to Find Trusted Servicegivers For there every need ,connect families with Servicegivers and caring companies ,To the one who look to provide services ,To customers who  trust us to fix, maintain and look after their home .
     Families and servicegivers to organize their businesses" />
    <meta name="keyword" content="Servicegivers, service , home maintainance , Cleaning ,Childcare , Provider" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css
    ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('public_theme/img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public_theme/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public_theme/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public_theme/plugins/fontawesome/css/all.min.css') }}">


    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public_theme/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public_theme/plugins/owlcarousel/owl.theme.default.min.css') }}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public_theme/css/style.css') }}">
    <script src="{{ asset('public_theme/js/sorting_script.js') }}"></script>

</head>

<style>
    .toast{
     margim-top:5rem;
    background-color:rgb(59, 163, 99);;   
    }
   
   </style> 
<body>




    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">

            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a href="/landing" class="navbar-brand logo">
                        <img src="{{ asset('public_theme/img/logonew.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="/landing" class="navbar-brand logo-small">
                        <img src="{{ asset('public_theme/img/logo-icon.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="/landing" class="menu-logo">
                            <img src="{{ asset('public_theme/img/logo.png') }}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i
                                class="fas fa-times"></i></a>
                    </div>
                    <ul class="main-nav">

                        <li>
                            <a href="http://127.0.0.1:8000/landing">Home</a>
                        </li>
                        <li>
                            <a href="http://127.0.0.1:8000/categories">Categories</a>
                        </li>

                        <li>
                            <a href="http://127.0.0.1:8000/about">About Us</a>
                        </li>

                        <li>
                            <a href="http://127.0.0.1:8000/contactus">Contact Us</a>
                        </li>

                    </ul>
                </div>


                @guest


                    <ul class="nav header-navbar-rht">
                        <li class="nav-item">
                            <a class="nav-link header-login" href="http://127.0.0.1:8000/register"
                                data-target="">register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{ route('login') }}" data-target="">Login</a>
                        </li>
                    </ul>
                @endguest
                @if (Auth::check())
                    @if (Auth::user()->role == 2)

                        <ul class="nav header-navbar-rht">

                            <li class="nav-item dropdown logged-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fas fa-bell "></i>
                                    @if (auth()->user()->unreadnotifications->count())
                                                 
                                                           
                                        <span
                                            class="badge badge-pill bg-yellow">{{ count(Auth::user()->unreadNotifications) }}</span>

                                    @endif
                                </a>
                                <div class="dropdown-menu notify-blk dropdown-menu-right notifications">
                                    <div class="topnav-dropdown-header">
                                        <a href="{{ route('MarkRead') }}"><span class="notification-title">Mark All as
                                                read</span></a>
                                        <a href="{{ route('deletNotification') }}" class="clear-noti">Clear All </a>
                                    </div>
                                    <div class="noti-content">
                                        <ul class="notification-list">
                 <li style="background-color:lightgray" class="notification-message"  >
                                          
      @foreach(auth()->user()->unreadNotifications as $notification)   
     <a href="{{ '/provider_dashboard/booking_list/' . $notification->data['booking']['provider_id'] }}">
                                          <div class="media">
                                          <span class="avatar avatar-md">
                    
                                        
                                            
                                            @foreach(session('image') as $key=>$value)
                                          
                                            {{-- {{session('image')}} --}}
                                            @if($key == $notification->data['user']['id'])
               <img class="avatar-lg rounded-circle" alt=""
                 src="{{asset('uploads/photo/'.$value )}}" > 
                 @endif
               @endforeach

                                                            </span>
                                                            <div class="media-body">
                                                                <p class="noti-details"> <span
                                                                        class="noti-title">{{ $notification->data['user']['name'] }}
                                                                        booked
                                                                        {{ $notification->data['booking']['service_name'] }}
                                                                        service</span></p>
                                                                <p class="noti-time"><span
                                                                        class="notification-time">{{ $notification->created_at }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>



                                                @endforeach
                                            </li>
                                        </ul>

                                        @if (count(Auth::user()->Notifications) === 0)
                                            <p style="background-color:rgb(247, 244, 244)" class="noti-details p-5">
                                                <span class="noti-title">No unread
                                                    Notifications</span></p>

                                        @endif


   {{-- ***************************************READ NOTIFICATION --}}

                                        <ul class="notification-list">
                                            <li class="notification-message">
                                                @foreach (auth()->user()->readNotifications as $notification)
                                                    <a
                                                        href="{{ '/provider_dashboard/booking_list/' . $notification->data['booking']['provider_id'] }}">
                                                        <div class="media">
                                                            <span class="avatar avatar-sm">
                                                                @foreach(session('image') as $key=>$value)
                                          
                                                                {{-- {{session('image')}} --}}
                                                                @if($key == $notification->data['user']['id'])
                                   <img class="avatar-lg rounded-circle" alt=""
                                     src="{{asset('uploads/photo/'.$value )}}" > 
                                     @endif
                                   @endforeach
                                                            </span>
                                                            <div class="media-body">
                                                                <p class="noti-details"> <span
                                                                        class="noti-title">{{ $notification->data['user']['name'] }}
                                                                        booked
                                                                        {{ $notification->data['booking']['service_name'] }}
                                                                        service</span></p>

                                                                <p class="noti-time"><span
                                                                        class="notification-time">{{ $notification->created_at }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>



                                                @endforeach
                                            </li>
                                        </ul>



                                    </div>
                                    <div class="topnav-dropdown-footer">
                                        <a href="{{ route('ShowNotification') }}">View all Notifications</a>
                                    </div>
                                </div>
                            </li>
                            <!-- /Notifications -->

                            <li class="nav-item dropdown has-arrow logged-item ">

                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"
                                    aria-expanded="false">
              @if(isset(Auth::user()->info->image) && !empty(Auth::user()->info->image))
                                        <span class="user-img">
                                            <img src="{{ asset('uploads/photo/' . Auth::user()->info->image) }}"
                                                class="avatar-img rounded-circle" alt="image" width="150px"
                                                height="150px">
                                        </span>
                                    @else
                                        <span class="user-img">
                        <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                class="avatar-img rounded-circle" alt="image" width="150px"
                                                height="150px">
                                        </span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="user-header">
                                        @if (isset(Auth::user()->info->image) && !empty(Auth::user()->info->image))
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('uploads/photo/' . Auth::user()->info->image) }}"
                                                    class="avatar-img rounded-circle" alt="image" width="150px"
                                                    height="150px">
                                            </div>
                                        @else
                                            <div class="avatar avatar-sm">
                                                <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                    class="avatar-img rounded-circle" alt="image" width="150px"
                                                    height="150px">
                                            </div>
                                        @endif

                                        <div class="user-text">
                                            <h6 class="text-truncate">{{ Auth::user()->name }}</h6>
                                            <p class="text-muted mb-0">Provider</p>

                                            {{-- <p>{{Auth::user()->info->nid}}</p> --}}
                                        </div>

                                    </div>
                                    <a class="dropdown-item"
                                        href="http://127.0.0.1:8000/provider_dashboard/{{ Auth::user()->id }}">
                                        Dashboard</a>

                                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        {{-- *************************************************** Role is user***************** --}}
                    @else
                        <ul class="nav header-navbar-rht">
                            <li class="nav-item dropdown logged-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fas fa-bell"></i>
                                    @if (auth()
        ->user()
        ->unreadnotifications->count())
                                        <span
                                            class="badge badge-pill bg-yellow">{{ count(Auth::user()->unreadNotifications) }}</span>
                                    @endif
                                </a>
                                <div class="dropdown-menu notify-blk dropdown-menu-right notifications">
                                    <div class="topnav-dropdown-header">
                                        <a href="{{ route('MarkRead') }}"><span class="notification-title">Mark All as
                                                read</span></a>
                                        <a href="{{ route('deletNotification') }}" class="clear-noti">Clear All </a>
                                    </div>
                                    <div class="noti-content">
                                        <ul class="notification-list">
                                            <li style="background-color:lightgray" class="notification-message">


           @foreach (auth()->user()->unreadNotifications as $notification)
                                                    @if ($notification->type === 'App\Notifications\AcceptToService')
                              <a href="{{ '/my_booking/' . Auth::user()->id }}">

                <div class="media">
          <span class="avatar avatar-md">
      {{-- @if (isset(Auth::user()->info->image) && !empty(Auth::user()->info->image)) --}}
                                                                     
      @foreach(session('image') as $key=>$value)
                                          
      {{-- {{session('image')}} --}}
      @if($key == $notification->data['user']['id'])
<img class="avatar-lg rounded-circle" alt=""
src="{{asset('uploads/photo/'.$value )}}" > 
@endif
@endforeach

                                                                    {{-- @endif --}}
                                                                </span>
                                                                <div class="media-body">
                                                                    <p class="noti-details"> <span
                                                                            class="noti-title">{{ $notification->data['Provider']['name'] }}
                                                                            Accepted your booking for
                                                                            {{ $notification->data['service']['name'] }}
                                                                            service</span></p>
                                                                    <p class="noti-time"><span
                                                                            class="notification-time">{{ $notification->created_at }}</span>
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </li>

                                            {{-- ***************************************READ NOTIFICATION --}}

                                            <ul class="notification-list">
                                                <li class="notification-message">
                                                    @foreach (auth()->user()->readNotifications as $notification)
                                                        <a href="{{ '/my_booking/' . Auth::user()->id }}">

                                                            <div class="media">
                                                                <span class="avatar avatar-sm">
                                                                    @foreach(session('image') as $key=>$value)
                                          
                                                                    {{-- {{session('image')}} --}}
                                                                    @if($key == $notification->data['user']['id'])
                                       <img class="avatar-lg rounded-circle" alt=""
                                         src="{{asset('uploads/photo/'.$value )}}" > 
                                         @endif
                                       @endforeach
                                                                </span>
                                                                <div class="media-body">

                                                                    <p class="noti-details"> <span
                                                                            class="noti-title">{{ $notification->data['Provider']['name'] }}
                                                                            booked
                                                                            {{ $notification->data['service']['name'] }}
                                                                            service</span></p>
                                                                    <p class="noti-time"><span
                                                                            class="notification-time">{{ $notification->created_at }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>



                                                    @endforeach
                                                </li>
                                            </ul>

                                            {{-- @endif --}}
                                            {{-- .*****************notification in user dashboard for Rejected ************** --}}

                                            <li class="notification-message">

                                                @foreach (auth()->user()->unreadNotifications as $notification)
                                                    @if ($notification->type === 'App\Notifications\RejectByProvider')
                                                    <a href="{{ '/my_booking/' . Auth::user()->id }}">
                                                            <div class="media">
                                                                <span class="avatar avatar-sm">
                                                                    @foreach(session('image') as $key=>$value)
                                          
                                                                    {{-- {{session('image')}} --}}
                                                                    @if($key == $notification->data['user']['id'])
                                       <img class="avatar-lg rounded-circle" alt=""
                                         src="{{asset('uploads/photo/'.$value )}}" > 
                                         @endif
                                       @endforeach
                                                                </span>
                                                                <div class="media-body">
                                                                    <p class="noti-details"> <span
                                                                            class="noti-title">{{ $notification->data['Provider']['name'] }}
                                                                            Rejected your booking for
                                                                            {{ $notification->data['service']['name'] }}
                                                                            service</span></p>
                                                                    <p class="noti-time"><span
                                                                            class="notification-time">{{ $notification->created_at }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    @endif
                                                @endforeach
                                            </li>

                                        </ul>
                                        @if (count(Auth::user()->Notifications) === 0)
                                            <p style="background-color:rgb(247, 244, 244)" class="noti-details p-5">
                                                <span class="noti-title">No unread Notifications</span></p>
                                        @endif


                                    </div>
                                    <div class="topnav-dropdown-footer">
                                        <a href="{{ route('ShowNotificationForUser') }}">View all Notifications</a>
                                    </div>
                                </div>
                            </li>
                            <!-- /Notifications -->
                            
                            <li class="nav-item dropdown has-arrow logged-item ">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"
                                    aria-expanded="false">
    @if (isset(Auth::user()->info->image) && !empty(Auth::user()->info->image))
    
                                        <span class="user-img">
                                            <img src="{{ asset('uploads/photo/' . Auth::user()->info->image) }}"
                                                class="avatar-img rounded-circle" alt="image" width="150px"
                                                height="150px">
                                        </span>
                                    @else
                                        <span class="user-img">
                                            <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                class="avatar-img rounded-circle" alt="image" width="150px"
                                                height="150px">
                                        </span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="user-header">
  @if (isset(Auth::user()->info->image) && !empty(Auth::user()->info->image))
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('uploads/photo/' . Auth::user()->info->image) }}"
                                                    class="avatar-img rounded-circle" alt="image" width="150px"
                                                    height="150px">
                                            </div>
                                        @else
                                            <div class="avatar avatar-sm">
                                                <img src="https://static1.squarespace.com/static/54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/1519987239570/icon.png?format=1500w"
                                                    class="avatar-img rounded-circle" alt="image" width="150px"
                                                    height="150px">
                                            </div>
                                        @endif

                                        <div class="user-text">
                                            <h6 class="text-truncate">{{ Auth::user()->name }}</h6>
                                            <p class="text-muted mb-0">User</p>

                                        </div>

                                    </div>
                                    <a class="dropdown-item"
                                        href="http://127.0.0.1:8000/user/dashboard/{{ Auth::user()->id }}">
                                        Dashboard</a>

                                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>




                    @endif
                @endif
                {{-- <h1>{{Auth::user()}}</h1> --}}

            </nav>
        </header>


        @yield('section1')
        <!-- Footer -->
        <footer class="footer">

            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Quick Links </h2>
                                <ul>
                                    <li>
                                        <a href="http://127.0.0.1:8000/about">About Us</a>
                                    </li>
                                    <li>
                                        <a href="http://127.0.0.1:8000/contactus">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="faq.php">Faq</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Categories</h2>
                                <ul>
                                    <li>
                                        <a href="search.php">Child Care </a>
                                    </li>
                                    <li>
                                        <a href="search.php">Electrical </a>
                                    </li>
                                    <li>
                                        <a href="search.php">Plumping</a>
                                    </li>
                                    <li>
                                        <a href="search.php">Painting</a>
                                    </li>
                                    <li>
                                        <a href="search.php">Cleaning</a>
                                    </li>
                                    {{-- <li>
                                        <a href="search.php">Blacksmith</a>
                                    </li>
                                    <li>
                                        <a href="search.php">Window Treatments</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <span><i class="far fa-building"></i></span>
                                        <p>Amman , Jordan,Macca-street </p>
                                    </div>
                                    <p><i class="fas fa-headphones"></i> +962 77 5428755</p>
                                    <p class="mb-0"><i class="fas fa-envelope"></i> wecare@gmail.com</p>
                                </div>
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Footer Widget -->
                            <div class="footer-widget">
                                <h2 class="footer-title">Follow Us</h2>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="subscribe-form">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <button type="submit" class="btn footer-btn">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div> --}}
                            </div>
                            <!-- /Footer Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Footer Top -->

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">&copy; 2021 <a href="http://127.0.0.1:8000/landing">wecare</a>. All rights reserved.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <!-- Copyright Menu -->
                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li>
                                            <a href="term-condition.html">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Privacy</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Copyright Menu -->
                            </div>
                        </div>
                    </div>
                    <!-- /Copyright -->
                </div>
            </div>
            <!-- /Footer Bottom -->

        </footer>
        <!-- /Footer -->

    </div>



    <!-- jQuery -->
    <script src="{{asset('public_theme/js/jquery-3.5.0.min.js')}}"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('public_theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('public_theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- Owl JS -->
    <script src="{{ asset('public_theme/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Custom JS -->
    {{-- <script src="{{asset('public_theme/js/script.js')}}"></script> --}}

    <script src="{{ asset('public_theme/js/sorting_script.js') }}"></script>

    <script src="https://js.arcgis.com/4.18/"></script>

   
@if(Session::has('record_added'))
<script>
    toastr.options.timeOut = 0;
toastr.options.extendedTimeOut = 0;
toastr.success("{!!Session::get('record_added')!!}");
    </script>
@endif
@if(Session::has('record_delete'))
<script>
    toastr.options.timeOut = 0;
toastr.options.extendedTimeOut = 0;
toastr.success("{!!Session::get('record_delete')!!}");
    </script>
@endif

@if(Session::has('record_updated'))
<script>
    toastr.options.timeOut = 0;
toastr.options.extendedTimeOut = 0;
toastr.success("{!!Session::get('record_updated')!!}");
    </script>
@endif


    <script src="{{ asset('public_theme/js/geolocation.js') }}"></script>

</body>

</html>
