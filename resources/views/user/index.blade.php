@extends('user.layout')

@section('title', 'Homepage')

@section('content')
<main>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 20px; /* Prevents content from sticking to the top */
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #e9ecef !important;
        }

        .carousel-item img {
            height: 400px; /* Fixed height for carousel images */
            object-fit: cover; /* Ensures images cover the container */
            border-radius: 8px;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            padding: 1rem;
            border-radius: 8px;
        }

        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Adds space below cards */
        }

        .card-title {
            color: #007bff;
        }

        .container {
            max-width: 1140px; /* Ensures content doesn't stretch too wide */
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            margin-top: 20px; /* Space above footer */
        }

        @media (max-width: 768px) {
            .carousel-caption h2 {
                font-size: 1.5rem; /* Adjust font size on smaller screens */
            }

            .carousel-caption p {
                font-size: 1rem; /* Adjust font size on smaller screens */
            }
        }
    </style>

    <div class="container">
        <div class="card p-4 mb-4">
            <div class="card-body text-center">
                <h5 class="card-title mb-3">Book Your Next Trip</h5>
                <p class="card-text mb-4">Use our simple and intuitive booking system to find and reserve the best bus routes for your needs.</p>
                <a href="{{ route('booking.index') }}" class="btn btn-custom btn-lg">Start Booking</a>
            </div>
        </div>

        <div id="carouselExampleDark" class="carousel carousel-dark slide mb-4">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/busanimation.jpg') }}" class="d-block w-100" alt="Bus Animation">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><a href="{{ route('booking.index') }}" class="btn btn-custom btn-lg">Reserve Your Tickets Now</a></h2>
                        <p>
                            Discover a seamless way to plan your travel with our intuitive bus ticket reservation system. Easily search routes, select seats, and confirm your booking in just a few clicks. Experience convenience with real-time updates, secure payment, and instant confirmation.
                        </p>
                    </div>
                </div>
                <!-- Add more carousel items here if needed -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
