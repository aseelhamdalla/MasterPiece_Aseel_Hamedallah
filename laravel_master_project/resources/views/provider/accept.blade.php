@extends('layout.public_main')	
@section('section1')
		
		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Book Service</h2>
						</div>
                        <form action="/accepted/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"  >
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Service Location <span class="text-danger">*</span></label>
										<input class="form-control" name="service_location"  value="{{$services->location}}" type="text" placeholder="Enter a location" autocomplete="off">
									</div>                            
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Service amount</label>
										<input class="form-control" type="text"  name="service_price" value="{{$services->price}}" readonly>
									</div>
								</div>
							
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Date <span class="text-danger">*</span></label>
										<select class="form-control" name="avalability_id" data-msg="Please select Job Category." >
											<option value="">Select Time</option>
										@foreach($avalabilites as $avalability)
<option value={{$avalability->id}}>{{$avalability->day}}</option>
@endforeach
</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Time slot <span class="text-danger">*</span></label>
										<select class="form-control"  data-msg="Please select Job Category." >
											<option value="">Select Time</option>

@foreach($avalabilites as $avalability)
<option value={{$avalability->id}}>{{$avalability->from}}-{{$avalability->to}}</option>
@endforeach
											</select>
									</div>
								</div>
				

								<div class="col-lg-12">
									<div class="form-group">
										<div class="text-center">
											<div id="load_div"></div>
										</div>
										<label>Notes</label>
										<textarea class="form-control" rows="5"  name="notes"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<div class="text-center">
											<div id="load_div"></div>
										</div>
										<input type="hidden" class="form-control" rows="5"  name="status"  value="pending"   type="text"  autocomplete="off" >
	

									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="hidden" id="custId" name="user_id" value="{{Auth::user()->id}}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="hidden" id="custId" name="provider_id" value={{$services->user_id}} type="text"  autocomplete="off" >  
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
							<input type="hidden" class="form-control" name="service_id"  value={{$services->id}}  type="text"  autocomplete="off">

								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
							<input type="hidden" class="form-control" name="provider_name"  value={{$services->provider_name}}  type="text" autocomplete="off">

								</div>
							</div>


							<div class="col-lg-6">
								<div class="form-group">
							<input type="hidden" class="form-control" name="provider_phone"  value={{$services->provider_phone}}  type="text"  autocomplete="off">

								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
							<input type="hidden" class="form-control" name="service_name"  value="{{$services->name}}"  type="text"  autocomplete="off">

								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit">Continue to Book</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>﻿

        @endsection