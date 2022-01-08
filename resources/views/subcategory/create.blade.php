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
						<form action="{{route('sub_category.store')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="exampleInputEmail1">NAME</label>
								@error('name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<input type="text" name="name" class="form-control" placeholder="name">
								
							</div>
							<div class="form-group">
								<select class="form-control select2" data-placeholder="Choose country" name="category_id">
									<option label="Choose category"></option>
									@foreach ($categories as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach
								</select>
								
							</div>
							
							<a class="btn btn-warning" type="button"  href="{{route('sub_category.index')}}">BACK</a>
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