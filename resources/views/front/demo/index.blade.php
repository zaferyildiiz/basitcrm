@extends('front.partials.master')

@section('content')
<!-- Blog Başlangıcı -->
<div class="container-fluid blog py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Demo Talep Et</h5>
            <h1>Ücretsiz Deneme Süreci ve Demo İçin formu Doldurun</h1>
        </div>
        <div class="row g-5 justify-content-center">

            <form action="{{ route('front.demo_talep_et_post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Adınız ve Soyadınız</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Şirket adı</label>
                    <input type="text" name="company_name" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label>E-posta</label>
                    <input type="text" name="email" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label>Telefon</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label>Açıklama</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Demo Talep Et</button>
            </form>

        </div>
    </div>
</div>
<!-- Blog Sonu -->

@endsection
