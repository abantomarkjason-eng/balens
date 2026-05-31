@extends('layouts.main')

@section('title', 'Dashboard - Product List')

@section('content')
@php
$userId = session('user_id');
$userCount = \App\Models\User::count();
$productCount = \App\Models\Product::count();
$myProducts = \App\Models\Product::where('user_id', $userId)->count();
$otherProducts = \App\Models\Product::where('user_id', '!=', $userId)->count();
$user = \App\Models\User::find(session('user_id'));
@endphp

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
                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; padding: 12px 15px; color: white; text-decoration: none; border-radius: 8px; background: rgba(255,255,255,0.15); font-size: 14px;">
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
                <a href="{{ route('products') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
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
            <h1 style="font-size: 24px; font-weight: 600; color: white; margin: 0;">Welcome {{ $user->name ?? 'Nirmal' }} !</h1>
            
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

        <!-- Content Area -->
        <main style="padding: 30px;">
            
            <!-- Over View Title -->
            <h2 style="font-size: 18px; font-weight: 600; color: #334155; margin-bottom: 20px; margin-top: 0;">ProductsOver View</h2>
            
            <!-- Stats Cards - 4 cards in a row -->
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
                
                <!-- Total Products -->
                <div style="background: white; border-radius: 12px; padding: 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="width: 50px; height: 50px; border-radius: 10px; background: #e0f2f1; display: flex; align-items: center; justify-content: center; color: #00897b; font-size: 24px;">
                        <i class="bi bi-box"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 4px 0;">{{ $productCount }}</h3>
                        <p style="font-size: 13px; color: #64748b; margin: 0;">Total Products</p>
                    </div>
                </div>

                <!-- My Products -->
                <div style="background: white; border-radius: 12px; padding: 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="width: 50px; height: 50px; border-radius: 10px; background: #e3f2fd; display: flex; align-items: center; justify-content: center; color: #1976d2; font-size: 24px;">
                        <i class="bi bi-layers"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 4px 0;">{{ $myProducts }}</h3>
                        <p style="font-size: 13px; color: #64748b; margin: 0;">My Products</p>
                    </div>
                </div>

                <!-- Total Users -->
                <div style="background: white; border-radius: 12px; padding: 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="width: 50px; height: 50px; border-radius: 10px; background: #e8f5e9; display: flex; align-items: center; justify-content: center; color: #388e3c; font-size: 24px;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 4px 0;">{{ $userCount }}</h3>
                        <p style="font-size: 13px; color: #64748b; margin: 0;">Total Users</p>
                    </div>
                </div>

                <!-- Other Products -->
                <div style="background: white; border-radius: 12px; padding: 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="width: 50px; height: 50px; border-radius: 10px; background: #fff3e0; display: flex; align-items: center; justify-content: center; color: #f57c00; font-size: 24px;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0 0 4px 0;">{{ $otherProducts }}</h3>
                        <p style="font-size: 13px; color: #64748b; margin: 0;">Other Products</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Charts Section - Keeping both charts -->
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap:20px;">
                
                <!-- Users vs Products Trend Line Chart -->
                <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="font-size: 16px; font-weight: 600; color: #334155; margin: 0;">Users vs Products Trend</h3>
                        <span style="font-size: 13px; color: #94a3b8;">Last 6 months</span>
                    </div>
                    <div style="position: relative; height: 350px;">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>

                <!-- Users Overview Bar Chart -->
                <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="font-size: 16px; font-weight: 600; color: #334155; margin: 0;">
                            <i class="bi bi-bar-chart-line" style="color: #667eea; margin-right: 8px;"></i> Users Overview
                        </h3>
                        <span style="font-size: 12px; padding: 4px 10px; background: #f1f5f9; color: #64748b; border-radius: 6px;">Data</span>
                    </div>
                    <div style="position: relative; height:350px;">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- Toast Notifications -->
@if(session('success'))
<div style="position: fixed; top: 0; right: 0; padding: 1rem; z-index: 1050;">
    <div class="toast show align-items-center text-white bg-success border-0" role="alert" style="display: flex; min-width: 250px; border-radius: 8px; overflow: hidden;">
        <div class="d-flex" style="display: flex; width: 100%;">
            <div class="toast-body" style="padding: 12px 15px; flex: 1;">
                <i class="bi bi-check-circle-fill" style="margin-right: 8px;"></i>{{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" style="padding: 12px; background: transparent; border: none; color: white; cursor: pointer; font-size: 18px; line-height: 1;">&times;</button>
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div style="position: fixed; top: 0; right: 0; padding: 1rem; z-index: 1050;">
    <div class="toast show align-items-center text-white bg-danger border-0" role="alert" style="display: flex; min-width: 250px; border-radius: 8px; overflow: hidden;">
        <div class="d-flex" style="display: flex; width: 100%;">
            <div class="toast-body" style="padding: 12px 15px; flex: 1;">
                <i class="bi bi-exclamation-circle-fill" style="margin-right: 8px;"></i>{{ session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" style="padding: 12px; background: transparent; border: none; color: white; cursor: pointer; font-size: 18px; line-height: 1;">&times;</button>
        </div>
    </div>
</div>
@endif

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Auto-hide toast messages after 3 seconds
    setTimeout(function() {
        var toasts = document.querySelectorAll('.toast');
        for (var i = 0; i < toasts.length; i++) {
            toasts[i].classList.remove('show');
            toasts[i].style.display = 'none';
        }
    }, 3000);
    
    // User chart (bar chart)
    var userCtx = document.getElementById('userChart');
    new Chart(userCtx, {
        type: 'bar',
        data: {
            labels: ['Total Users', 'Total Products'],
            datasets: [{
                data: [{{ $userCount }}, {{ $productCount }}],
                backgroundColor: ['#667eea', '#38ef7d'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
    
    // Trend Line Chart (Users vs Products Trend)
    var trendCtx = document.getElementById('trendChart');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Users',
                data: [{{ $userCount * 0.8 }}, {{ $userCount * 0.85 }}, {{ $userCount * 0.9 }}, {{ $userCount * 0.95 }}, {{ $userCount }}, {{ $userCount * 1.05 }}, {{ $userCount * 1.1 }}],
                borderColor: '#f97316',
                backgroundColor: 'rgba(249, 115, 22, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Products',
                data: [{{ $productCount * 0.7 }}, {{ $productCount * 0.75 }}, {{ $productCount * 0.8 }}, {{ $productCount * 0.9 }}, {{ $productCount }}, {{ $productCount * 1.1 }}, {{ $productCount * 1.2 }}],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection