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
            text-align: inline;
        }
        h2 {
            text-align: center;
            font-style: oblique;
            color: darkblue;
        }
    </style>
    <h2>Reservation Lists</h2>
    <form action="" method="POST">
        <div class="container">
            @isset($reserves)
            @if(count($reserves) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">PhoneNo</th>
                        <th scope="col">Seat</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Bus ID</th>
                        <th scope="col">Action</th>
                    </tr>groqc87t
                </thead>
                <tbody>
                    @foreach($reserves as $reserve)
                    <tr>
                        <td>{{ $reserve->name }}</td>
                        <td>{{ $reserve->phoneno }}</td>
                        <td>{{ $reserve->seat }}</td>
                        <td>{{ $reserve->gender }}</td>
                        <td>{{ $bus->busname }}</td>
                        <td class="mytd">
                            <a href="{{ route('booking.show', $reserve->id) }}">Confirm</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $reserves->links() }}
            @else
            <h3>There is no reservation</h3>
            @endif
            @endisset
        </div>
    </form>
</main>
@endsection
