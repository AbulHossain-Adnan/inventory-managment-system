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
						<form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Product Name</label>
									
									<input type="text" class="form-control" name ="name" value="{{$product->name}}">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Product Price</label>
									<input type="text" class="form-control" name="price" value="{{$product->price}}">
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Product Quantity</label>
								<input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"> Product Category</label>
								<select multiple class="form-control" id="exampleFormControlSelect2" name="category_id[]">
									
									@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
								
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Product Subcategory</label>
								<select class="form-control" name="subcategory_id" id="exampleFormControlSelect1">
									<option>Chose One</option>
									@foreach($subcategories as $subcategory)
									<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
									@endforeach
								</select>
							</div>
							
							<?php
							$imagedata= $product->image;
															
							$images=explode('|',$imagedata);
							?>
							@foreach($images as $image)
							<img src="{{asset('product_images/'.$image)}}" style="width: 110px;height: 100px;">
							@endforeach
							<div class="form-group">
								<label for="exampleInputEmail1">Product Image</label>
								@error('name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<input type="file" multiple name="image[]" class="form-control" placeholder="name">
								
							</div>
							<a class="btn btn-warning" type="button"  href="{{route('product.index')}}">BACK</a>
							
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