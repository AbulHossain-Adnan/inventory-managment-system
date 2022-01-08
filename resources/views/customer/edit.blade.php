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
						<form action="{{route('customer.update',$customer->id)}}" method="post" >
							@csrf
							@method('PUT')
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Customer Name</label>
									@error('name')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name ="name" value="{{$customer->name}}">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Customer Email</label>
									@error('email')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="email" class="form-control" name="email" value="{{$customer->email}}">
								</div>
								<div class="form-group col-md-6">
									<label for="inputEmail4">Customer Phone</label>
									@error('phone')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name ="phone"value="{{$customer->phone}}">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Customer Address</label>
									@error('address')
									<span class="text-danger">{{$message}}</span>
									@enderror
									<input type="text" class="form-control" name="address" value="{{$customer->address}}">
								</div>
							</div>
							
							
							
							
						
							<a class="btn btn-warning" type="button"  href="{{route('customer.index')}}">BACK</a>
							<button type="submit" class="btn btn-primary btn">Update</button>
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