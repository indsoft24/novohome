@extends('layouts.app')

@section('content')

<style>
.contact-card {
    display: flex;
    border-radius: 28px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
}

/* IMAGE */
.contact-image {
    width: 48%;
    min-height: 480px;
}

.contact-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* RIGHT SIDE */
.contact-info {
    width: 52%;
    padding: 32px 30px;
    background: #fff;
}

/* TITLE */
.contact-info h3 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #2b2b2b;
    margin-bottom: 15px;
    line-height: 1.2;
}

/* SUBTEXT */
.contact-subtitle {
    color: #777;
    font-size: 14px;
    line-height: 1.8;
    margin-bottom: 20px;
}

/* INFO BOX */
.info-box {
    background: #faf7f2;
    border-radius: 18px;
    padding: 14px 16px;
    margin-bottom: 12px;
    border: 1px solid #eee;
    transition: 0.3s ease;
}

.info-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

/* LABEL */
.info-label {
    font-size: 13px;
    letter-spacing: 1px;
    color: #a67c52;
    font-weight: 700;
    margin-bottom: 8px;
    text-transform: uppercase;
}

/* VALUE */
.info-value {
    color: #333;
    font-size: 14px;
    line-height: 1.6;
    font-weight: 500;
}

/* SOCIAL */
.contact-social {
    display: flex;
    gap: 14px;
    margin-top: 30px;
}

.contact-social-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background: #f5f1ea;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8b5e3c;
    font-size: 18px;
    transition: 0.3s ease;
    text-decoration: none;
}

.contact-social-icon:hover {
    background: #8b5e3c;
    color: #fff;
    transform: translateY(-5px);
}

/* MOBILE */
@media(max-width: 768px){

    .contact-card{
        flex-direction: column;
    }

    .contact-image,
    .contact-info{
        width: 100%;
    }

    .contact-image{
        min-height: 350px;
    }

    .contact-info{
        padding: 35px 25px;
    }

    .contact-info h3{
        font-size: 28px;
    }

    .reach-grid{
        grid-template-columns: 1fr;
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
            </div>

            <!-- RIGHT SIDE -->
            <div class="contact-info">

    <h3>{{ $contact->title }}</h3>

    <p class="contact-subtitle">
        Luxury furniture crafted for modern living spaces.
        Reach out to us for premium collections and custom interiors.
    </p>

    <div class="info-box">
        <div class="info-label">Address</div>

        <div class="info-value">
            📍 {{ $contact->address1 }} <br>
            {{ $contact->address2 }}
        </div>
    </div>

    <div class="info-box">
        <div class="info-label">Phone</div>

        <div class="info-value">
            📞 {{ $contact->phone1 }} <br>
            📞 {{ $contact->phone2 }}
        </div>
    </div>

    <div class="info-box">
        <div class="info-label">Email</div>

        <div class="info-value">

            <a href="mailto:{{ $contact->email }}"
               style="text-decoration:none;color:#333;">
        
               ✉️ {{ $contact->email }}
        
            </a>
        
        </div>
    </div>

    <div class="info-box">
    <div class="info-label">WhatsApp</div>

        <div class="info-value">
            <a href="https://wa.me/91{{ $contact->phone1 }}"
               target="_blank"
               style="text-decoration:none;color:#333;font-weight:500;">
    
               💬 Chat on WhatsApp
            </a>
        </div>
    </div>

    <div class="contact-social">

        
          <!-- WEBSITE -->
          <a href="http://indiansoftwareservices.com/"
             target="_blank"
             class="contact-social-icon">
              <i class="fas fa-globe"></i>
          </a>
      
          <!-- FACEBOOK -->
          <a href="https://facebook.com"
             target="_blank"
             class="contact-social-icon">
              <i class="fab fa-facebook-f"></i>
          </a>
      
          <!-- INSTAGRAM -->
          <a href="https://instagram.com"
             target="_blank"
             class="contact-social-icon">
              <i class="fab fa-instagram"></i>
          </a>
      
          <!-- TWITTER / X -->
          <a href="https://twitter.com"
             target="_blank"
             class="contact-social-icon">
              <i class="fab fa-x-twitter"></i>
          </a>
    
    </div>
</div>
    </div>
    </div>
</section>

@endsection