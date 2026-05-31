@extends('layouts.main')

@section('title', 'My Products - Product List')

@section('content')

<div style="display: flex; min-height: 100vh; background: linear-gradient(135deg, #e8f4f8 0%, #d4e8ed 100%); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0;">

    <!-- Sidebar - Dark Navy -->
    <aside style="width: 260px; background: linear-gradient(180deg, #1e3a4c 0%, #2c4a5c 100%); color: white; position: fixed; height: 100vh; left: 0; top: 0; z-index: 1000; box-shadow: 4px 0 15px rgba(0,0,0,0.1);">
        
        <!-- User Profile -->
        <div style="padding: 30px 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div style="width: 70px; height: 70px; border-radius: 50%; background: white; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center; font-size: 28px; color: #1e3a4c; border: 3px solid rgba(255,255,255,0.3);">
                <i class="bi bi-person"></i>
            </div>
            <div style="font-size: 16px; font-weight: 600; margin-bottom: 5px;">{{ $user->name ?? 'Guest' }}</div>
            <div style="font-size: 12px; color: rgba(255,255,255,0.7);">{{ $user->email ?? 'guest@email.com' }}</div>
        </div>
        
        <!-- Nav Menu - Only 4 items -->
        <ul style="display: flex; flex-direction: column; padding: 20px 15px; list-style: none; margin: 0;">
              <li style="margin-bottom: 8px;">
                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-grid" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> Dashboard
                </a>
            </li>
            <li style="margin-bottom: 8px;">
                <a href="{{ route('users') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-people" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> User Module
                </a>
            </li>
            <li style="margin-bottom: 8px;">
                <a href="{{ route('profile') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-person-circle" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> Profile
                </a>
            </li>
              <li style="margin-bottom: 8px;">
                <a href="{{ route('products') }}" style="display: flex; align-items: center; padding: 12px 15px; color: white; text-decoration: none; border-radius: 8px; background: rgba(255,255,255,0.15); font-size: 14px;">
                    <i class="bi bi-box-seam" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> Products
                </a>
            </li>
            
            <!-- Logout at bottom -->
            <li style="margin-top: 30px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1);">
                <a href="{{ route('login') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-box-arrow-right" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> Logout
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div style="flex: 1; margin-left: 260px; background: #f0f4f7; min-height: 100vh;">
        
        <!-- Top Header - Same color as sidebar -->
        <header style="background: linear-gradient(180deg, #1e3a4c 0%, #2c4a5c 100%); padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 10px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 100;">
            <h1 style="font-size: 24px; font-weight: 600; color: white; margin: 0;">Welcomeest {{ $user->name ?? 'Nirmal' }} !</h1>
        
            <div style="display: flex; align-items: center; gap: 20px;">
                <!-- Search -->
                <div style="position: relative;">
                    <input type="text" placeholder="Search" style="padding: 10px 40px 10px 15px; border: 1px solid rgba(255,255,255,0.2); border-radius: 25px; width: 280px; font-size: 14px; outline: none; background: rgba(255,255,255,0.1); color: white;">
                    <i class="bi bi-search" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: rgba(255,255,255,0.7);"></i>
                </div>
                
                <!-- Icons -->
                <div style="display: flex; gap: 15px; align-items: center;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                        <i class="bi bi-moon"></i>
                    </div>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                        <i class="bi bi-bell"></i>
                    </div>
                </div>
            </div>
        </header>


        <!-- Main Content -->
        <main class="col-md-13 p-2">
       <div class="d-flex justify-content-between align-items-center mb-7">
                <h2>My Products</h2>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-circle"></i> Add Product
                </button>
            </div>

            <!-- Products Table -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->created_at->format('M d, Y') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editProduct{{ $product->id }}">Edit</button>
                                    <form action="/products/delete/{{ $product->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Product Modal -->
                            <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="/products/update/{{ $product->id }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div us="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/products" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection