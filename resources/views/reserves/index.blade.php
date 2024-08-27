@extends('admin.layout')
@section('title', 'Reservation')
@section('content')
@include('flash-messages')

<main>
    <style>
        .btn-link {
            text-decoration: none;
        }
        a {
            text-decoration: none;
        }
        .mytd {
            text-align: center;
        }
        h2 {
            text-align: center;
            font-style: italic;
            color: #004085;
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-custom {
            color: #ffffff;
            background-color: #004085;
            border-color: #004085;
        }
        .btn-custom:hover {
            color: #ffffff;
            background-color: #003766;
            border-color: #003766;
        }
        .no-reservation {
            text-align: center;
            margin-top: 20px;
            font-size: 1.25rem;
            color: #6c757d;
        }
    </style>

    <h2>Reservation Lists</h2>

    <div class="container table-container">
        @isset($reserves)
        @if(count($reserves) > 0)
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">No of Seats</th>
                    <th scope="col">Selected Seats</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Bus Name</th>
                    <th scope="col">Total Amount (MMK)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reserves as $reserve)
                <tr>
                    <td>{{ $reserve->name }}</td>
                    <td>{{ $reserve->phoneno }}</td>
                    <td>{{ $reserve->seat }}</td>
                    <td>{{ $reserve->selectedSeats }}</td>
                    <td>{{ $reserve->gender }}</td>
                    <td>{{ $reserve->bus->busname }}</td>
                    <td>{{ $reserve->seat * $reserve->bus->price }}</td>
                    <td>{{ $reserve->status }}</td>
                    <td class="mytd">
                        <a href="{{ route('reserves.edit', $reserve->id) }}" class="btn btn-custom btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reserves->links() }}
        @else
        <div class="no-reservation">
            <h3>There are no reservations to display</h3>
        </div>
        @endif
        @endisset
    </div>
</main>
@endsection
