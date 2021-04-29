@extends('layout.public_main')	
@section('section1')
		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Edit Service</h2>
						</div>
						<form action="{{('update/'.$serviceedit->id)}}" method="post" enctype="multipart/form-data"  >
							@csrf
							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Information</h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Service Title <span class="text-danger">*</span></label> 
		<input  name="name"  class="form-control" type="text"   value='{{$serviceedit->name}}'>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Provider name <span class="text-danger">*</span></label> 
											<input  name="provider_name"  class="form-control" type="text"  value='{{$serviceedit->provider_name}}'>
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Provider Phone  <span class="text-danger">*</span></label> 
											<input  name="provider_phone"  class="form-control" type="text" value='{{$serviceedit->provider_phone}}'>
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Amount <span class="text-danger">*</span></label>
						<input name="price"  placeholder="Price in JD" class="form-control" type="text" value='{{$serviceedit->price}}'>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Location <span class="text-danger">*</span></label>
											<input  name="location"  class="form-control" type="text" value='{{$serviceedit->location}}'>
											
										</div>
									</div>
							
					
								</div>

								<div class="service-fields mb-3">
									<h3 class="heading-2">Details Information</h3>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label>Descriptions <span class="text-danger">*</span></label>
		<textarea name="desc" class="form-control service-desc" value='{{$serviceedit->desc}}' type="text"> </textarea>

											</div>
										
										</div>
									</div>
								</div>


							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Gallery </h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="service-upload">
											<i class="fas fa-cloud-upload-alt"></i> <span>Upload Service Images *</span>
											<input name="image" type="file" multiple>
										</div>

									</div>
								</div>
							</div>
							
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>﻿
		
        @endsection
	