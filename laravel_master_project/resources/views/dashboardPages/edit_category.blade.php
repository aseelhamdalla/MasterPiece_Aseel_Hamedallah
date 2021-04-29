
		@extends('layout.dashboard_main')
        @section('section1')
        
		
		
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<h3 class="page-title">Edit Category</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
                                <form action="/category/{{$categorie->id}}/update" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="form-group">
										<label>Category Name</label>
										<input class="form-control" type="text" name="name"   value="{{$categorie->name}}">
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input class="form-control" type="file"  name="image">
									</div>
					
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Save Changes</button>
									</div>
								</form>
								<!-- /Form -->
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        @endsection