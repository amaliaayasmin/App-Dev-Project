@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    /* Body background with gradient */
    .bg {
        background: linear-gradient(135deg, #ffafbd, #ffc3a0);
        min-height: 100vh;
        color: #343a40;
        font-family: 'Roboto', sans-serif;
    }

    /* Header styling */
    .upcoming-header {
        font-size: 36px;
        font-weight: bold;
        color: #ffffff;
        background:rgb(159, 100, 107);
        padding: 10px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px #000000;
    }

    /* Paragraph styling */
    p {
        line-height: 1.8;
        font-size: 18px;
        color: #2c2c2c;
        margin-bottom: 15px;
    }

    /* Footer styling */
    .footer {
        background:rgba(0, 0, 0, 0.66);
        color: #ffffff;
        padding: 20px 0;
        border-top: 3px solidrgb(127, 20, 38);
    }

    .footer h5 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .footer p, .footer a {
        color: #ffffff;
        margin: 5px 0;
        font-size: 16px;
        text-decoration: none;
    }

    .footer a:hover {
        color: #ffc3a0;
        text-decoration: underline;
    }

    /* Carousel image styling */
    .carousel-inner img {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<body class="bg">
    <div class="container py-4">
        <!-- Header -->
        <div class="text-center">
            <h1 class="upcoming-header">Get to Know Us!</h1>
        </div>

        <!-- Autoplay Slide Image Section -->
        <div class="container py-3">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/AboutHeader.gif') }}" class="d-block w-100" alt="Animated Slide">
                    </div>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="text-center">
            <h1 class="upcoming-header">About Oh My Merits</h1>
        </div>
        <div class="container">
            <p>
                Oh My Merits is a centralized web platform created to streamline the application process for UTM programs. 
                It addresses the inconvenience of repeatedly filling out identical information across multiple Google Forms, 
                offering students a more efficient and user-friendly experience. By centralizing program opportunities, the system 
                ensures that students can easily access and apply to various activities without unnecessary hassle.
            </p>
            <p>
                Beyond simplifying the application process, Oh My Merits serves as a comprehensive hub for UTM students to discover a 
                wide range of programs, events, and volunteer opportunities. This encourages active participation and helps foster a 
                vibrant university community.
            </p>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer text-center">
        <div class="container">
            <h5>Contact Us</h5>
            <p>Email: support@ohmymerits.utm.my</p>
            <p>Phone: +60 123-456-789</p>
            <p>Office Address: Universiti Teknologi Malaysia, Skudai, Johor</p>
            <p><a href="http://oh-my-merits.6mbtd83rzq-v1p3zqmpl3ye.p.temp-site.link/">Visit Our Website</a></p>
        </div>
    </div>
</body>
@endsection
