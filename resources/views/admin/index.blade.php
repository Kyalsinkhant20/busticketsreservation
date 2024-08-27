@extends('admin.layout')
@section('content')
<main class="container">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('images/busanimation.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Welcome To Admin Panel</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Overview Cards -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="overview-card p-3 shadow-sm">
          <h4>Total Buses</h4>
          <p class="lead">5</p>
          <a href="{{ route('buses.index') }}" class="btn btn-primary">View Bus Details</a>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="overview-card p-3 shadow-sm">
          <h4>Total Reservations</h4>
          <p class="lead">3</p>
          <a href="{{ route('reserves.index') }}" class="btn btn-primary">View Reservation Details</a>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
