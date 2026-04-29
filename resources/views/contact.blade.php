@extends('layouts.app')

@section('content')

<style>

    body {
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
}

.contact-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #f5f1ea, #ffffff);
}

.contact-wrapper {
    min-height: 70vh;      /* screen ka middle cover kare */
    display: flex;
    justify-content: center;   /* horizontal center */
    align-items: center;       /* vertical center */
}

.contact-wrapper .container {
    max-width: 900px;
}

.contact-card {
    display: flex;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    background: #fff;
}

/* LEFT SIDE IMAGE */
.contact-image {
    position: relative;
    width: 50%;
}

.contact-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Overlay (glass effect) */
.contact-overlay {
    position: absolute;
    top: 10px;     /* upar le aaya */
    left: 10px;    /* left side */
    width: 230px;
    font-size: 14px;
    padding: 5px;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(6px);
    color: #fff;
    border-radius: 10px;
}

.contact-overlay h4 {
    font-weight: 600;
    margin-bottom: 10px;
    color: #f1c27d;
}

/* RIGHT SIDE */
.contact-info {
    width: 50%;
    padding: 40px;
}

.contact-info h3 {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}

.contact-info p {
    margin: 5px 0;
    color: #555;
    font-size: 12px;
}


.contact-info h5 {
    margin-top: 20px;
    color: #c19a6b;
}

/* Hover effect */
.contact-card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}

/* Responsive */
@media(max-width: 768px) {
    .contact-card {
        flex-direction: column;
    }

    .contact-image,
    .contact-info {
        width: 100%;
    }
}
</style>

<section class="contact-section">
    <div class="contact-wrapper">
    <div class="container">

        <div class="contact-card">

            <!-- LEFT IMAGE -->
            <div class="contact-image">
                 @if($contact && $contact->image)
                     <img src="{{ asset('images/' . $contact->image) }}">
                 @else
                     <img src="{{ asset('images/default.jpg') }}">
                 @endif

                <div class="contact-overlay">
                    <h4>HOW TO REACH?</h4>

                    <p>Tuesday - Sunday</p>
                    <p>10:30 AM to 08:00 PM</p>

                    <hr>

                    <p>Mayapuri Metro - 7 min</p>
                    <p>Kirti Nagar Metro - 10 min</p>
                    <p>IGI Airport - 25 min</p>
                    <p>Connaught Place - 37 min</p>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="contact-info">
                <h3>{{ $contact->title }}</h3>

                <p>📍 {{ $contact->address1 }}</p>
                <p>{{ $contact->address2 }}</p>

                <br>

                <p>📞 {{ $contact->phone1 }}</p>
                <p>📞 {{ $contact->phone2 }}</p>

                <br>

                <p>✉️ {{ $contact->email }}</p>

                <h5 class="mt-4">CONTACT US</h5>

                <p>📍 Delhi, India</p>
                <p>📞 {{ $contact->phone1 }}</p>
                <p>✉️ {{ $contact->email }}</p>
                <p>💬 WhatsApp: {{ $contact->whatsapp }}</p>

            </div>

        </div>

    </div>
    </div>
</section>

@endsection