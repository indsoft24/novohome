@extends('admin.layouts.app')

@section('content')

<style>

.page-wrapper{
    max-width:1000px;
    margin:auto;
}

/* MAIN CARD */

.marquee-card{
    background:#fff;
    border-radius:28px;
    padding:35px;
    box-shadow:0 15px 40px rgba(0,0,0,0.06);
    border:1px solid #edf1f7;
    overflow:hidden;
    position:relative;
}

/* TOP HEADER */

.marquee-header{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    padding:28px;
    border-radius:22px;
    color:#fff;
    margin-bottom:30px;
}

.marquee-header h2{
    margin:0;
    font-size:32px;
    font-weight:700;
}

.marquee-header p{
    margin-top:8px;
    opacity:0.9;
}

/* FORM */

.form-label{
    font-weight:700;
    margin-bottom:10px;
    color:#1e293b;
}

.form-control{
    border-radius:16px;
    padding:16px;
    border:1px solid #dbe3ee;
    transition:0.3s;
    box-shadow:none !important;
}

.form-control:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,0.1) !important;
}

/* TEXTAREA */

textarea{
    resize:none;
    min-height:140px;
}

/* BUTTON */

.save-btn{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:#fff;
    border:none;
    padding:16px 28px;
    border-radius:16px;
    font-weight:600;
    transition:0.3s;
    width:100%;
}

.save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(37,99,235,0.25);
}

/* SUCCESS */

.alert{
    border-radius:16px;
}

/* MOBILE */

@media(max-width:768px){

    .marquee-card{
        padding:20px;
    }

    .marquee-header h2{
        font-size:24px;
    }
}

</style>

<div class="container py-4">

    <div class="page-wrapper">

        <div class="marquee-card">

            <!-- HEADER -->
            <div class="marquee-header">

                <h2>
                    🎞️ Update Marquee
                </h2>

                <p>
                    Manage scrolling offer text & promotional link
                </p>

            </div>

            <!-- SUCCESS -->
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            <!-- FORM -->
            <form action="/admin/marquee/update" method="POST">

                @csrf

                <!-- TEXT -->
                <div class="mb-4">

                    <label class="form-label">
                        Marquee Text
                    </label>

                    <textarea
                        name="marquee_text"
                        class="form-control auto-expand"
                        placeholder="Enter scrolling text..."
                    >{{ $whatsapp->marquee_text ?? '' }}</textarea>

                </div>

                <!-- LINK -->
                <div class="mb-4">

                    <label class="form-label">
                        Marquee Link
                    </label>

                    <input
                        type="text"
                        name="marquee_link"
                        class="form-control"
                        placeholder="https://example.com"
                        value="{{ $whatsapp->marquee_link ?? '' }}">

                </div>

                <!-- BUTTON -->
                <button type="submit" class="save-btn">

                    <i class="fas fa-save me-2"></i>

                    Save Changes

                </button>

            </form>

        </div>

    </div>

</div>

@endsection