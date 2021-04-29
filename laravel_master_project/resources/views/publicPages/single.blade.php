@extends('layout.public_main')	
@section('section1')


		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="service-view">
							@if(!empty($services))
						{{-- @if(!empty($pict)) --}}
							<div class="service-header">
								<h1>{{$services->name}}</h1>
								<address class="service-location"><i class="fas fa-location-arrow"></i> {{$services->location}}</address>
								<div class="rating">
									{{-- {{$reviewSum}} --}}	
								@if(isset($reviewSum) && !empty($reviewSum))
							
									@for($star= 1 ;$star <= 5 ; $star++ )
								
									@if($reviewSum >= $star)
									<i class="fas fa-star filled "></i>
									@else
								  <i class="fas fa-star "></i>
								  @endif
								  	@endfor
				  
									<span class="d-inline-block average-rating">({{$reviewSum}})</span>
									@endif
								
								</div>
								<div class="service-cate">
									@if(isset($catName))
									<a href="">{{$catName}}</a>
								@endif
								</div>
							
							</div>
							<div class="service-images service-carousel">
								<div class="">
									<div class="item">
										<img src="{{asset('uploads/photo/'.$services->image)}}" alt="" class="img-fluid" alt="image" width='640px' height='426px'>
									</div>

								</div>
							</div>
							<div class="service-details">
								{{-- <div class="item">
									<img src="{{asset('uploads/photo/'.$services->image)}}" alt="" class="img-fluid" alt="image" width='400px' height='200px'>
								</div> --}}
								<ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
									</li>
									
									<li class="nav-item">
									<a   class="nav-link" id="pills-book-tab" data-toggle="pill" href="#pills-book" role="tab" aria-controls="pills-book" aria-selected="false">Reviews</a>

									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Services Offered</a>

									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="card service-description">
											<div class="card-body">
												<h5 class="card-title">Service Details</h5>
												<p class="mb-0">{{$services->desc}}</p>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title">Services Offered</h5>
												<div class="service-offer">
													<ul class="list-bullet">
														<li>Lorem Ipsum</li>
														<li>Lorem Ipsum</li>
														<li>Lorem Ipsum</li>
														<li>Lorem Ipsum</li>
														<li>Lorem Ipsum</li>
													</ul>
												</div>
											</div>
										</div>
									</div>



								
{{-- &&  
(App\review::where('service_id',$services->id)->exists()) && 
(App\review::whereNull('rating')->exists())    --}}

				<div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab">			
										<div class="card review-box">
											
	@if(Auth::check() && 
	!(App\review::where([['service_id',$services->id] ,['user_id' , Auth::user()->id]])->exists())  &&(App\booking::where([['service_id',$services->id] ,['status' , 'completed']])->exists()) && 
	(App\booking::where([['service_id',$services->id] ,['user_id' , Auth::user()->id]])->exists()))


											<div class="content">
												<div class="container">
													<div class="row justify-content-center">
														<div class="col-lg-12">

												
															<div class="section-header text-center">
																<h4>Add Rating</h4>
															</div>
															
	<form action="{{'/reviews/'.$services->id}}" method="post" enctype="multipart/form-data"  >
												@csrf
		
						               	<div class="form-row align-items-center">
                   <div class="row">
    
					<div class="col-lg-6">
						<div class="form-group">

					 <label class="mr-sm-2" for="inlineFormCustomSelect">Rating from 1 to 5</label>	
				<select class="form-control"  name="rating" data-msg="Please select number." >
															<option value="1">1-Awful</option>
															<option value="2">2-Not too good</option>
															<option value="3">3-Average</option>
															<option value="4">4-good</option>
															<option value="5">5-Awesome!</option>
														</select>
													</div>
												</div>
													
												<div class="col-lg-6">
													<div class="form-group">
						<label class="mr-sm-2" for="inlineFormCustomSelect">Write a comment ...</label>	
						<textarea  rows="5" cols="80" class="form-control"  name="writehere" value="{{Auth::user()->id}}" placeholder="Leave comment here" class="form-control" type="text"  value="pending"   type="text"  autocomplete="off" ></textarea>
					
				
													</div>
												</div>
                                         </div>

													  <div class="col-lg-12">
														<div>
															<input type="hidden" id="custId" name="user_id" value="{{Auth::user()->id}}">
														 </div>
															</div>
															<div class="col-lg-12">
																<div>
						<input type="hidden" id="custId" name="service_id" value="{{$services->id}}">
																 </div>
																	</div>

														
													  <div class="col-auto my-1">
														<button type="submit" class="btn btn-primary">Submit</button>
													  </div>
													</div>
											
												  </form>
												
											

														</div>
													</div>
												</div>
											</div>
												  @endif 
											{{-- ************************ --}}
									


                                                    
											<div class="card-body">

												@foreach($reviews  as $review)
										
												<div class="review-list">
													
                                                    <div class="review-img">
@if(isset($review->Userreview->info->image)  && !empty($review->Userreview->info->image) )
     
	<img class="rounded-circle" src="{{asset('uploads/photo/'.$review->Userreview->info->image) }}" alt="">
														@else
<img src="https://static1.squarespace.com/static/
54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="100px" height="100px">
	
