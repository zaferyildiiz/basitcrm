     <!-- Carousel Start -->
     <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="tema/img/carousel-1.jpg" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Müşteri Yönetimi</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight">Müşterilerinizi Takip Edin</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Müşteri Hareketlerine Göre Aksiyon Alın.</p>
                            <a href="" class="me-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Daha Fazla</button></a>
                            <a href="{{ route('front.demo_talep_et') }}" class="ms-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Demo Talep Et</button></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="tema/img/carousel-2.jpg" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Satış Yönetimi</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Satışları, Projeleri tek bir alandan yönetin!</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Müşterilerle kontakt kurun. Ve BasitCRM ile bu süreci yönetin </p>
                            <a href="" class="me-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Daha Fazla</button></a>
                            <a href="{{ route('front.demo_talep_et') }}" class="ms-2"><button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Demo Talep Et</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
