<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>BasitCRM - İŞ Yönetimi</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="tema/lib/animate/animate.min.css" rel="stylesheet">
        <link href="tema/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="tema/css/bootstrap.min.css " rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="tema/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

            @include("front.partials.topbar")
            @include('front.partials.navbar')
            @include('front.partials.slider')
            @include('front.partials.fact')
            @include('front.partials.aboutus')
            @include('front.partials.ourservices')
            {{-- @include('front.partials.ourproject') --}}
            @include('front.partials.ourblog')
            @include('front.partials.ourtestiminional')
            @include('front.partials.ourcontact')
            @include('front.partials.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="tema/lib/wow/wow.min.js"></script>
        <script src="tema/lib/easing/easing.min.js"></script>
        <script src="tema/lib/waypoints/waypoints.min.js"></script>
        <script src="tema/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="tema/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (Session::has('success'))
            <script>
                swal("Başarılı","{{ Session::get('success') }}", "success");

            </script>
        @endif
    </body>

</html>
