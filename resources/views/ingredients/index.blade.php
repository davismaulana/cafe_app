<!DOCTYPE html>
<html>
<head>
    <title>Ingredients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ingredients</h1>

        <!-- Add New Ingredient Button -->
        <a href="{{ route('ingredients.create') }}" class="btn btn-primary mb-3">Add New Ingredient</a>

        <!-- Display Ingredients in a Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->name }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this ingredient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>