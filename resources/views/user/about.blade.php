@extends('user.layout')
@section('title', 'BTRS About')
@section('content')
<style>
    body {
        background-color: #f0f8ff; /* Light background color */
        font-family: Arial, sans-serif; /* Modern font */
    }

    main {
        text-align: center;
        color: #003366; /* Dark blue color for text */
        padding: 30px 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White background for content area */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    h3 {
        font-size: 2rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .section {
        margin-bottom: 20px;
    }

    .section b {
        font-size: 1.2rem;
        color: #003366;
    }

    .section dl {
        font-size: 1rem;
        line-height: 1.6;
        color: #333333; /* Darker text for readability */
    }

    .how-it-works {
        text-align: left;
        max-width: 600px;
        margin: 0 auto;
    }

    .how-it-works ol {
        font-size: 1rem;
        line-height: 1.6;
    }

    .contact {
        margin-top: 30px;
        font-size: 1rem;
        line-height: 1.6;
    }

    .contact a {
        color: #003366;
        text-decoration: none;
        font-weight: bold;
    }

    .contact a:hover {
        text-decoration: underline;
    }
</style>

<main>
    <div class="container">
        <h3>About Us</h3>
        <div class="section">
            <b>Simple and Quick Bookings</b>
            <dl>Our user-friendly interface ensures you can book your bus tickets in just a few clicks.
                Enter your departure and destination points, choose your travel dates, and browse through a wide range of available buses.</dl>
        </div>

        <div class="section">
            <b>Extensive Route Options</b>
            <dl>We partner with numerous reputable bus operators to provide you with an extensive network of routes. 
                No matter where you're headed, EZBus Tickets has you covered.</dl>
        </div>

        <div class="section">
            <b>Best Price Guarantee</b>
            <dl>We are committed to offering you the best prices on the market.
                Take advantage of our exclusive deals and discounts to make your travel affordable.</dl>
        </div>

        <div class="section">
            <b>Real-Time Information</b>
            <dl>Stay updated with real-time bus schedules, seat availability, and route information.
                Our system ensures you have the latest information to plan your journey effectively.</dl>
        </div>

        <div class="section">
            <b>24/7 Customer Support</b>
            <dl>Have a question or need assistance? Our dedicated customer support team is available around the clock to help you with any issues or inquiries.</dl>
        </div>

        <div class="how-it-works">
            <b>How It Works</b>
            <ol>
                <li><b>Search for Buses:</b> Enter your departure or arrival cities.</li>
                <li><b>Choose Your Bus:</b> Compare available buses based on timing, amenities, and prices.</li>
                <li><b>Register Your Information:</b> Enter your name, phone number, and seats.</li>
                <li><b>Select Your Seats:</b> Pick your preferred seats from the interactive seating chart.</li>
            </ol>
        </div>

        <div class="contact">
            <b>Contact Us</b>
            <p>Have questions or need support? Contact us anytime at <a href="mailto:info@example.com">busticketsreservations.com</a> or call our helpline at <a href="tel:+09428396633">09 428 396 633</a>.</p>
        </div>
    </div>
</main>
@endsection
