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
    }

    a {
      text-decoration: none;
    }

    .lead {
      font-size: 1.25rem;
      color: #6c757d; /* Gray color for lead text */
      font-weight: bold;
    }

    .form-error {
      color: red;
    }

    #head {
      background-color: #5A639C; /* Dark blue header */
      color: white;
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

    .sidebar {
      height: 100vh;
      background-color: #5A639C;
      color: white;
      padding: 20px;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
    }

    .sidebar h3 {
      margin-top: 0;
      color: #fff;
    }

    .sidebar a {
      color: white;
      display: block;
      padding: 10px;
      border-radius: 5px;
      transition: background-color 0.3s, color 0.3s;
    }

    .sidebar a:hover {
      background-color: #4a557f;
      color: #ffcc00; /* Hover color */
    }

    .content {
      margin-left: 250px; /* Offset for fixed sidebar */
      padding: 20px;
    }

    .header-title {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .btn-warning {
      background-color: #f0ad4e;
      border: none;
      color: #fff;
    }

    .btn-warning:hover {
      background-color: #ec971f;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <div class="sidebar">
      <h3>Admin Dashboard</h3>
      <a href="{{ route('admin.index') }}">Home</a>
      <a href="{{ route('reserves.index') }}">Reserve Lists</a>
      <a href="{{ route('buses.index') }}">Manage Bus Schedules</a>
    
      @guest
        <a href="{{ route('auth.login') }}">Login</a>
        <a href="{{ route('auth.registration') }}">Sign-up</a>
      @else
        <a href="{{ route('auth.logout') }}">Logout</a>
      @endguest
    </div>
    <div class="content">
      <header id="head" class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="/" class="d-inline-flex text-decoration-none">
            <svg class="bi" width="40" height="32" role="img" aria-label="Logo">
              <use xlink:href="#logo"></use>
            </svg>
          </a>
        </div>
        <div class="text-end">
          @guest
            <a href="{{ route('auth.login') }}"><button type="button" class="btn btn-warning me-2">Login</button></a>
            <a href="{{ route('auth.registration') }}"><button type="button" class="btn btn-warning">Sign-up</button></a>
          @else
            <a href="{{ route('auth.logout') }}"><button type="button" class="btn btn-warning">Logout</button></a>
          @endguest
        </div>
      </header>
      @yield('content')
    </div>
  </div>
  @yield('scripts')
  <footer>
    busticketsreservation.com &copy; 2024
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-p54cT16ARqD4pT5PI0fFNnMB1cQ3ZROzItnYX4bXrI1FtfvnaLhz1Kgp30XXxC/8" crossorigin="anonymous"></script>
</body>
</html>
