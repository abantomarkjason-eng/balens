@extends('layouts.main')

@section('title', 'Register - Product List')

@section('content')

<div style="min-height: 100vh; background: #f8f9fa; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <div style="width: 100%; max-width: 400px; background: white; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">

        <!-- HEADER (same as login) -->
        <div style="background: linear-gradient(135deg, #2d3561 0%, #1a1f3d 100%); padding: 40px 30px 60px; position: relative; border-radius: 0 0 50% 50% / 0 0 30% 30%;">

            <!-- Back -->
            <div style="position: absolute; top: 20px; left: 20px;">
                <a href="{{ route('login') }}" style="color: white; font-size: 20px; text-decoration: none;">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <!-- Tabs -->
            <div style="display: flex; justify-content: center; gap: 40px; margin-top: 20px;">
                <a href="{{ route('register') }}"
                   style="color: white; text-decoration: none; font-size: 16px; font-weight: 600; border-bottom: 2px solid white; padding-bottom: 5px;">
                    Sign Up
                </a>

                <a href="{{ route('login') }}"
                   style="color: rgba(255,255,255,0.6); text-decoration: none; font-size: 16px; font-weight: 500;">
                    Sign In
                </a>
            </div>

        </div>

        <!-- BODY -->
        <div style="padding: 30px 30px 40px;">

            <h2 style="text-align: center; color: #2d3561; margin-bottom: 25px; font-size: 24px; font-weight: 600;">
                Create Account
            </h2>

            <form action="/register" method="POST">
                @csrf

                <!-- FULL NAME -->
                <div style="margin-bottom: 15px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" name="fullname" placeholder="Full Name" required
                        style="width: 100%; padding: 15px 15px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; background: #fafafa; outline: none;">
                </div>

                <!-- EMAIL -->
                <div style="margin-bottom: 15px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <input type="email" name="email" placeholder="Email" required
                        style="width: 100%; padding: 15px 15px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; background: #fafafa; outline: none;">
                </div>

                <!-- PASSWORD -->
                <div style="margin-bottom: 15px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-lock-fill"></i>
                    </div>

                    <input type="password" name="password" id="password" placeholder="Password" required
                        style="width: 100%; padding: 15px 45px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; background: #fafafa; outline: none;">

                    <div style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6c757d;"
                        onclick="togglePw('password','icon1')">
                        <i class="bi bi-eye-slash" id="icon1"></i>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div style="margin-bottom: 20px; position: relative;">
                    <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #6c757d;">
                        <i class="bi bi-lock"></i>
                    </div>

                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required
                        style="width: 100%; padding: 15px 45px 15px 45px; border: 1px solid #e0e0e0; border-radius: 12px; font-size: 14px; background: #fafafa; outline: none;">

                    <div style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6c757d;"
                        onclick="togglePw('confirmpassword','icon2')">
                        <i class="bi bi-eye-slash" id="icon2"></i>
                    </div>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    style="width: 100%; padding: 15px; background: #2d3561; color: white; border: none; border-radius: 25px; font-size: 16px; font-weight: 600; cursor: pointer; margin-bottom: 20px;">
                    Create Account
                </button>

                <!-- LOGIN LINK -->
                <p style="text-align: center; font-size: 13px; color: #6c757d;">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color: #2d3561; font-weight: 600; text-decoration: none;">
                        Sign In
                    </a>
                </p>

            </form>
        </div>

        <!-- FOOTER CURVE -->
        <div style="background: linear-gradient(135deg, #2d3561 0%, #1a1f3d 100%); height: 60px; border-radius: 50% 50% 0 0 / 30% 30% 0 0; margin-top: -20px;"></div>

    </div>
</div>

<script>
function togglePw(id, iconId) {
    const input = document.getElementById(id);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-slash';
    }
}
</script>

@endsection