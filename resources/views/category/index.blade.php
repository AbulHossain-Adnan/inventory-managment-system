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
						<nav class="navbar navbar-light bg-light">
  <form class="form-inline" id="search-form">
  	  <div class="form-group">
    <label for="exampleFormControlSelect1">Number</label>
    <select class="form-control" id="number" name="number">
      <option value="any">Any</option>
      <option value="only">Only</option>
      <option value="mixed">Mixed</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Dash</label>
    <select class="form-control" id="dash" name="dash">
      <option >Any</option>
      <option value="yes">yes</option>
      
    </select>
  </div>
    
     <input class="form-control mr-sm-2" type="text" name="keyword" id="keyword" placeholder="Keyword" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
						<a class="btn btn-success btn-sm" href="{{route('category.create')}}">ADD NEW CATEGORY+</a>

						<table class="table" id="data-table">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Name</th>
									<th scope="col">TITLE</th>
									<th scope="col">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $item)

								<tr>
									<th scope="row">{{$item->id}}</th>
									<td>{{$item->name}}</td>
									<td>{{$item->title}}</td>
									<td>
										<form action="{{route('category.destroy',$item->id)}}" method="post">
											@csrf
											@method('DELETE')
											
											<a class="btn btn-primary btn-sm" href="{{route('category.edit',$item->id)}}">edit/view</a>
										<button class="btn btn-danger btn-sm" type="submit">Delete</button>
											
										</form>
										
									</td>
								</tr>
					@endforeach
							</tbody>
						</table>
						 
					</div>
				</div>
			</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script type="text/javascript">

  $(function () {

    var name=$('#name').val();

    var oTable = $('#data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax:{
        	url:"{{route('category.index')}}",
        	data: function (d) {
               
                d.keyword = $('#keyword').val();
                d.number = $('#number').val();
                d.dash = $('#dash').val();
 
            }
        	
        },

        
       

        columns: [

            {data: 'id', name: 'id'},

            {data: 'name', name: 'name'},

            {data: 'title', name: 'title'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]

    });
  $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
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