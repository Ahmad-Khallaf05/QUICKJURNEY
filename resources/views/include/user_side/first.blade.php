<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QuickJourney</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('placeholder.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{asset("https://fonts.googleapis.com")}}">
    <link rel="preconnect" href="{{asset("https://fonts.gstatic.com")}}" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{asset("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css")}}" rel="stylesheet">
    <link href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css")}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("lib/animate/animate.min.css")}}" rel="stylesheet">
    <link href="{{asset("lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css")}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
</head>

<style>
    .star-rating {
        display: flex;
        font-size: 2em;
        direction: ltr; /* Ensure stars are ordered from left to right */
        justify-content: center;
        position: relative; /* Make the parent element relative for absolute positioning */
        margin-bottom: 1em;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }

    .star-rating input:checked ~ label {
        color: gold;
    }

    .star-rating input:checked ~ input:checked ~ label {
        color: gold;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold;
    }

    .submit-rating-button {
        position: absolute; /* Position the button absolutely within the star-rating container */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0; /* Make the button invisible but still clickable */
        z-index: -1; /* Place the button behind the stars */
        cursor: pointer; /* Ensure the button remains clickable */
        background: transparent; /* Remove background if needed */
    }

    .rating-display {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        margin-top: 1em;
    }

    .rating-display span {
        margin-left: 0.5em;
        color: gold;
        font-size: 2em;
    }
</style>

<body>
