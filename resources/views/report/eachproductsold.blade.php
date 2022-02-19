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
						<button class="btn btn-success btn-block"><h2>Each Product Sold lists</h2></button>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Product Id</th>
								
									<th scope="col">Total Sold</th>
									
									<th scope="col">Actions</th>

								
								</tr>
							</thead>
							<tbody>
								@foreach($collection  as $item)
								<tr>
									<td>{{$item->product_id}}</td>
									<td>{{$item->total}}</td>
									<td>
										<a href="{{url('each_product_sold/view',$item->product_id)}}"  class="btn btn-success btn-sm">View</a>
										<a  class="btn btn-warning btn-sm">View</a>

									</td>

								</tr>
								@endforeach
							</tbody>

						</table>
					<a href="{{route('product.index')}}" class="btn btn-success btn-sm">Back to Product List</a>
  {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $collection->links() !!}
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