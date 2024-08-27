@extends('admin.layout')
@section('title', 'Update Bus Schedules')
@section('content')
@include('flash-messages')

<main>
    <style>
        .error {
            color: red;
            font-size: small;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            font-style: oblique;
            color: #004085;
            margin-bottom: 2rem;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
        .form-control {
            border-radius: 0.25rem;
        }
    </style>

    <div class="container mt-5">
        <h1>Update Bus Schedules</h1>
        <form action="{{ route('buses.update', ['bus' => $bus->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $bus->date) }}" name="date" id="date">
                    @error('date')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="busname" class="form-label">Bus Name</label>
                    <input type="text" class="form-control @error('busname') is-invalid @enderror" value="{{ old('busname', $bus->busname) }}" name="busname" id="busname">
                    @error('busname')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $bus->location) }}" name="location" id="location">
                    @error('location')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="departure" class="form-label">Departure Time</label>
                    <input type="time" class="form-control @error('departure') is-invalid @enderror" value="{{ old('departure', $bus->departure) }}" name="departure" id="departure">
                    @error('departure')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="arrival" class="form-label">Estimated Arrival Time</label>
                    <input type="time" class="form-control @error('arrival') is-invalid @enderror" value="{{ old('arrival', $bus->arrival) }}" name="arrival" id="arrival">
                    @error('arrival')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="availability" class="form-label">Availability</label>
                    <input type="text" class="form-control @error('availability') is-invalid @enderror" value="{{ old('availability', $bus->availability) }}" name="availability" id="availability">
                    @error('availability')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $bus->price) }}" name="price" id="price">
                    @error('price')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/jpg,image/png,image/jpeg">
                    @error('image')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
