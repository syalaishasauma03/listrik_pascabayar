<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GenZap</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/head.png') }}">
    
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #6C63FF;
        }
        .navbar-brand {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #adb5bd !important;
        }
        .content {
            padding: 20px;
        }
        
        .logout-container {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .logout-button {
            background-color: #e3342f;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            font-size: 14px; 
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #cc1f1a;
        }

        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }
    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <nav class="logout-container">
        <!-- Tombol Log Out -->
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="logout-button">
                {{ __('Log Out') }}
            </button>
        </form>
    </nav>
   
</html>
