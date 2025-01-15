<!DOCTYPE html>
<html>
<head>
    <title>Receipts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Receipts</h1>

        <!-- Display Receipts Grouped by Menu -->
        @foreach ($receipts as $receipt)
            <h3>{{ $receipt->name }}</h3>
            <ul>
                @foreach ($receipt->ingredients as $ingredient)
                    <li>{{ $ingredient->name }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>