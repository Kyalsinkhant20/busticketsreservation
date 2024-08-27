@extends('user.layout')
@section('title','View Bus Schedules')
@section('content')
@include('flash-messages')

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
body {
    background-color: aliceblue;
}
h2 {
    text-align: center;
    font-style: oblique;
    color: darkblue;
}
</style>

<h2>View Bus Schedules</h2>
<main>
    <div class="container">
        <form method="GET" action="{{ route('booking.index') }}">
        
            <div class="input-group">
                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="{{ request('search') }}" />
                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
            </div>
        </form>
    </div>
    <br><br><br>
    <div class="container">
        @if(count($buses) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Bus</th>
                        <th scope="col">Location</th>
                        <th scope="col">Departure</th>
                        <th scope="col">ETA</th>
                        <th scope="col">Availability</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buses as $bus)
                        <tr>
                            <td>{{ $bus['date'] }}</td>
                            <td><a href="{{ route('buses.show', ['bus' => $bus['id']]) }}">{{ $bus['busname'] }}</a></td>
                            <td>{{ $bus['location'] }}</td>
                            <td>{{ $bus['departure'] }}</td>
                            <td>{{ $bus['arrival'] }}</td>
                            <td>{{ $bus['availability'] }}</td>
                            <td>{{ $bus['price'] }}</td>
                            <td class="mytd">
                                <a href="{{ route('reserves.create', $bus->id) }}">Reserve</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $buses->links() }}
        @else
            <h3>No bus schedules found</h3>
        @endif
    </div>
</main>
<script>
// Initialization for ES Users
import { Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Ripple });
</script>
@endsection