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
						<button class="btn btn-success btn-block">Order Details</button>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Order_Id</th>
									<th scope="col">Product_Id</th>
									<th scope="col">customer_id</th>
									<th scope="col">product_name</th>
									<th scope="col">product_price</th>
									<th scope="col">product_quantity</th>
								
								</tr>
							</thead>
							<tbody>
								@foreach($order_details as $item)

								<tr>
									<th scope="row">{{$item->id}}</th>
									<td>{{$item->order_id}}</td>
									<td>{{$item->product_id}}</td>
									<td>{{$item->customer_id}}</td>
									<td>{{$item->product_name}}</td>
									<td>{{$item->product_price}}</td>
									<td>{{$item->product_quantity}}</td>

								</tr>
					@endforeach
							</tbody>

						</table>
					<a href="{{route('order.index')}}" class="btn btn-info btn-sm">Back to OrderList</a>
     
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