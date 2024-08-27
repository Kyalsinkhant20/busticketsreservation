@extends('user.layout')

@section('title', 'Reservation')

@section('content')
@include('flash-messages')

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .error {
        color: #dc3545;
        font-size: small;
        font-weight: bold;
    }
    .p {
        color: #dc3545;
        font-size: small;
        font-style: italic;
    }
    label, h3 {
        color: #003366;
    }
    .seat {
        color: #003366;
        font-style: italic;
    }
    .form-outline {
        margin-bottom: 1.5rem;
    }
    .form-label {
        color: #003366;
        font-weight: bold;
    }
    .form-control {
        border-radius: 0.375rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .btn-info {
        border-radius: 50px;
        background-color: #17a2b8;
        color: #fff;
        border: none;
    }
    .btn-info:hover {
        background-color: #138496;
    }
    .btn-success {
        border-radius: 50px;
        background-color: #28a745;
        color: #fff;
        border: none;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 2rem;
    }
    .card-title {
        font-size: 1.5rem;
        color: #007bff;
        margin-bottom: 1.5rem;
    }
    .btn-custom {
        background-color: #007bff;
        color: #fff;
        border-radius: 0.375rem;
        padding: 0.5rem 1.5rem;
        border: none;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group label {
        margin-bottom: 0.5rem;
    }
</style>

<main>

<form action="{{route('reserves.session')}}" method="get">

@csrf
        <section class="h-100 h-custom" style="background-color: aliceblue;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card rounded-3">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="card-title mb-4">Register Your Information </h3>


                           
                               
                                <div class="form-outline mb-4">
                                <div class="form-outline">
                                    <input type="text" id="formName" class="form-control" name="name" />
                                    <label class="form-label" for="formName">Name</label>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="formPhone" class="form-control" name="phoneno" />
                                            <label class="form-label" for="formPhone">Phone Number</label>
                                            @error('phoneno')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="number" id="formSeat" class="form-control" min="1" max="30" name="seat" />
                                            <label class="form-label" for="formSeat">Seat</label>
                                            @error('seat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select  -mdb-select-init name="gender" id="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Group">Group</option>
                                    </select>
                                </div>

                               <section class="container py-5">
   
                               <label for="bus_id">Bus name</label>
        <select name="bus_id" id="bus_id" class="form-control">
            @foreach($buses as $bus)
                <option value="{{ $bus->id }}" 
                        {{ isset($selectedBus) && $selectedBus->id == $bus->id ? 'selected' : '' }}>
                    {{ $bus->busname }}
                </option>
            @endforeach
        </select>
        @if(isset($selectedBus))
            <p>Selected Bus Name: {{ $selectedBus->busname }}</p>
        @endif
    </div>

                                <p class="p">*Please bring your NRC</p>
                                
                                <button type="submit" class="btn btn-success btn-lg mb-1">Confirm</button>
                           </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seatButtons = document.querySelectorAll('.seat-btn');
        const selectedSeatText = document.getElementById('selected-seat');
        const hiddenSelectedSeat = document.getElementById('hidden-selected-seat');

        seatButtons.forEach(button => {
            button.addEventListener('click', function () {
                const seatNumber = this.getAttribute('data-seat');
                selectedSeatText.textContent = seatNumber;
                hiddenSelectedSeat.value = seatNumber;
            });
        });
    });
</script>
@endsection
