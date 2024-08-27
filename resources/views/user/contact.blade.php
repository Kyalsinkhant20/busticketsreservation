@extends('user.layout')
@section('title', 'BTRS Contact')
@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Light grey background for a softer look */
    }

    h1, h4 {
        text-align: center;
        font-style: italic;
        color: #003366; /* Dark blue for text */
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        background-color: #ffffff;
        text-align: center;
    }

    .card img {
        width: 50px;
        margin-bottom: 15px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .container {
        padding: 30px;
    }

    .contact-card {
        margin-bottom: 30px;
    }

    .text-muted {
        color: #6c757d; /* Bootstrap's muted text color */
    }

    @media (max-width: 767px) {
        .contact-card {
            margin-bottom: 20px;
        }
    }
</style>

<main class="container">
    <h1>Contact Us</h1>
    <h4>How can we assist you?</h4>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-5 col-10 contact-card">
            <div class="card align-items-center h-100">
                <img src='../images/telephone.png' alt="Telephone Icon">
                <p class="text-muted">Please call us at</p>
                <p class="font-weight-bold">09 428 396 633</p>
            </div>
        </div>
        <div class="col-12 col-sm-1 align-self-center py-3">
            <div class="text-center">Or</div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-10 contact-card">
            <div class="card align-items-center h-100">
                <img src='../images/email.png' alt="Email Icon">
                <p class="text-muted">Contact us via Email</p>
                <a class="btn btn-success btn-sm" target="_blank" href="mailto:info@example.com">Send Email</a>
            </div>
        </div>
    </div>
</main>
@endsection
