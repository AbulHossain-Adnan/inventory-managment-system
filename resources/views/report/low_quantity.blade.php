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
						<button class="btn btn-success btn-block"><h2>less then 5 quantity product lists</h2></button>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Product Id</th>
								
									<th scope="col">category_id</th>
									<th scope="col">subcategory_id</th>
									<th scope="col"> Product name</th>
									<th scope="col"> Product price</th>
									<th scope="col">Product quantity</th>

								
								</tr>
							</thead>
							<tbody>
								@foreach($low_quantity_products as $item)

								<tr>
									<th scope="row">{{$item->id}}</th>
									
									<td>{{$item->category_id}}</td>
									
									<td>{{$item->subcategory_id}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->price}}</td>
									<td>{{$item->quantity}}</td>


								</tr>
					@endforeach
							</tbody>

						</table>
					<a href="{{route('product.index')}}" class="btn btn-success btn-sm">Back to Product List</a>
    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $low_quantity_products->links() !!}
        </div>
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