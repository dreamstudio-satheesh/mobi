@extends('layouts.partials.simple.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-css/style.css') }}">
@endsection

@section('breadcrumb')
<div class="col-auto header-right-wrapper page-title">
  <div>
    <h2>Mobile Shop Dashboard</h2>
    <nav>
      <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item f-w-500">Dashboard</li>
        <li class="breadcrumb-item f-w-500 active">Mobile Shop</li>
      </ol>
    </nav>
  </div>
</div>
@endsection

@section('content')
<div class="container-fluid dashboard">
  <div class="row">
    <div class="col-xl-9">
      <div class="card title-line sales-details">
        <div class="card-header card-no-border sales-bg">
          <h2>Sales Overview</h2>
        </div>
        <div class="card-body custom-scrollbar">
          <div class="row">
            <div class="col-md-3">
              <h3>Total Sales</h3>
              <p>₹50L</p>
            </div>
            <div class="col-md-3">
              <h3>Total Orders</h3>
              <p>2,345</p>
            </div>
            <div class="col-md-3">
              <h3>Customers</h3>
              <p>10,567</p>
            </div>
            <div class="col-md-3">
              <h3>Pending Orders</h3>
              <p>320</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3">
      <div class="card store-card">
        <div class="card-header">
          <h3>Top Selling Product</h3>
        </div>
        <div class="card-body text-center">
          <p>iPhone 15 Pro - 800 units sold</p>
        </div>
      </div>
    </div>

    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h2>Recent Orders</h2>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#123456</td>
                <td>Rajesh Kumar</td>
                <td>Samsung Galaxy S23</td>
                <td>₹82,999</td>
                <td><span class="badge bg-success">Completed</span></td>
              </tr>
              <tr>
                <td>#123457</td>
                <td>Priya Sharma</td>
                <td>OnePlus 11</td>
                <td>₹56,999</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
@endsection
