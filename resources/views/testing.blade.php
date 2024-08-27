


{{$name}}
@extends('user.layout')
@section('title', 'Seat Selection')
@section('content')
@include('flash-messages')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seat Selection</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .status {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .seats {
            display: flex;
            flex-wrap: wrap;
            width: 300px;
        }
        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: green;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .seat.booked {
            background-color: red;
            cursor: not-allowed;
        }
        .seat.selected {
            background-color: yellow;
        }
        .seatsadmin {
            display: flex;
            flex-wrap: wrap;
            width: 300px;
        }
        .seatadmin {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: green;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .seatadmin.booked {
            background-color: red;
            cursor: not-allowed;
        }
        .head {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }
        .tickets {
            width: 550px;
            height: fit-content;
            border: 0.4mm solid rgba(0, 0, 0, 0.08);
            border-radius: 3mm;
            box-sizing: border-box;
            padding: 10px;
            font-family: poppins;
            max-height: 96vh;
            overflow: auto;
            background: white;
            box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .item {
            font-size: 12px;
            position: relative;
        }
    </style>
</head>
<body>
<main>
    <form action="{{ route('reserves.store')}}" method="get" id="myForm">
        @csrf
        <input type="hidden" name="selectedSeats" id="selectedSeatsInput" value="">
        <div class="center">
            <div class="tickets">
                <div class="ticket-selector">
                    <div class="head">
                        <div class="title">Please Select Your Seat</div>
                    </div>
                    <div class="seats">
                        <div class="status">
                            <div class="item">Available</div>
                            <div class="item">Booked</div>
                            <div class="item">Selected</div>
                        </div>
                        <button type="button" class="btn btn-secondary" disabled>Driver</button>
                        <div class="seats">
                            @php
                                $bookedSeats = $bookedSeats ?? [];
                            @endphp

                            @for($i = 1; $i <= 20; $i++)
                                <div class="seat {{ in_array($i, $bookedSeats) ? 'booked' : '' }}" data-seat="{{ $i }}">
                                    {{ $i }}
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="price">
                        <div class="total">
                            <span><span class="count"></span></span>
                            <div class="amount"></div>
                        </div>
                        <div class="">
                            <span><span class="seat_no"></span></span>
                            <div class="">Your Seats</div>
                        </div>
                        <form id="seatForm" method="POST" action="{{ route('seats.store') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Book Seats</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const seats = document.querySelectorAll('.seat');
        const selectedSeats = new Set();

        seats.forEach(seat => {
            seat.addEventListener('click', function() {
                if (seat.classList.contains('booked')) {
                    return;
                }

                const seatNumber = seat.getAttribute('data-seat');

                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats.delete(seatNumber);
                } else {
                    seat.classList.add('selected');
                    selectedSeats.add(seatNumber);
                }

                document.getElementById('selectedSeatsInput').value = Array.from(selectedSeats).join(',');
            });
        });

        document.getElementById('seatForm').addEventListener('submit', function() {
            selectedSeats.forEach(seatNumber => {
                const seat = document.querySelector(`.seat[data-seat="${seatNumber}"]`);
                seat.classList.add('booked');
                seat.classList.remove('selected');
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection
