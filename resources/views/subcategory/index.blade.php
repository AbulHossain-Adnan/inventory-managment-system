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
						<a class="btn btn-success btn-sm" href="{{route('sub_category.create')}}">ADD NEW SubCATEGORY+</a>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">category_Id</th>
									<th scope="col">Name</th>
									<th scope="col">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								@foreach($subcategories as $item)

								<tr>
									<th scope="row">{{$item->id}}</th>
									<td>{{$item->name}}</td>
									<td>{{$item->category_id}}</td>
									<td>
										<form action="{{route('sub_category.destroy',$item->id)}}" method="post">
											@csrf
											@method('DELETE')
											
											<a class="btn btn-primary btn-sm" href="{{route('sub_category.edit',$item->id)}}">edit/view</a>
										<button class="btn btn-danger btn-sm" type="submit">Delete</button>
											
										</form>
										
									</td>
								</tr>
					@endforeach
							</tbody>
						</table>
						 {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $subcategories->links() !!}
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