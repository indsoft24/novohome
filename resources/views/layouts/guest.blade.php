<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:
            linear-gradient(rgba(0,0,0,0.04),rgba(0,0,0,0.04)),
            #f4f4f4;
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px 15px;
        }

        .auth-wrapper{
            width:100%;
            max-width:1180px;
            min-height:680px;
            background:white;
            border-radius:32px;
            overflow:hidden;
            box-shadow:
            0 15px 40px rgba(0,0,0,0.08);
        }

        /* LEFT */
        .left-panel{
            background:
            linear-gradient(135deg,#d59a72 0%, #b57c58 100%);
            color:white;
            padding:70px 60px;
            position:relative;
            overflow:hidden;
        }

        .left-panel::before{
            content:'';
            position:absolute;
            width:320px;
            height:320px;
            background:rgba(255,255,255,0.08);
            border-radius:50%;
            top:-120px;
            right:-120px;
        }

        .left-panel::after{
            content:'';
            position:absolute;
            width:220px;
            height:220px;
            background:rgba(255,255,255,0.06);
            border-radius:50%;
            bottom:-90px;
            left:-70px;
        }

        .welcome-title{
            font-size:68px;
            font-weight:800;
            line-height:1;
            margin-bottom:25px;
            position:relative;
            z-index:2;
        }

        .welcome-text{
            font-size:19px;
            line-height:34px;
            opacity:0.95;
            max-width:500px;
            position:relative;
            z-index:2;
        }

        .sofa-image{
            max-width:470px;
            margin-top:45px;
            border-radius:22px;
            box-shadow:
            0 25px 40px rgba(0,0,0,0.25);
            position:relative;
            z-index:2;
        }

        /* RIGHT */
        .right-panel{
            padding:70px 65px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#fff;
        }

        .auth-box{
            width:100%;
            max-width:400px;
        }

        .auth-heading{
            font-size:52px;
            font-weight:800;
            color:#111827;
            margin-bottom:8px;
        }

        .auth-subtitle{
            color:#6b7280;
            font-size:17px;
            margin-bottom:40px;
        }

        /* FORM */
        .auth-box label{
            font-weight:600;
            margin-bottom:10px;
            color:#374151;
        }

        .auth-box input{
            width:100%;
            height:56px;
            border-radius:14px;
            border:1px solid #e5e7eb;
            background:#f9fafb;
            padding:0 18px;
            font-size:15px;
            transition:0.3s ease;
        }

        .auth-box input:focus{
            border-color:#c58b64;
            background:white;
            box-shadow:0 0 0 4px rgba(197,139,100,0.15);
            outline:none;
        }

        .auth-box button{
            width:100%;
            height:56px;
            border:none;
            border-radius:14px;
            background:linear-gradient(135deg,#d59a72,#b57c58);
            color:white;
            font-weight:600;
            font-size:17px;
            transition:0.3s ease;
            box-shadow:0 10px 20px rgba(181,124,88,0.25);
        }

        .auth-box button:hover{
            transform:translateY(-2px);
            box-shadow:0 14px 25px rgba(181,124,88,0.35);
        }

        .remember-area{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin:18px 0 28px;
        }

        .remember-area label{
            margin:0;
            font-size:15px;
            font-weight:500;
        }

        .remember-area input{
            width:18px;
            height:18px;
        }

        .remember-box{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .forgot-link{
            text-decoration:none;
            color:#b57c58;
            font-weight:600;
            transition:0.3s;
        }

        .forgot-link:hover{
            color:#8f5e42;
        }

        .bottom-text{
            text-align:center;
            margin-top:28px;
            color:#6b7280;
            font-size:15px;
        }

        .bottom-text a{
            color:#b57c58;
            font-weight:600;
            text-decoration:none;
        }

        @media(max-width:991px){

            .left-panel{
                display:none !important;
            }

            .right-panel{
                padding:50px 30px;
            }

            .auth-heading{
                font-size:42px;
            }

            .auth-wrapper{
                min-height:auto;
            }
        }

        @media(max-width:576px){

            .auth-heading{
                font-size:36px;
            }

            .remember-area{
                flex-direction:column;
                align-items:flex-start;
                gap:15px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="row auth-wrapper mx-auto">

        <!-- LEFT -->
        <div class="col-lg-6 left-panel d-none d-lg-flex flex-column justify-content-center">

            <h1 class="welcome-title">
                Welcome
            </h1>

            <p class="welcome-text">
                Discover premium furniture crafted for modern living.
                Luxury comfort meets elegant design with timeless comfort.
            </p>

            <img
                src="{{ asset('images/sofa.png') }}"
                class="img-fluid sofa-image"
            >

        </div>

        <!-- RIGHT -->
        <div class="col-lg-6 right-panel">

            <div class="auth-box">

                <h2 class="auth-heading text-center">
                    {{ Request::is('login') ? 'Sign In' : 'Create Account' }}
                </h2>

                <p class="auth-subtitle text-center">
                    Access your NOVAHOMZ account
                </p>

                {{ $slot }}

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>