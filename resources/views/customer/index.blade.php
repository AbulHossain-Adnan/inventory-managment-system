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
						<a class="btn btn-success btn-sm" href="{{route('customer.create')}}">ADD NEW CUSTOMER+</a>
						<table class="table example">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Phone</th>
									<th scope="col">Address</th>
									<th scope="col">actions</th>

								</tr>
							</thead>
							<tfoot>
								

								
							</tfoot>
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



<script>
	$(document).ready(function(){
		$('.example').DataTable({
	     "processing": true,
            "serverSide": true,
              "ajax":{
                     "url": "{{ route('customer.alldata') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
         "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "address" },
                { "data": "options" },
               
            ]});



	});
</script>



<!-- scrip for delete data -->

<script type="text/javascript">
	function deletbtn(id){
	
	$.ajax({
		type:'DELETE',
		datatype:'json',
		url:"/customer/"+id,
		"data":{ _token: "{{csrf_token()}}"},
		success:function(data){
			$('.example').DataTable().ajax.reload()

		}
	})
}
              </script>







	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop