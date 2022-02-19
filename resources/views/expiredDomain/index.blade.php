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
					      <option value="only">yes</option>
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
					    <a class="btn btn-success" href="{{route('expireddomain.create')}}" type="submit">PDF</a>
					  </form>
					</nav>
						<table class="table" id="data-table">

							<thead>

								<tr>
								<th><input type = "checkbox" id="checkbox" name="main_checkbox"></th>
									<th scope="col">Id</th>
									<th scope="col">Domain</th>
									<th scope="col">Actions <button type="button" id="deleteAllButton" class="btn btn-danger btn-sm d-none">delete all</button></th>
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

    var name=$('#name').val();

    var oTable = $('#data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax:{
        	url:"{{route('expireddomain.index')}}",
        	data: function (d) {
               
                d.keyword = $('#keyword').val();
                d.number = $('#number').val();
                d.dash = $('#dash').val();
 
            }
        	
        },

        columns: [

            {data: 'checkbox', name: 'checkbox' ,orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'domain', name: 'domain'},
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]
    });
  $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });


    

  });
 
</script>


	
<script>
     //script for select all or deselect all checkbox
	$(document).ready(function(){
		$(document).on('click','input[name="main_checkbox"]', function(){
			if(this.checked){
				$('input[name="domain_checkbox"]').each(function(){
					this.checked = true;
				})
			}
			else{
				$('input[name="domain_checkbox"]').each(function(){
					this.checked = false;
				})
			}
			toggleDeleteAullBtn();
		})
		

		// if all collumn will selected all select checkbox will selected
		$(document).on('change','input[name="domain_checkbox"]',function(){
			if( $('input[name="domain_checkbox"]').length == $('input[name="domain_checkbox"]:checked').length){
				$('input[name="main_checkbox"]').prop('checked',true);
				
			}else{
				$('input[name="main_checkbox"]').prop('checked',false);
			}
			toggleDeleteAullBtn();
		})
		
		// script for collumn delete button show or hide 
		function toggleDeleteAullBtn(){

			if( $('input[name="domain_checkbox"]:checked').length > 0){
				
				$('button#deleteAllButton').text('delete ( '+$('input[name="domain_checkbox"]:checked').length+' ) ').removeClass('d-none');
			}else{
				$('button#deleteAllButton').addClass('d-none');
			}

		}

		// script for bulk delete
		$(document).on('click','#deleteAllButton',function(){
			
			var selectedColumn = [];

			$('input[name="domain_checkbox"]:checked').each(function(){

				selectedColumn.push($(this).data('id'));

			})

			if( selectedColumn.length > 0 ){

                  const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
                  })
                  swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  reverseButtons: true
                  }).then((result) => {
                  if (result.isConfirmed) {
                  $.ajaxSetup({
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                  });
                  $.ajax({
						type:'POST',
						data:'json',
						data:{selectedColumn:selectedColumn},
						url:"/select_column_post",
						success:function(d){
						swalWithBootstrapButtons.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
							).then((result)=>{
								$('#deleteAllButton').addClass('d-none');
						$('input[name="main_checkbox"]').prop('checked',false);
						$('#data-table').DataTable().ajax.reload();
							})
                  		}
                  })
                  } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                  ) {
                  swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                  )
                  }
                  })
			}
	
		})
	
	})
</script>
		
	</div>
	@jquery
	@toastr_js
	@toastr_render
	<!-- /.content-wrapper -->
	@includeIf('backend.include.footer')
	<!-- /.control-sidebar -->
	@stop

