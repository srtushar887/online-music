@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>


            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                    <h3 class="mb-3" data-plugin="counterup">1,587</h3>
                    <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-dollar-circle float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                    <h3 class="mb-3">$<span data-plugin="counterup">46,782</span></h3>
                    <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-bx bx-analyse float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Average Price</h6>
                    <h3 class="mb-3">$<span data-plugin="counterup">15.9</span></h3>
                    <span class="badge badge-warning mr-1"> 0% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <i class="bx bx-basket float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                    <h3 class="mb-3" data-plugin="counterup">1,890</h3>
                    <span class="badge badge-success mr-1"> +89% </span> <span class="text-muted">Last year</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@stop
