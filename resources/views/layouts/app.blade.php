<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for sidebar -->
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                position: fixed;
                bottom: 0;
                z-index: 1000;
                display: flex;
                justify-content: space-around;
                padding: 10px;
            }
            .sidebar a {
                margin: 0;
                padding: 10px 15px;
            }
            .main-content {
                margin-bottom: 60px; /* Adjust for mobile sidebar */
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center mb-4">Cafe App</h3>
        <a href="{{ route('home') }}" class="active">Dashboard</a>
        <a href="{{ route('employees.index') }}">Employees</a>
        <a href="{{ route('menus.index') }}">Menus</a>
        <a href="{{ route('orders.index') }}">Orders</a>
        <a href="{{ route('ingredients.index') }}">Ingredients</a>
        <a href="{{ route('categories.index') }}">Categories</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar">
            <h2>Welcome, Bro</h2>
        </div>

        <!-- Page Content -->
        <div class="container-fluid mt-4">
            @yield('content') <!-- This is where the page content will be injected -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>