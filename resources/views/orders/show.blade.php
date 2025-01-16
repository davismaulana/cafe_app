<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Order Details</h1>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Back to Orders</a>

        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Total Price:</strong> Rp.{{ $order->total_price }}</p>

        <h3>Menus</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->pivot->quantity }}</td>
                        <td>Rp.{{ $menu->pivot->price }}</td>
                        <td>Rp.{{ $menu->pivot->quantity * $menu->pivot->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>