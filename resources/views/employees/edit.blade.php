<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Employee</h1>

        <!-- Back to Categories List -->
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Back to Employees</a>

        <!-- Edit Category Form -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="NIK" id="NIK" class="form-control" value="{{ $employee->NIK }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control" required>{{ $employee->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ $employee->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="casheer" {{ $employee->role === 'casheer' ? 'selected' : '' }}>Casheer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>