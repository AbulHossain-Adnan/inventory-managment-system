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
			<div class="col-sm-12 m-auto">
				<div class="card">
					<div class="card-body">
						<!-- <a class="btn btn-warning btn-sm" href="{{route('category.index')}}">ALL file</a> -->
						<form action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="exampleInputEmail1">NAME</label>
								@error('name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<input type="file" name="file" class="form-control" placeholder="name">
								
							</div>
							
						
							 <a class="btn btn-warning" type="button"  href="{{route('file.index')}}">BACK</a>
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