<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icons" href="images/logo2.png">

    <title>{{ config('app.name', 'Motocare') }}</title>

    <link rel="icon" type="image/x-icon" href="/images/logo2.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- GOOGLE ICONS --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- PARALAX --}}
    <!-- Jarallax -->
    <link href="dist/jarallax.css" rel="stylesheet" />
    <script src="dist/jarallax.js"></script>
    <script src="dist/jarallax-video.js"></script>
    <!-- Plausible -->
    <script defer async data-domain="jarallax.nkdev.info" src="https://plausible.io/js/plausible.outbound-links.js">
    </script>
    <script>
        window.plausible = window.plausible || function() {
            (window.plausible.q = window.plausible.q || []).push(arguments)
        }
    </script>

    <style>
        /* Loader Styles */
        @keyframes clockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes counter-clockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        /* Loader Overlay */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #030712;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Gearbox Styles */
        .gearbox {
            background: #111;
            height: 150px;
            width: 200px;
            position: relative;
            border: none;
            overflow: hidden;
            border-radius: 6px;
            box-shadow: 0px 0px 0px 1px rgba(255, 255, 255, 0.1);
        }

        .gearbox .overlay {
            border-radius: 6px;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            box-shadow: inset 0px 0px 20px black;
            transition: background 0.2s;
        }

        .gearbox .overlay {
            background: transparent;
        }

        .gear {
            position: absolute;
            height: 60px;
            width: 60px;
            box-shadow: 0px -1px 0px 0px #888888, 0px 1px 0px 0px black;
            border-radius: 30px;
        }

        .gear.large {
            height: 120px;
            width: 120px;
            border-radius: 60px;
        }

        .gear.large:after {
            height: 96px;
            width: 96px;
            border-radius: 48px;
            margin-left: -48px;
            margin-top: -48px;
        }

        .gear.one {
            top: 12px;
            left: 10px;
        }

        .gear.two {
            top: 61px;
            left: 60px;
        }

        .gear.three {
            top: 110px;
            left: 10px;
        }

        .gear.four {
            top: 13px;
            left: 128px;
        }

        .gear:after {
            content: "";
            position: absolute;
            height: 36px;
            width: 36px;
            border-radius: 36px;
            background: #111;
            top: 50%;
            left: 50%;
            margin-left: -18px;
            margin-top: -18px;
            z-index: 3;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1), inset 0px 0px 10px rgba(0, 0, 0, 0.1), inset 0px 2px 0px 0px #090909, inset 0px -1px 0px 0px #888888;
        }

        .gear-inner {
            position: relative;
            height: 100%;
            width: 100%;
            background: #555;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .large .gear-inner {
            border-radius: 60px;
        }

        .gear.one .gear-inner {
            animation: counter-clockwise 3s infinite linear;
        }

        .gear.two .gear-inner {
            animation: clockwise 3s infinite linear;
        }

        .gear.three .gear-inner {
            animation: counter-clockwise 3s infinite linear;
        }

        .gear.four .gear-inner {
            animation: counter-clockwise 6s infinite linear;
        }

        .gear-inner .bar {
            background: #555;
            height: 16px;
            width: 76px;
            position: absolute;
            left: 50%;
            margin-left: -38px;
            top: 50%;
            margin-top: -8px;
            border-radius: 2px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .large .gear-inner .bar {
            margin-left: -68px;
            width: 136px;
        }

        .gear-inner .bar:nth-child(2) {
            transform: rotate(60deg);
        }

        .gear-inner .bar:nth-child(3) {
            transform: rotate(120deg);
        }

        .gear-inner .bar:nth-child(4) {
            transform: rotate(90deg);
        }

        .gear-inner .bar:nth-child(5) {
            transform: rotate(30deg);
        }

        .gear-inner .bar:nth-child(6) {
            transform: rotate(150deg);
        }

        /* Optional: Style for the main content */
        #content {
            display: none;
            /* Hidden initially until the page is fully loaded */
        }


        /*
  MAIN CONTENT
  */
        .jarallax {
            position: relative;
            z-index: 0;
        }

        .jarallax>.jarallax-img,
        picture.jarallax-img img {
            position: absolute;
            object-fit: cover;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .jarallax-keep-img {
            position: relative;
            z-index: 0;
        }

        .jarallax-keep-img>.jarallax-img {
            position: relative;
            display: block;
            max-width: 100%;
            height: auto;
            z-index: -100;
            opacity: 0;
        }


        /* demo styles */
        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            color: #ffffff;
            background-color: #000;
        }

        h1,
        h2,
        h3 {
            color: #f3f4f6;
        }

        h1 {
            font-size: 50px;
        }

        h2 {
            font-size: 30px;
        }

        p {
            margin-top: 0;
            margin-bottom: 5px;
        }

        p~p,
        p~div {
            margin-top: 15px;
        }

        small {
            font-size: 80%;
            opacity: 0.6;
        }

        a,
        a:visited,
        a:hover,
        a:focus {
            color: inherit;
        }

        a:hover,
        a:focus {
            color: #4f4f4f;
        }

        .jarallax {
            min-height: 600px;
        }

        .jarallax-keep-img.demo-float-left {
            margin-right: 15px;
            margin-left: -60px;
        }

        .jarallax-keep-img.demo-float-right {
            margin-left: 15px;
            margin-right: -60px;
        }

        @media screen and (max-width: 600px) {

            .jarallax-keep-img.demo-float-left,
            .jarallax-keep-img.demo-float-right {
                margin-right: 0;
                margin-left: 0;
                float: none;
            }
        }


        /* Lighter background */
        .lighter-bg {
            background-color: #0f0f11;
        }

        /* hero block */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 500px;
            height: calc(100vh - 220px);
        }

        .hero h1 {
            font-size: 80px;
            font-size: clamp(32px, 7.5vw, 80px);
            max-width: 1200px;
            margin: 0 auto;
            line-height: 1;
            letter-spacing: -0.01em;
            font-weight: 800;
        }

        .hero.jarallax>.jarallax-img img,
        .hero.jarallax>.jarallax-container img {
            filter: blur(3px);
        }

        .hero-name {
            font-size: 20px;
            font-size: clamp(17px, 2vw, 20px);
            font-weight: 300;
            letter-spacing: 1.1em;
            letter-spacing: clamp(1em, 2vw, 1.1em);
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .hero+.demo-gap {
            min-height: 230px;
        }

        .text-center {
            text-align: center;
        }

        .jarallax>.jarallax-img,
        .jarallax>.jarallax-container,
        .jarallax-keep-img>.jarallax-container {
            opacity: 0.5;
        }

        /* buttons */
        .buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        *+.buttons {
            margin-top: 20px;
        }

        a.button {
            display: inline-block;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            padding: 12px;
            border-radius: 4px;
            min-width: 200px;
            background-color: #fff;
            color: #000;
            transition: background-color .3s ease, transform .3s ease, box-shadow .3s ease;
        }

        a.button:hover,
        a.button:focus {
            background-color: rgba(255, 255, 255, 0.8);
            transform: translateY(-2px);
        }

        a.button-outline {
            background-color: transparent;
            color: #fff;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        }

        a.button-outline:hover,
        a.button-outline:focus {
            background-color: transparent;
            box-shadow: inset 0 0 0 1px #fff;
        }

        /* gap */
        .demo-gap {
            padding: 50px;
            overflow: hidden;
        }

        .demo-gap h1,
        .demo-gap h2,
        .demo-gap h3 {
            text-align: center;
        }

        .demo-gap .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Demo Content */
        .demo-content {
            padding: 80px;
        }


        /* Float */
        .demo-float-left {
            float: left;
        }

        .demo-float-right {
            float: right;
        }


        /* Footer */
        .footer {
            text-align: center;
        }


        /* Mobile */
        @media screen and (max-width: 500px) {

            .demo-gap,
            .demo-content {
                padding: 50px 30px;
            }
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased bg-gray-950">
    <x-loader></x-loader>
    <x-navbar></x-navbar>
    <div class="jarallax hero">
        <img class="jarallax-img" src="images/image-1.jpg" alt="" />
        <div class="hero-content">
            <div class="hero-name">Motocare</div>
            <h1>Your Loyal Friend for Motorcycle Care</h1>
        </div>
    </div>
    <div class="demo-gap">
        <div class="container text-center">
            <p>
                Keep your motorcycle performing optimally with Motocare! Monitor when to change the oil and receive
                automatic reminders to keep your vehicle in prime condition. Let's start taking care of your motorcycle
                more easily and practically with Motocare
            </p>
            <div class="buttons">
                <a class="button" href="#" target="_blank">Get
                    Started</a>
                <a class="button button-outline" href="#" target="_blank">Contact Us</a>
            </div>
        </div>
    </div>
    <div class="jarallax" data-speed="0">
        <img class="jarallax-img" src="images/image-2.jpg" alt="" loading="lazy" />
    </div>
    <div class="demo-gap">
        <h2>Don't wait until it's too late</h2>
    </div>
    <div class="jarallax" data-speed="-0.3">
        <img class="jarallax-img" src="images/image-3.jpg" alt="" loading="lazy" />
    </div>

    <div class="demo-gap demo-content lighter-bg">
        <div class="container">
            <p>
                Motocare is an innovative platform specifically designed to help motor vehicle owners maintain their
                engine's optimal condition with a primary focus on oil changes. Through this website, users can easily
                monitor when the right time to change the oil is based on the vehicle's usage history and mileage
                achieved. With a user-friendly interface and intuitive features, Motocare offers a practical solution
                for vehicle owners who often forget or have difficulty tracking routine maintenance needs such as oil
                changes.
            </p>

            <div class="jarallax-keep-img demo-float-right" data-speed="0.8">
                <img class="jarallax-img" src="images/image-small.jpg" alt="" width="300" loading="lazy" />
            </div>

            <p>
                Motocare is also designed to be accessible via various devices, be it desktop, tablet, or smartphone, so
                that users can check the status of their vehicle anytime and anywhere. In addition, this website is
                equipped with an automatic reminder that will send a notification when the oil change time is
                approaching, ensuring that the motorbike remains in prime condition and is free from potential damage
                caused by oil that has been used for too long. With Motocare, users are not only facilitated in terms of
                maintenance, but also contribute to extending the life of the engine and maintaining optimal vehicle
                performance.
            </p>

            <p>
                In addition, Motocare provides additional information about the right types of oil for various types of
                vehicles, general motorcycle maintenance tips, and recommendations for the nearest trusted workshop to
                change the oil. This makes Motocare the only complete solution for motor vehicle maintenance, combining
                the convenience of technology with the practical needs of everyday riders.
            </p>
        </div>
    </div>

    <div class="demo-gap">
        <h2>Change the oil on time, the motorbike is always in prime condition</h2>
    </div>
    <div class="jarallax" data-speed="0.7" data-video-src="mp4:video/video.mp4">
        <img class="jarallax-img" src="video/video.png" alt="" loading="lazy" />
    </div>

    <script type="text/javascript">
        /* init Jarallax */
        jarallax(document.querySelectorAll(".jarallax"));

        jarallax(document.querySelectorAll(".jarallax-keep-img"), {
            keepImg: true,
        });
    </script>
    <x-footer></x-footer>
</body>

</html>
