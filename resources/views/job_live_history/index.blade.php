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
						
						<a class="btn btn-success btn-sm" href="{{route('category.create')}}">ADD NEW CATEGORY+</a>

						<table class="table" id="data-table">
							<thead>
								<tr>
									<!-- <th scope="col">Id</th> -->
									<th scope="col">name</th>
									<th scope="col">total jobs</th>
									<th scope="col">pending jobs</th>
									<th scope="col">failed jobs</th>
									<th scope="col">failed job_ids</th>
									<!-- <th scope="col">options</th> -->
									<th scope="col">cancelled at</th>
									<th scope="col">created at</th>
									<th scope="col">finished at</th>
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

         ajax: "{{ route('job_live_history') }}",
	
        columns: [

            // {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'total_jobs', name: 'total_jobs'},
            {data: 'pending_jobs', name: 'pending_jobs'},
            {data: 'failed_jobs', name: 'failed_jobs'},
            {data: 'failed_job_ids', name: 'failed_job_ids'},
            // {data: 'options', name: 'options'},
            {data: 'cancelled_at', name: 'cancelled_at'},
            {data: 'created_at', name: 'created_at'},
            {data: 'finished_at', name: 'finished_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]

    });
  });

</script>


			<script type="text/javascript">

				window.setInterval('refresh()',2000);

				function refresh(){

					$('#data-table').DataTable().ajax.reload();
				}
			</script>
			
	</div>
	@jquery
	@toastr_js
	@toastr_render
	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop