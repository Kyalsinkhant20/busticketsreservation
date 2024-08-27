@extends('admin.layout')
@section('title', 'Edit Reservation')
@section('content')
@include('flash-messages')

<div class="container mt-4">
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #004085;
            border-color: #004085;
        }
        .btn-primary:hover {
            background-color: #003766;
            border-color: #003766;
        }
        h2 {
            text-align: center;
            font-style: italic;
            color: #004085;
        }
        .form-control {
            border-radius: 0.25rem;
        }
    </style>

    <h2>Edit Reservation</h2>
    <form action="{{ route('reserves.update', $reserve->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $reserve->name) }}" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="phoneno">Phone Number:</label>
                    <input type="text" class="form-control" id="phoneno" name="phoneno" value="{{ old('phoneno', $reserve->phoneno) }}" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="seat">Seat:</label>
                    <input type="text" class="form-control" id="seat" name="seat" value="{{ old('seat', $reserve->seat) }}" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', $reserve->gender) }}" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="bus_id">Bus Name:</label>
                    <select class="form-control" id="bus_id" name="bus_id" required>
                        @foreach($buses as $bus)
                            <option value="{{ $bus->id }}" {{ $reserve->bus_id == $bus->id ? 'selected' : '' }}>
                                {{ $bus->busname }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Paid" {{ $reserve->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Unpaid" {{ $reserve->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                    </select>
                </div>
            </div>
            

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Reservation</button>
            </div>
        </div>
    </form>
</div>
@endsection
