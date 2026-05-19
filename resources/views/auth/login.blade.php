<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <!-- EMAIL -->
        <div class="mb-4">

            <label class="form-label fw-semibold text-dark mb-2">
                Email Address
            </label>

            <div class="position-relative">

                <i class="fa-solid fa-envelope position-absolute"
                   style="
                   top:50%;
                   left:18px;
                   transform:translateY(-50%);
                   color:#b57c58;
                   ">
                </i>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="form-control custom-input ps-5"
                    placeholder="Enter your email"
                >
            </div>

            @error('email')
                <div class="text-danger small mt-2">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <!-- PASSWORD -->
        <div class="mb-3">

            <label class="form-label fw-semibold text-dark mb-2">
                Password
            </label>

            <div class="position-relative">

                <i class="fa-solid fa-lock position-absolute"
                   style="
                   top:50%;
                   left:18px;
                   transform:translateY(-50%);
                   color:#b57c58;
                   ">
                </i>

                <input
                    type="password"
                    name="password"
                    required
                    class="form-control custom-input ps-5"
                    placeholder="Enter your password"
                >
            </div>

            @error('password')
                <div class="text-danger small mt-2">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <!-- REMEMBER + FORGOT -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember_me"
                >

                <label class="form-check-label fw-medium" for="remember_me">
                    Remember me
                </label>

            </div>

            @if (Route::has('password.request'))

                <a href="{{ route('password.request') }}"
                   class="text-decoration-none fw-semibold"
                   style="color:#b57c58;">

                    Forgot Password?

                </a>

            @endif

        </div>

        <!-- BUTTON -->
        <button type="submit" class="login-btn">
            Log In
        </button>

    </form>

    <style>

        .custom-input{
            height:58px;
            border-radius:16px;
            border:1px solid #e5e7eb;
            background:#f9fafb;
            font-size:15px;
            transition:0.3s ease;
            box-shadow:none;
        }

        .custom-input:focus{
            border-color:#c58b64;
            background:white;
            box-shadow:0 0 0 4px rgba(197,139,100,0.15);
        }

        .login-btn{
            width:100%;
            height:58px;
            border:none;
            border-radius:16px;
            background:linear-gradient(135deg,#d59a72,#b57c58);
            color:white;
            font-weight:600;
            font-size:17px;
            transition:0.3s ease;
            box-shadow:0 10px 25px rgba(181,124,88,0.25);
        }

        .login-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 15px 30px rgba(181,124,88,0.35);
        }

        .form-check-input{
            width:18px !important;
            height:18px !important;
            min-height:18px !important;
            margin-top:0;
            cursor:pointer;
            box-shadow:none !important;
        }
        
        .form-check{
            display:flex;
            align-items:center;
            gap:10px;
            padding-top:5px;
        }
        
        .form-check-label{
            margin:0;
            font-weight:500;
            cursor:pointer;
        }

        .form-check-input:checked{
            background-color:#b57c58;
            border-color:#b57c58;
        }

    </style>

</x-guest-layout>