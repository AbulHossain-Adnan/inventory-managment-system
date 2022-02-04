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
						<div class="card text-center">
  <div class="card-header">
    <h4>RealTime Job Processing Status</h4>
  </div>
  <div class="card-body">
    
    <p class="card-text"><h4>Data Stored House</h4></p>
    @if(!is_null($batch))
						<div class="mt-4 m-auto">
	<h5>{{$batch->processedJobs()}} complete Out of {{$batch->totalJobs}}</h5> <br><h2>{{$batch->progress()}}%</h2>
						</div>

						

						
  </div>
  <div class="card-footer text-muted">
	Failed Job ::{{$batch->failedJobs}} <br>
	processedJobs:: {{$batch->processedJobs()}}<br>
	cancelled Job:: {{$batch->cancelled()}}

  </div>
  @endif
</div> 
</div>
						
</div>
</div>

<!-- plane javascript for reload hole window -->

	@if(!is_null($batch) && $batch->progress() < 100)

			<script type="text/javascript">

				window.setInterval('refresh()',4000);

				function refresh(){

					window.location.reload();
				}
			</script>
			@endif
		</section>
	</div>



	@jquery
	@toastr_js
	@toastr_render
	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop