@extends('layouts.main')

@section('title', 'Login - Product List')

@section('content')
<div style="min-height: 100vh; background: #f8f9fa; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="width: 100%; max-width: 400px; background: white; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
        
        <!-- Header with curved bottom -->
        <div style="background: linear-gradient(135deg, #2d3561 0%, #1a1f3d 100%); padding: 40px 30px 60px; position: relative; border-radius: 0 0 50% 50% / 0 0 30% 30%;">
            <!-- Back arrow -->
            <div style="position: absolute; top: 20px; left: 20px;">
                <a href="#" style="color: white; font-size: 20px; text-decoration: none;"><i class="bi bi-arrow-left"></i></a>
            </div>
            
            <!-- Tabs -->
            <div style="display: flex; justify-content: center; gap: 40px; margin-top: 20px;">
                <a href="{{ route('register') }}" style="color: rgba(255,255,255,0.6); text-decoration: none; font-size: 16px; font-weight: 500;">Sign Up</a>
                <a href="{{ route('login') }}" style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; border-bottom: 2px solid white; padding-bottom: 5px;">Sign In</a>
            </div>
        </div>

        <!-- Content -->
        <div style="padding: 30px 30px 40px;">
            <h2 style="text-align: center; color: #2d3561; margin-bottom: 30px; font-size: 24px; font-weight: 600;">Welcome Back !</h2>

            <form action="/login" method="POST">
                @csrf
                
                <!-- Email -->
                <div style="margin-bottom: 20px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 15px 15px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; outline: none; background: #fafafa;">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 15px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-lock-fill"></i>

                    </div>
                    <input type="password" name="password" id="password" placeholder="Password" required style="width: 100%; padding: 15px 45px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; outline: none; background: #fafafa;">
                    <div style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #6c757d; cursor: pointer;" onclick="togglePassword()">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; font-size: 13px;">
                    <label style="display: flex; align-items: center; gap: 8px; color: #6c757d; cursor: pointer;">
                        <input type="checkbox" name="remember" style="width: 16px; height: 16px; accent-color: #2d3561;">
                        Remember Password
                    </label>
                    <a href="#" style="color: #dc3545; text-decoration: none;">Forget Password?</a>
                </div>

                <!-- Sign In Button -->
                <button type="submit" style="width: 100%; padding: 15px; background: #2d3561; color: white; border: none; border-radius: 25px; font-size: 16px; font-weight: 600; cursor: pointer; margin-bottom: 25px;">Sign In</button>

                <!-- Divider -->
                <div style="display: flex; align-items: center; margin-bottom: 25px;">
                    <div style="flex: 1; height: 1px; background: #e0e0e0;"></div>
                    <span style="padding: 0 15px; color: #6c757d; font-size: 13px;">Or sign in with</span>
                    <div style="flex: 1; height: 1px; background: #e0e0e0;"></div>
                </div>

                <!-- Social Buttons -->
                <div style="display: flex; gap: 15px; justify-content: center; margin-bottom: 20px;">
                    <button type="button" style="display: flex; align-items: center; gap: 8px; padding: 12px 25px; border: 1px solid #e0e0e0; border-radius: 25px; background: white; cursor: pointer; font-size: 14px; color: #333;">
                        <img src="https://www.google.com/favicon.ico" alt="Google" style="width: 20px; height: 20px;">
                        Google
                    </button>
                    <button type="button" style="display: flex; align-items: center; gap: 8px; padding: 12px 25px; border: none; border-radius: 25px; background: #2d3561; color: white; cursor: pointer; font-size: 14px;">
                        <i class="bi bi-facebook"></i>
                        Facebook
                    </button>
                </div>
            </form>
        </div>

        <div style="background: linear-gradient(135deg, #2d3561 0%, #1a1f3d 100%); height: 60px; border-radius: 50% 50% 0 0 / 30% 30% 0 0; margin-top: -20px;"></div>
    </div>
</div>

@endsection