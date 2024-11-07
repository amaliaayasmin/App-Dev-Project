<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Homepage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Add custom styles for the search bar -->
    <style>
        .search-bar {
            margin-top: 50px;
            text-align: center;
        }
    </style>
  </head>
  <body>
    
    <!-- Search Bar Section - Place this code here to make it appear at the top -->
    <div class="container mt-3 search-bar">
        <div class="d-flex justify-content-center">
            <form action="{{ route('search') }}" method="GET" class="w-50">
                <input type="text" name="query" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-primary mt-2 w-100">Search</button>
            </form>
        </div>
    </div>

    <!-- Include Header -->
    @include('include.header')

    <!-- Include Sidebar -->
    @include('include.sidebar')

    <!-- Main Content - Content will be injected here -->
    @yield('content')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
