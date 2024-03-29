    <!-- Navbar Start -->
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="text-white fw-bold d-block">Basit<span class="text-secondary">CRM</span> </h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link active text-secondary">Anasayfa</a>
                        <a href="{{ route('front.about') }}" class="nav-item nav-link">Hakkımızda</a>
                        <a href="{{ route('front.modules') }}" class="nav-item nav-link">Modüllerimiz</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sayfalar</a>
                            <div class="dropdown-menu rounded">
                                <a href="{{ route('front.all_blog') }}" class="dropdown-item">Blog</a>
                                <a href="{{ route('front.team') }}" class="dropdown-item">Bizim Ekip</a>
                                {{-- <a href="testimonial.html" class="dropdown-item">Müşteri Yorumları</a> --}}
                            </div>
                        </div>
                        <a href="{{ route('front.iletisim') }}" class="nav-item nav-link">İletişim</a>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                        <a href="" class="position-relative animated tada infinite">
                            <i class="fa fa-phone-alt text-white fa-2x"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-4 border-end">
                        <span class="text-white-50">Sorularınız mı var ?</span>
                        <span class="text-secondary">Telefon: +90 539 314 19 74</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-center ms-4 ">
                        <a href="#"><i class="bi bi-search text-white fa-2x"></i> </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
