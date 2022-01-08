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
						
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">customer_id</th>
									<th scope="col">subtotal</th>
									<th scope="col">date</th>
									<th scope="col">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $item)

								<tr>
									<th scope="row">{{$item->id}}</th>
									<td>{{$item->customer_id}}</td>
									<td>{{$item->subtotal}}</td>
									<td>{{$item->date}}</td>

									<td>
										<form action="{{route('order.destroy',$item->id)}}" method="post">
											@csrf
											@method('DELETE')
											
											<a class="btn btn-primary btn-sm" href="{{url('order/details/'.$item->id)}}">details/view</a>
										<button class="btn btn-danger btn-sm" type="submit">Delete</button>
											
										</form>
										
									</td>
								</tr>
					@endforeach
							</tbody>
						</table>
					 {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $orders->links() !!}
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