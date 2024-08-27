@extends('admin.layout')
@section('title', 'View Bus Schedules')
@section('content')
@include('flash-messages')

<main>
    <div class="container mt-4">
        <style>
            h2 {
                text-align: center;
                font-style: italic;
                color: #004085;
                margin-bottom: 2rem;
            }
            .btn-danger {
                background-color: #dc3545;
                border-color: #dc3545;
            }
            .btn-danger:hover {
                background-color: #c82333;
                border-color: #bd2130;
            }
            .table th, .table td {
                text-align: center;
            }
            .btn-link {
                text-decoration: none;
                color: #004085;
            }
            .btn-link:hover {
                color: #003766;
            }
            .form-group {
                margin-bottom: 1rem;
            }
            .table-responsive {
                overflow-x: auto;
            }
        </style>
        
        <h2>Manage Bus Schedules</h2>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('buses.create') }}" class="btn btn-danger">Add Bus Schedule</a>
        </div>

        @if($buses->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Bus</th>
                        <th scope="col">Route</th>
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
                        <td>{{ $bus->date }}</td>
                        <td><a href="{{ route('buses.show', ['bus' => $bus->id]) }}" class="btn-link">{{ $bus->busname }}</a></td>
                        <td>{{ $bus->location }}</td>
                        <td>{{ $bus->departure }}</td>
                        <td>{{ $bus->arrival }}</td>
                        <td>{{ $bus->availability }}</td>
                        <td>{{ $bus->price }}</td>
                        <td>
                            <a href="{{ route('buses.edit', $bus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('buses.destroy', $bus->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $buses->links() }}
            </div>
        </div>
        @else
        <h3 class="text-center">There are no bus schedules available.</h3>
        @endif
    </div>
</main>
@endsection
