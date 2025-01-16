<!DOCTYPE html>
<html>
<head>
    <title>Add New Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Order</h1>
        
        <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Back to Orders</a>


        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="menus" class="form-label">Menus</label>
                <div id="menus-container">
                    <div class="menu-item mb-3">
                        <select name="menus[0][id]" class="form-select" required>
                            <option value="">Select a menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }} - ${{ $menu->price }}</option>
                            @endforeach
                        </select>
                        <input type="number" name="menus[0][quantity]" class="form-control mt-2" placeholder="Quantity" required min="1">
                    </div>
                </div>
                <button type="button" id="add-menu" class="btn btn-secondary mt-2">Add Another Menu</button>
            </div>
    
            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    
    </div>

    <script>
        document.getElementById('add-menu').addEventListener('click', function () {
            const container = document.getElementById('menus-container');
            const index = container.children.length;
            const newItem = document.createElement('div');
            newItem.classList.add('menu-item', 'mb-3');
            newItem.innerHTML = `
                <select name="menus[${index}][id]" class="form-select" required>
                    <option value="">Select a menu</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }} - ${{ $menu->price }}</option>
                    @endforeach
                </select>
                <input type="number" name="menus[${index}][quantity]" class="form-control mt-2" placeholder="Quantity" required min="1">
            `;
            container.appendChild(newItem);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>