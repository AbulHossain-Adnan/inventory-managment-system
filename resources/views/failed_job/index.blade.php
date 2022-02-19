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
						<table class="table" id="data-table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">uuid </th>
									<!-- <th scope="col">connection </th>
									<th scope="col">queue </th> -->
									<!-- <th scope="col">payload </th> -->
									<!-- <th scope="col">exception </th> -->
									<th scope="col">failed_at </th>
									<th scope="col">ACTIONS</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						 
					</div>
				</div>
			</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


		<script type="text/javascript">
  $(function () {

  
    var Table = $('#data-table').DataTable({

        processing: true,

        serverSide: true,

         ajax: "{{ route('failed_job.index') }}",
	
        columns: [

            {data: 'id', name: 'id'},
            {data: 'uuid', name: 'uuid'},
            // {data: 'connection', name: 'connection'},
            // {data: 'queue', name: 'queue'},
            // {data: 'payload', name: 'payload'},
            // {data: 'exception', name: 'exception'},
            {data: 'failed_at', name: 'failed_at'},
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