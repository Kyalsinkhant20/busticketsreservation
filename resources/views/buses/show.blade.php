@extends('user.layout')
@section('title', 'Bus Details')
@section('content')
<main>
    <style>
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .card-img-top {
            border-bottom: 1px solid #ddd;
        }
        .card-title {
            text-align: center;
            font-weight: bold;
            color: #004085;
        }
        .card-body p {
            font-size: 1.1rem;
            color: #333;
        }
        .btn-link {
            text-decoration: none;
            color: #007bff;
        }
        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .container {
            padding: 2rem;
        }
    </style>

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <img src="../images/{{$bus->image}}" class="card-img-top" alt="Bus Image">
                    <div class="card-body">
                        <h5 class="card-title">Bus Details</h5>
                        <p>Date: {{$bus['date']}}<br>
                           Bus Name: {{$bus['busname']}}<br>
                           Route: {{$bus['location']}}<br>
                           Departure Time: {{$bus['departure']}}<br>
                           Estimated Arrival Time: {{$bus['arrival']}}<br>
                           Seat Availability: {{$bus['availability']}}<br>
                           Price: {{$bus['price']}} Kyats
                        </p>
                        <a href="{{route('booking.index')}}" class="btn btn-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
