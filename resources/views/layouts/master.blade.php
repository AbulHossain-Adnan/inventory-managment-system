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
  
<div class="row">
  <div class="col-sm-12 m-auto">
    <div class="card">
      <div class="card-body">
       <div class="sl-pagebody">
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-5 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_admin}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_customer}}</div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Last 30 days sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lastmonthsales}}</div>
                        </div>
                        <div class="col-auto">
                           
                             <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->



        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-2 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">546464$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-2 bg-info">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5656565$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">564646$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
            
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-success">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">All Products</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">64564654$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
     
   <!-- Content Row -->



        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-2 bg-warning">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$5464564</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$65446546</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">65+65+5$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
            
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">All Products</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5649654646$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
         <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-2 bg-warning">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$5464564</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$65446546</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">65+65+5$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
            
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">All Products</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5649654646$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
         <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-2 bg-warning">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$5464564</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
             
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">$65446546</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-purple">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">65+65+5$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
            
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-2 bg-danger">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">All Products</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span class="sparkline2">5649654646$</span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold"></h3>
              </div><!-- card-body -->
              
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
        <div>
        </div>
      </div>

</div>
      </div>
    </div>
  </div>
</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@includeIf('backend.include.footer')
  <!-- /.control-sidebar -->
  @stop
