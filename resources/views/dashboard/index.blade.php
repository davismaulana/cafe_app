@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome to the Cafe Management System. Use the sidebar to navigate.</p>

    <!-- Example Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Menus</h5>
                    <p class="card-text">{{ $totalMenus }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Ingredients</h5>
                    <p class="card-text">{{ $totalIngredients }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection