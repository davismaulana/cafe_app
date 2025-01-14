<!DOCTYPE html>
<html>
<head>
    <title>Add New Menu Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Menu Item</h1>

        <!-- Back to Menu List -->
        <a href="{{ route('menus.index') }}" class="btn btn-secondary mb-3">Back to Menu</a>

        <!-- Add New Menu Item Form -->
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Ingredients</label>
                <div>
                    @foreach ($ingredients as $ingredient)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ingredients[]" id="ingredient_{{ $ingredient->id }}" value="{{ $ingredient->id }}">
                            <label class="form-check-label" for="ingredient_{{ $ingredient->id }}">
                                {{ $ingredient->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>