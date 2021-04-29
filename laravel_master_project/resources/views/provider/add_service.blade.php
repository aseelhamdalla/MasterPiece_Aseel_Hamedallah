@extends('layout.public_main')	
@section('section1')
		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Add Service</h2>
						</div>
						<form action="/create/{{Auth::user()->id}}" method="post" enctype="multipart/form-data"  >
							@csrf
							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Information</h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Service Title <span class="text-danger">*</span></label> 
					<input  name="name"  class="form-control" type="text" value="{{ old('name') }}" >

										</div>
				<div style="color:red; margin:15px  0 15px 0">{{$errors->first('name')}}</div>


									</div>
									<div class="col-lg-12">
										<div>
					<input type="hidden" id="custId" name="user_id" value="{{Auth::user()->id}}">
										 </div>

										 
											</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Provider name <span class="text-danger">*</span></label> 
											<input  name="provider_name"  class="form-control" type="text"  value='{{Auth::user()->name}}'>
										</div>

										<div style="color:red; margin:15px  0 15px 0">{{$errors->first('provider_name')}}</div>
									</div>
									
									<div class="col-lg-6">
										<div class="form-group">
											<label>Provider Phone  <span class="text-danger">*</span></label> 
											<input  name="provider_phone"  class="form-control" type="text" value="{{ old('provider_phone') }}" >
										</div>

										<div style="color:red; margin:15px  0 15px 0">{{$errors->first('provider_phone')}}</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Amount <span class="text-danger">*</span></label>
											<input name="price"  value="" data-type="currency" placeholder=" JD"  class="form-control" type="text" value="{{ old('price') }}">
										</div>
										<div style="color:red; margin:15px  0 15px 0">{{$errors->first('price')}}</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Location <span class="text-danger">*</span></label>
											<input name="location"  class="form-control" type="text" value="{{ old('location') }}">
										</div>
										<div style="color:red; margin:15px  0 15px 0">{{$errors->first('location')}}</div>
									</div>
								</div>
							</div>
							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Category</h3>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Category <span class="text-danger">*</span></label>
											<select class="form-control" name="category_id" data-msg="Please select Job Category."  >
											<option value="">Select Category</option>

@foreach($categories as $categorie )
<option value={{$categorie->id}}>{{$categorie->name}}</option>
@endforeach
											</select>
											<div style="color:red; margin:15px  0 15px 0">{{$errors->first('category_id')}}</div>
										</div>
									</div>
								
								</div>
							</div>
	
							<div class="service-fields mb-3">
								<h3 class="heading-2">Details Information</h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Descriptions <span class="text-danger">*</span></label>
											<textarea name="desc" value="{{ old('desc') }}" class="form-control service-desc"></textarea>
										</div>
										<div style="color:red; margin:15px  0 15px 0">{{$errors->first('desc')}}</div>
									</div>
								</div>
							</div>
							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Gallery </h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="service-upload">
											<i class="fas fa-cloud-upload-alt"></i> <span>Upload Service Images *</span>
					<input name="image" type="file" multiple >
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
	