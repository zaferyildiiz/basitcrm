@extends('front.partials.master')

@section('content')
    <!-- İletişim Başlangıcı -->
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">İletişim Kurun</h5>
            <h1 class="mb-3">Herhangi bir soru için iletişime geçin</h1>
         </div>
        <div class="contact-detail position-relative p-5">
            <div class="row g-5 mb-5 justify-content-center">
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Adres</h4>
                            <a href="https://goo.gl/maps/Zd4BCynmTb98ivUJ6" target="_blank" class="h5">Sancaktepe / İstanbul</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fa fa-phone text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Bizi Ara</h4>
                            <a class="h5" href="tel:+0123456789" target="_blank">+90 539 314 19 74</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Bize E-Posta Gönder</h4>
                            <a class="h5" href="mailto:info@basitcrm.com" target="_blank">info@basitcrm.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="p-5 h-100 rounded contact-map">
                        <iframe class="rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.4710403339755!2d-73.82241512404069!3d40.685622471397615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c26749046ee14f%3A0xea672968476d962c!2s123rd%20St%2C%20Queens%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1686493221834!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <form action="{{ route('front.contact_form_post') }}" method="post">
                            @csrf
                        <div class="mb-4">
                            <input type="text" name="name" class="form-control border-0 py-3" placeholder="Adınız ve Soyadınız" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control border-0 py-3" placeholder="E-Posta Adresiniz" required>
                        </div>

                        <div class="mb-4">
                            <input type="text" name="phone" class="form-control border-0 py-3" placeholder="Telefon Numaranız" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" name="subject" class="form-control border-0 py-3" placeholder="Konu" required>
                        </div>
                        <div class="mb-4">
                            <textarea name="content" class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Mesajınız" required></textarea>
                        </div>
                        <div class="text-start">
                            <button class="btn bg-primary text-white py-3 px-5" type="submit">Mesaj Gönder</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- İletişim Sonu -->

@endsection