@endif

													</div>
                                                    <div class="review-info">
                                                        <h5>{{$review->Userreview->name}}</h5>
                                  <div class="review-date">{{$review->created_at}}</div>
                                                        <p class="mb-0">{{$review->writehere}}</p>
                                                    </div>
                                                    <div class="review-count">
                                                        <div class="rating">
								 @for ($star= 1 ;$star <= 5 ; $star++ )
								 @if($review->rating >= $star)
										  <i class="fas fa-star filled "></i>
										  @else
										<i class="fas fa-star "></i>
										@endif
										@endfor
						
		   <span class="d-inline-block average-rating">({{$review->rating}}) </span>
								
                                                        </div>
                                                    </div>
                                                </div>
								
											@endforeach
									</div>
								</div>
							</div>
						
						</div>
										
					

							
							</div>
						</div>
					</div>
					

		

					<div class="col-lg-4 theiaStickySidebar">
						<div class="sidebar-widget widget">
							<div class="service-amount">
								<span>{{$services->price}}JD</span>
							</div>
							@if(auth()->check())
							<div class="service-book">
								<a href="book/{{$services->id}}" class="btn btn-primary"> Book Service </a>
							</div>
							@else
							@endif
						</div>
						<div class="card provider-widget clearfix">
							<div class="card-body">
								<h5 class="card-title">Service Provider</h5>
								<div class="about-author">
									<div class="about-provider-img">
										<div class="provider-img-wrap">
										
					<a href="javascript:void(0);">
@if(isset($services->ProviderService->info->image)  && !empty($services->ProviderService->info->image) )

<img class="img-fluid rounded-circle" alt="" src="{{asset('uploads/photo/'.$services->ProviderService->info->image)}}" >

@else
<img src="https://static1.squarespace.com/static/
54b7b93ce4b0a3e130d5d232/54e20ebce4b014cdbc3fd71b/5a992947e2c48320418ae5e0/
1519987239570/icon.png?format=1500w"  class="avatar-img rounded-circle"  alt="image" width="80px" height="80px">
							

@endif
											</a>
									
										</div>
									</div>
									<div class="provider-details">
										<a href="javascript:void(0);" class="ser-provider-name">{{$services->provider_name}}</a>
										<p class="last-seen"><i class="fas fa-circle online"></i> Online</p>
										<p class="text-muted mb-1">Member Since Apr 2021</p>
									</div>
								</div>
								<hr>
								<div class="provider-info">
									<p class="mb-1"><i class="far fa-envelope"></i> <a href="#">{{$services->ProviderService->email}}</a></p>
								</div> 
							</div>
						</div>
						 <div class="card available-widget">
							<div class="card-body">
								<h5 class="card-title">Service Availability</h5>

								@foreach($ava as $avalable)


								<ul>
@if(App\avalability::where([['id',$avalable->id] ,['status' , 'avalable']])->exists())
<li><span>{{ Carbon\Carbon::parse($avalable->day)->format('l') }} &nbsp;&nbsp;&nbsp;  {{$avalable->day}}</span>{{$avalable->from}} - {{$avalable->to}}</li>

                    @endif
			
								@endforeach
                                      </ul>
					
						 </div> 
						</div>
					</div>
	
		

	<h4 class="card-title"></h4>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			
						<div class="heading">
							<h2>Related Services</h2>
							<span>Explore the greates our services. You won’t be disappointed</span>
						</div>
					</div>
				

			</div>
		</div>
	</div>

		{{-- <div class="container">
				<div class="row"> --}}
					<div class="col-xl-12 col-md-10">
						<div class="row">
	@if(isset($RelatedServices))
	@foreach($RelatedServices  as $one)
	{{-- ***********************To prevent show the same service in related service  --}}
	@if($one->id == $services->id)


	@else
	<div class="col-lg-4 col-md-6">

	{{-- <div class="service-carousel">
		<div class="popular-slider owl-carousel owl-theme"> --}}
			
			<div class="service-widget">
				<div class="service-img">
					<a href="{{('./'.$one->id)}}">
						<img class="img-fluid serv-img" alt="Service Image" src="{{asset('uploads/photo/'.$one->image)}}">

					</a>
					<div class="item-info">
						<div class="service-user">
							{{-- <a href="#">
								<img src="{{asset('uploads/photo/'.$one->ProviderService->info->image)}}" alt="">
							</a> --}}
							<span class="service-price">{{$one->price}}JD</span>
						</div>
						<div class="cate-list">
							<a class="bg-yellow" href="service-details.html">{{$one->provider_name}}</a>
						</div>
					</div>
				</div>
				<div class="service-content">
					<h3 class="title">
						<a href="service-details.html">{{$one->name}}</a>
					</h3>
					<div class="rating">
						@if(isset($one->reviewService) && !empty($one->reviewService)  )

							
						@for($star= 1 ;$star <= 5 ; $star++ )
						@if($one->reviewService->avg('rating') >= $star)
						<i class="fas fa-star filled "></i>
						@else
					  <i class="fas fa-star "></i>
					  @endif
						  @endfor
	  
						<span class="d-inline-block average-rating">({{$one->reviewService->avg('rating')}})</span>
						@endif
					</div>
					<div class="user-info">
						<div class="row">
					
							<span style='margin-left: .5rem'>
								<i class="fas fa-map-marker-alt ml-2"></i><span style='margin-left: .5rem'>{{$one->location}}</span> 
							</span>
						</div>
					</div>
				</div>
			</div>
			

		{{-- </div>
	</div> --}}
	
	</div>
	@endif
	
			@endforeach
			@endif


		</div>
	</div>
</div>
</div>


</div>
</div>
{{-- </div>﻿



</div>   --}}





















	
	@else
	@endif
    @endsection