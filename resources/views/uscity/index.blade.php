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
			
				<div class="card">
					<div class="card-body">
				

						<table class="table" id="data-table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">city</th>
									<th scope="col">city ascii</th>
									<th scope="col">state id</th>
									<th scope="col">state name</th>
									<th scope="col">county fips</th>
									<th scope="col">county name</th>
									<th scope="col">lat</th>
									<th scope="col">lng</th>
									<th scope="col">population</th>
									<th scope="col">density</th>
									<th scope="col">source</th>
									<!-- <th scope="col">military</th>
									<th scope="col">incorporated</th>
									<th scope="col">timezone</th>
									<th scope="col">ranking</th>
									<th scope="col">zips</th>
									<th scope="col">idd</th> -->

									<th scope="col">ACTIONS</th>
								</tr>
							</thead>

							<tbody>

							</tbody>
						</table>
						 
					</div>
				</div>
			
		</section>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


		<script type="text/javascript">
  $(function () {

  
    var Table = $('#data-table').DataTable({

        processing: true,

        serverSide: true,

         ajax: "{{ route('uscity.index') }}",
	
        columns: [

            {data: 'id', name: 'id'},
            {data: 'city', name: 'city'},
            {data: 'city_ascii', name: 'city_ascii'},
            {data: 'state_id', name: 'state_id'},
            {data: 'state_name', name: 'state_name'},
            {data: 'county_fips', name: 'county_fips'},
            {data: 'county_name', name: 'county_name'},
            {data: 'lat', name: 'lat'},
            {data: 'lng', name: 'lng'},
            {data: 'population', name: 'population'},
            {data: 'density', name: 'density'},
            {data: 'source', name: 'source'},
            // {data: 'military', name: 'military'},
            // {data: 'incorporated', name: 'incorporated'},
            // {data: 'timezone', name: 'timezone'},
            // {data: 'ranking', name: 'ranking'},
            // {data: 'zips', name: 'zips'},
            // {data: 'idd', name: 'idd'},
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]

    });
  });

</script>
	</div>
	@jquery
	@toastr_js
	@toastr_render
	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop