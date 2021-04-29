
            @extends('layout.public_main')	
            @section('section1')
		

	
		
		<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>Search Results</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Search Results</li>
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
					<div class="col-lg-2 theiaStickySidebar">
						{{-- <div class="card filter-card"> --}}
							{{-- <div class="card-body"> --}}
								{{-- <h4 class="card-title mb-4">Search Filter</h4> --}}
								{{-- <form id="search_form">
							
									<div class="filter-widget">
						
										<div class="filter-list">
											<h4 class="filter-title">Sort By</h4>
					<select name="sort4" id="sort4"  class="form-control selectbox select">
											
			<option value="lth" @if(isset($_POST['sort4']) && $_POST['sort4']=="lth")      selected=""  @endif >Price Low to High</option>
			<option value="htl" @if(isset($_POST['sort4']) && $_POST['sort4']=="htl")      selected=""  @endif >Price High to Low</option>
			<option value="new" @if(isset($_POST['sort4']) && $_POST['sort4']=="new")      selected=""  @endif >Newest</option>
											</select>
				
													</div>	
									
							
									</div> --}}
									{{-- <button class="btn btn-primary pl-5 pr-5 btn-block get_services" type="button">Search</button> --}}
								{{-- </form> --}}
							{{-- </div> --}}
						{{-- </div> --}}
					</div>
					<div class="col-lg-9">
						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">
								<h4>Search results:          <span>{{$serviesNo}}</span> Services</h4>
							</div>
				
						</div>
						<div>
							<div class="row">
                                @foreach( $services as  $s)
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
										    <a href="{{('PostsCategories/service/'.$s->id)}}">
                                                <img src="{{asset('uploads/photo/'.$s->image)}}" alt="image" width="400px" height="150px">
											</a>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="{{asset('uploads/photo/'.$s->ProviderService->info->image)}}" alt="">
													</a>	
                                                    <span class="service-price">{{$s->price}}JD</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details.html">{{$s->provider_name}}</a>
												</div>
											</div>
										</div>
										<div class="service-content">
											<h3 class="title">
                                                {{$s->name}}
											</h3>
											<div class="rating">	
												@if((round($s->reviewService->avg('rating'))  !== null) && !empty(round($s->reviewService->avg('rating'))))
						@for($star= 1 ;$star <= 5 ; $star++ )
													
															@if(round($s->reviewService->avg('rating')) >= $star)
																	<i class="fas fa-star filled "></i>
																@else
																	  <i class="fas fa-star "></i>
																	  @endif
																  @endfor
																			  
	<span class="d-inline-block average-rating">({{round($s->reviewService->avg('rating'))}})</span>
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
														<i class="fas fa-map-marker-alt ml-2"></i><span style='margin-left: .5rem'>{{$s->location}}</span> 
													</span>
												
												</div>
											</div>
										</div>
									</div>
								</div>
							
                                @endforeach

							
								
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>﻿
				

		
	
		
		@endsection