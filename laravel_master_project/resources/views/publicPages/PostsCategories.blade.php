
            @extends('layout.public_main')	
            @section('section1')

            	<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>Find a Professional</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="http://127.0.0.1:8000/landing">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Find a Professional</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <!-- /Breadcrumb -->

        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 theiaStickySidebar">
						<div class="card filter-card">
							<div class="card-body">
								<h4 class="card-title mb-4">Search Filter</h4>
	
								<form id="search_form" action="">
									<div class="filter-widget">
										<div class="filter-list">
								<h4 class="filter-title">Sort By</h4>
									<select name="sort" id="sort"  class="form-control selectbox select">
								
<option value="lth" @if(isset($_GET['sort']) && $_GET['sort']=="lth")      selected=""  @endif >Price Low to High</option>
<option value="htl" @if(isset($_GET['sort']) && $_GET['sort']=="htl")      selected=""  @endif >Price High to Low</option>
<option value="new" @if(isset($_GET['sort']) && $_GET['sort']=="new")      selected=""  @endif >Newest</option>
								</select>
	
										</div>	
	
									</div>


							</form>
							</div>
						</div>
					</div>
		
					<div class="col-lg-9">
						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">

								{{-- <h4><span>{{$serviesNo}}</span> Services</h4> --}}
							</div>
							{{-- <div class="col-md-6 col-auto">
								<div class="view-icons">
\	<a href="javascript:void(0);" class="grid-view active"><i class="fas fa-th-large"></i></a>
								</div>
							</div> --}}
						</div>
						<div>
							<div class="row">
								{{-- {{$reviewSum}} --}}
                                @foreach($x as $desc)
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
										
										    <a href="{{('service/'.$desc->id)}}">
  <img src="{{asset('uploads/photo/'.$desc->image)}}" alt="image" width="400px" height="150px">
											</a>
										
											<div class="item-info">
												
												<div class="service-user">
													@if(!empty($desc->ProviderService->info->image))
													<a href="#">
				<img src="{{asset('uploads/photo/'.$desc->ProviderService->info->image)}}" alt="">
													</a>	
													@else
						                   <a href="#">
									<img src="https://static1.squarespace.com/static/
										54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
														1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="50px" height="50px">													</a>

													@endif
                  <span class="service-price">{{$desc->price}}JD</span>
												</div>
												<div class="cate-list">
		<a class="bg-yellow" href="service-details.html">  {{$desc->provider_name}}</a>
												</div>
											</div>
										</div>
										<div class="service-content">
											<h3 class="title">
												{{$desc->name}}
											</h3>
							
											  
        
											<div class="rating">	
@if((round($desc->reviewService->avg('rating'))  !== null) && !empty(round($desc->reviewService->avg('rating'))))
												@for($star= 1 ;$star <= 5 ; $star++ )
											
												@if(round($desc->reviewService->avg('rating')) >= $star)
												<i class="fas fa-star filled "></i>
												@else
											  <i class="fas fa-star "></i>
											  @endif
												  @endfor
							  
												<span class="d-inline-block average-rating">({{round($desc->reviewService->avg('rating'))}})</span>
												@else 
												<i class="fas fa-star "></i>
												<i class="fas fa-star "></i>
												<i class="fas fa-star "></i>
												<i class="fas fa-star "></i>
												<i class="fas fa-star "></i>
												

												@endif
												
											</div>
											<div class="user-info">
												<div class="row">	
										
													<span style='margin-left: .5rem'>
														<i class="fas fa-map-marker-alt ml-2"></i><span style='margin-left: .5rem'>{{$desc->location}}</span> 
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
                                @endforeach
							
						
								
								
								
							</div>



        

                    <div class="content">
                        <div class="container">
                            <div class="row">
                            
                                <div class="col-xl-9 col-md-8">
                         
                                
            
                                    <div class="row">
                                  
                                    </div>
                                      
                                    
                <!-- Pagination Links --> 
                                        {{-- <div class="pagination">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                                <div class="modal-footer">	<a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
                                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Service is Booked and Inprogress..</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>﻿
					</div>
				</div>
                    @endsection