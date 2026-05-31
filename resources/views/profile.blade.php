@extends('layouts.main')

@section('title', 'Profile - Product List')

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
                <a href="{{ route('users') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-grid" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> Dashboard 
                </a>
            </li>
            <li style="margin-bottom: 8px;">
                <a href="{{ route('users') }}" style="display: flex; align-items: center; padding: 12px 15px; color: rgba(255,255,255,0.8); text-decoration: none; border-radius: 8px; font-size: 14px; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.8)'">
                    <i class="bi bi-people" style="margin-right: 12px; font-size: 18px; width: 24px; text-align: center;"></i> User Module
                </a>
            </li>
 <li style="margin-bottom: 8px;">
                <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; padding: 12px 15px; color: white; text-decoration: none; border-radius: 8px; background: rgba(255,255,255,0.15); font-size: 14px;">
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
            <h1 style="font-size: 24px; font-weight: 600; color: white; margin: 0;">Welcome {{ $user->name ?? 'Mark' }} !</h1>
            
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
<main style="flex: 1; margin-left: -10px; background: #f0f4f7; min-height: 120vh; padding: 20px; display: flex; align-items: center; justify-content: center;min-height: 550px;">
    
    <!-- Centered Container -->
    <div style="max-width:2200px; width: 120%; margin: 0 auto;">
        
        <!-- Profile Card -->
        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); overflow: hidden;">
            
            <!-- Card Header -->
            <div style="background: linear-gradient(180deg, #1e3a4c 0%, #2c4a5c 100%); padding: 15px 25px;">
                <h5 style="color: white; margin: 0; font-size: 16px; font-weight: 600;">Profile Information</h5>
            </div>
            
            <!-- Card Body -->
            <div style="padding: 20px;">
                @php $user = \App\Models\User::find(session('user_id')); @endphp
                
                <!-- Profile Picture Display - Smaller -->
                <div style="text-align: center; margin-bottom: 15px;">
                    @if($user->profile_picture)
                        <img src="{{ asset('uploads/' . $user->profile_picture) }}" 
                             style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #e0f2f1;" 
                             alt="Profile">
                    @else
                        <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(180deg, #1e3a4c 0%, #2c4a5c 100%); margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 40px; border: 3px solid #e0f2f1;">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                </div>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 15px 0;">

                <!-- Form 1: Update Info - Compact -->
                <form action="/profile/update" method="POST" style="margin-bottom: 15px;">
                    @csrf
                    
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" required 
                               style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; outline: none;">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" required 
                               style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; outline: none;">
                    </div>

                    <button type="submit" style="background: #1e3a4c; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="bi bi-pencil-square"></i> Update Info
                    </button>
                </form>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 15px 0;">

                <!-- Form 2: Upload Picture - Compact -->
                <form action="/profile/picture" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Profile Picture</label>
                        <input type="file" name="profile_picture" required 
                               style="width: 100%; padding: 8px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; background: white;">
                    </div>

                    <button type="submit" style="background: #10b981; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="bi bi-camera"></i> Upload Picture
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
    </div>
</div>
@endsection