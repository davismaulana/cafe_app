<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Details</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Employee Details</h1>
    
        <!-- Back to Menu List -->
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Back to Menu</a>
    
        <!-- Menu Details -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $employee->name }}</h5>
                <p class="card-text"><strong>NIK : </strong> {{ $employee->NIK }}</p>
                <p class="card-text"><strong>Email : </strong> {{ $employee->email }}</p>
                <p class="card-text"><strong>Phone : </strong> {{ $employee->phone }}</p>
                <p class="card-text"><strong>Address : </strong> {{ $employee->address }}</p>
                <p class="card-text"><strong>Role : </strong> {{ $employee->role }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>