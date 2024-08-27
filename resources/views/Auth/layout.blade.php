<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1rem;
      color: #003366; /* Dark blue text color */
      background-color: #f4f6f9; /* Light background color for the body */
    }

    #head {
      background-color: #5A639C; /* Dark blue header */
      color: white;
    }

    .nav-link {
      color: white;
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #ffcc00; /* Hover color */
    }

    footer {
      background-color: #5A639C; /* Match footer color with header */
      padding: 10px;
      text-align: center;
      color: white;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    .btn-warning {
      background-color: #f0ad4e; /* Custom button color */
      border: none;
      color: #fff;
    }

    .btn-warning:hover {
      background-color: #ec971f; /* Darker on hover */
    }

    .header-title {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .container {
      margin-top: 20px;
    }

    .lead {
      font-size: 1.25rem;
      font-weight: 300;
      color: #6c757d; /* Gray color for lead text */
    }

    .form-error {
      color: red;
    }
  </style>
</head>

<body>
  <div id="head">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Logo">
            <use xlink:href="#logo"></use>
          </svg>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item">
          <span class="nav-link header-title">Bus Tickets Reservation System</span>
        </li>
      </ul>

      <div class="text-end">
        @guest
          <a href="{{ route('auth.login') }}" class="btn btn-warning me-2">Login</a>
          <a href="{{ route('auth.registration') }}" class="btn btn-warning">Sign-up</a>
        @else
          <a href="{{ route('auth.logout') }}" class="btn btn-warning">Logout</a>
        @endguest
      </div>
    </header>
  </div>

  <main class="container">
    @yield('content')
  </main>

  <footer>
    busticketsreservation.com &copy; 2024
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-k2mKr4jM2OhK8Yh8VZaWAlwQgy8+GlXZB72nYPWmlLMfuD/C0YH+IRz7BGkuxdC2P" crossorigin="anonymous"></script>
</body>
</html>
