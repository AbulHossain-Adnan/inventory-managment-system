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
	
	<!-- Main content -->
	<section class="content p-4">
		<!-- Default box -->
		@yield('master_content')
		@toastr_css
		<!-- /.card -->
		<div class="card  mb-3" >
			<div class="card-header text-white bg-secondary"></div>
			<div class="card-body">
				
				
				
				<div class="row">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
							<a class="navbar-brand" href="#">Hidden brand</a>
							<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
								<li class="nav-item active">
									<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Link</a>
								</li>
								<li class="nav-item">
									<a class="nav-link disabled" href="#">Disabled</a>
								</li>
							</ul>
							<form class="form-inline my-2 my-lg-0">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
					</nav>
					<div class="col-sm-7">
						<div class="card">
							<div class="card-body">
								@foreach($products as $item)
								<?php
								$data= $item->image;
								
								$images=explode('|',$data);
								?>
								<tr><td>
									
									@foreach($images as $image)
									@endforeach
									<a type="button"  id="{{ $item->id }} " onclick="addtocart(this.id)">
									<img src="{{asset('product_images/'.$image)}}" style="width: 120px;height: 110px;"></a>
								</td>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="card">
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											
											<th scope="col">name</th>
											<th scope="col">price</th>
											<th scope="col">qty</th>
											<th scope="col">action</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<ul class="list-group list-group-flush">
									<div class="order_total_title" id="cartcalculationfield">
										
										<h2>Total Price:</h2>
										
									</div>
									<li class="list-group-item"></li>
									<li class="list-group-item">
										<button type="button" class="btn btn-info btn-block" id="paynow" >PAY</button>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-7">
									<div class="card">
										<h2>Sales Details</h2>
										<div class="card-body" id="testfield">
											
										
										

											
											
											
											<ul class="list-group" >
												
											</ul>
										</div>
										<div id="order_total">
											
										</div>
										<input type="hidden" id="subt" value="{{Cart::subtotal()}}">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="card">
										<h4>Select Customer</h4>
										<div class="card-body">
											
											<div class="form-group">
												<label for="exampleInputColor">Customer </label>
												<select class="form-control input-lg" id="customer_id" name="color">
													
												</select>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-success">CASH</button>
						<button type="button" onclick="ordernow()" class="btn btn-primary">Done Payment</button>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


	<!-- scitp for product add to cart -->
	<script type="text/javascript">
		function addtocart($id){
			var id=$id;
			$.ajax({
				type:"GET",
				datatype:"json",
				url:"/addtocart/"+id,
				success:function(data){
					alldata();
					cartcalculation()
				}
			})
		}
	</script>






	<!-- script for fetch cart alldata -->

	<script type="text/javascript">
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	function alldata(){
		$.ajax({
			type:"GET",
			datatype:"json",
			url:"/cart_alldata",
			success:function(response){
				cartcalculation()
				var rows=""
				$.each(response, function(key,value){
					rows+=`<tr>
								<td>${value.name}</td>
								<td>${value.subtotal}</td>
									
								<td>
								${value.qty>1
								?`<button class="btn btn-primary btn-sm" id=${value.rowId}" onclick="quantitydecrement(this.id)" width:35px;>-</button> `
								:`<button class="btn btn-danger btn-sm" disabled id="test" >-</button> `
											}					
							<input type="text"  id="quantity_name" name="quantity_name" value='${value.qty}' style="width:30px;">
								<button class="btn btn-success btn-sm" id='${value.rowId}' onclick="quantityincrement(this.id)">+</button></td>
									
								<td><button class="btn btn-warning btn-sm" id='${value.rowId}' onclick="cart_remove(this.id)">x</button></td>
						</tr>`
						});
				$('tbody').html(rows)
				}
			});
		}
		alldata();
	</script>





<!-- scipt for qty increment -->

	<script type="text/javascript">
	function quantityincrement(rowId){
				$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
				$.ajax({
					type:"GET",
					datatype:"json",
					url:"/qty_increment/"+rowId,
					success:function(response){
					cartcalculation()
					alldata();
					
					}
				})
			}
// end script





// scrip for qty decrement
			function quantitydecrement(rowId){
				
				$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
				$.ajax({
					type:"GET",
					datatype:"json",
					url:"/qty_decrement/"+rowId,
					success:function(response){
					alldata();
					cartcalculation()
					}
				})
			}
			alldata();
	</script>
	<!-- end script -->





	<!-- script for cart remove action -->

	<script type="text/javascript">
		function cart_remove(rowId){
			
			$.ajax({
				type:"GET",
				datatype:"json",
				url:"/cartremove/"+rowId,
				success:function(data){
					console.log(data)
					alldata();
					cartcalculation()
				}
			})
		}
	</script>
	<!-- end script -->




<!-- scipt for cart calculation -->
	<script type="text/javascript">
		function cartcalculation(){
			$.ajax({
				type:"GET",
				datatype:"json",
				url:"/cartcalculation",
				success:function(data){
						if(data.total){
					$("#cartcalculationfield").html(`
						<tr>
							<th>
					<div class="order_total_title"><td><h4>Order Total:  ${data.total}$</h4>:</td></div>
					</th>
					</tr>
						`);
				}
				}
			})
		}
		cartcalculation()
	</script>
	<!-- end scipt -->



	<!-- script for pay button -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('body').on('click','#paynow',function(){
				
				$.ajax({
					type:"GET",
					datatype:'json',
					url:"/paynow",
					success:function(data){
						
					$('#order_total').html(`<h3>Total Paymet::${data.order_total}$</h3>`)
						
						$('#exampleModalCenter').modal('show')
						var rows=""
						$.each(data.data, function(key,value){
						
							rows+=`<ul>
									
									<li id="product_id">product id:${value.id}</li>
									<li id="product_price">product price:${value.price}</li>
									<li id="product_name">product name:${value.name}</li>
									<li id="product_qty">product qty:${value.qty}</li>
									<li id="subtotal">product subtotal:${value.subtotal}</li>
									`
								});
								$('#testfield').html(rows)

							var d=$('select[name="color"]').empty();
							$.each(data.customers,function(key,value){
								
							$('select[name="color"]').append('<option value="'+value.id+'">'+value.name+'</option>');
							});
							}
						})
					})
				});
			</script>
			<!-- end script -->




			<!-- script for done payment -->
			<script type="text/javascript">
				$(document).ready(function(){
					$('body').on('click','#ordernow',function(){	
					})
				})
					function ordernow(){
					$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
					});
					var customer_id=$('#customer_id').val();

					$.ajax({
					type:"POST",
					datatype:'json',
					data:{customer_id:customer_id},
					url:"/ordernow",
					success:function(data){
					alldata();
	
		
					$("#exampleModalCenter").modal('hide')
						const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
					})
					if ($.isEmptyObject(data.error)){
					Toast.fire({
					icon: 'success',
					title:data.success
					})
					
					}
					else{
					Toast.fire({
					icon: 'error',
					title:data.error
					})
					}
		
					}
					})
					}
					ordernow();
		</script>
		@jquery
		@toastr_js
		@toastr_render
		<!-- /.content-wrapper -->
		@includeIf('backend.include.footer')
		<!-- /.control-sidebar -->
		@stop