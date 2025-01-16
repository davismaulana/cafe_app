<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Menu Details</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Menu Details</h1>
    
        <!-- Back to Menu List -->
        <a href="{{ route('menus.index') }}" class="btn btn-secondary mb-3">Back to Menu</a>
    
        <!-- Menu Details -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $menu->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $menu->description }}</p>
                <p class="card-text"><strong>Price:</strong> Rp.{{ number_format($menu->price, 2) }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $menu->category->name }}</p>
                <p class="card-text">
                    <strong>Ingredients:</strong>
                    @foreach ($menu->ingredients as $ingredient)
                        <span class="badge bg-success">{{ $ingredient->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>