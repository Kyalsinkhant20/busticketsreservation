@extends('user.layout')
@section('title', 'Show Reservation')
@section('content')
@include('flash-messages')

<style>
    .note {
        color: #dc3545; /* Bootstrap's danger color for emphasis */
        font-weight: bold;
        margin-top: 10px;
    }

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; /* Full viewport height */
        background-color: #f8f9fa; /* Light background for better contrast */
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        width: 100%;
    }

    .card-title {
        font-size: 1.5rem;
        color: #007bff; /* Bootstrap's primary color */
        margin-bottom: 20px;
    }

    .card-body {
        background-color: #ffffff;
        border-radius: 10px;
    }

    .mb-3 label {
        font-weight: bold;
        color: #495057; /* Bootstrap's secondary color */
    }

    .mb-3 b {
        color: #212529; /* Dark color for text */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

<div class="center">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Registration Information</h5>
            <p class="pcard">
                Your ticket reservation has been made.<br>
                Thank you.<br>
                Your Registration code is <b>{{ $reserve->id }}</b><br>
                Keep & Capture your code number.
            </p>
            <div class="container">
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <b>{{ $reserve->name }}</b>
                </div>
                <div class="mb-3">
                    <label for="phoneno">Phone No:</label>
                    <b>{{ $reserve->phoneno }}</b>
                </div>
                <div class="mb-3">
                    <label for="gender">Gender:</label>
                    <b>{{ $reserve->gender }}</b>
                </div>
                <div class="mb-3">
                    <label for="bus_id">Bus ID:</label>
                    <b>{{ $reserve->bus_id }}</b>
                </div>
                <div class="mb-3">
                    <label for="busname">Bus Name:</label>
                    <b>{{ $bus->busname }}</b>
                </div>
                <div class="mb-3">
                    <label for="route">Route:</label>
                    <b>{{ $location }}</b>
                </div>
                <div class="mb-3">
                    <label for="departure">Departure Time:</label>
                    <b>{{ date('M d, Y h:i A', strtotime($bus->departure)) }}</b>
                </div>
                <div class="mb-3">
                    <label for="seat">Number of Seats:</label>
                    <b>{{ $reserve->seat }}</b>
                </div>
                <div class="mb-3">
                    <label for="selectedSeats">Selected Seats:</label>
                    <b>{{ $reserve->selectedSeats }}</b>
                </div>
                <div class="mb-3">
                    <label for="amount">Amount:</label>
                    <b>{{ $totalAmount }} MMK</b>
                </div>
                <div>
                    <p class="note">*Please bring your NRC</p>
                </div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">Confirm</a>
            </div>
        </div>
    </div>
</div>

@endsection
