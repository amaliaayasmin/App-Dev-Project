<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oh! My Merits</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: url('img/UTM_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #FFFFFF;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); 
        }

        .title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .tagline {
            font-size: 1.5rem;
            font-weight: 400;
            color: #DDDDDD;
            margin-bottom: 2rem;
        }

        .nav-links {
            position: absolute;
            top: 20px;
            right: 20px; 
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            color: #FFFFFF;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #FFDD57; 
        }
    </style>
</head>
<body>
    <!-- Navigation Links for Users -->
    <div class="nav-links">
        <a href="{{ route('organizer.login') }}" class="nav-link">Organizer</a>
        <a href="{{ route('login') }}" class="nav-link">Student</a>
        <a href="{{ route('admin.login') }}" class="nav-link">Admin</a>
    </div>


    <!-- Title and Tagline -->
    <div class="container">
        <div class="title">Oh! My Merits</div> 
        <div class="tagline">Makes Campus Life Comes Alive</div> 
    </div>
</body>
</html>
