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
			<div class="col-sm-11 m-auto">
				<div class="card">
					<div class="card-body">
						<a class="btn btn-success btn-sm btn-block" href=""><h3>Each Product  Details</h3></a>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Product Image</th>
									<th scope="col">Product Id</th>
									<th scope="col">Category Id</th>
									<th scope="col">SubCategory Id</th>
									<th scope="col">Name</th>
									<th scope="col">PRICE</th>
									<th scope="col">Quantity</th>
									<th scope="col">Alert Quantity</th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php
								$data= $product->image;
								
								$images=explode('|',$data);
								?>
								<tr>
									<td>
										@foreach($images as $image)
										
										<img src="{{asset('product_images/'.$image)}}" style="width: 60px;height: 60px;">
										@endforeach
									</td>
									
									<td>
										{{$product->id}}
									</td>
									<td>{{$product->category_id}}</td>
									<td>{{$product->subcategory_id}}</td>
									<td>{{$product->name}}</td>
									<td>{{$product->price}}</td>
									<td>{{$product->quantity}}</td>
									<td>{{$product->min_qty}}</td>
								</tr>
								
							</tbody>
						</table>
						
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