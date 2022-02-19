@extends('layouts.app')
@section('app_content')
<!-- Navbar -->
@includeIf('backend.include.navbar')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@includeIf('backend.include.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	@includeIf('backend.include.breadcumb')
	<!-- Main content -->
	<section class="content p-4">
		<!-- Default box -->
		@yield('master_content')
		@toastr_css
		<!-- /.card -->
		<div class="row">
			<div class="col-sm-10 m-auto">
				<div class="card">
					<div class="card-body">
						<!-- <a class="btn btn-warning btn-sm" href="{{route('sub_category.index')}}">ALL SubCATEGORY</a> -->
						<form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Customer Name</label>
									@error('name')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name ="name" placeholder="Enter your Name">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Customer Email</label>
									@error('email')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="email" class="form-control" name="email" placeholder="Email">
								</div>
								<div class="form-group col-md-6">
									<label for="inputEmail4">Customer Phone</label>
									@error('phone')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name ="phone" placeholder="Phone">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Customer Address</label>
									@error('address')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name="address" placeholder="Address">
								</div>
							</div>
							
							
							
							
						
							<a class="btn btn-warning" type="button"  href="{{route('customer.index')}}">BACK</a>
							<button type="submit" class="btn btn-primary btn">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	@jquery
	@toastr_js
	@toastr_render
	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop