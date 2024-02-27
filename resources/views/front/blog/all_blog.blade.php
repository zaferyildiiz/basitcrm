@extends('front.partials.master')

@section('content')
<!-- Blog Başlangıcı -->
<div class="container-fluid blog py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Blogumuz</h5>
            <h1>En Son Blog Yazıları ve Haberler</h1>
        </div>
        <div class="row g-5 justify-content-center">
            @foreach ($blogs as $item)
            <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                <div class="blog-item position-relative bg-light rounded">
                    <img src="{{ asset('storage/')."/".$item->blog_image_url }}" class=" rounded-top" style="width:100%;height:250px!important">
                    <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">BasitCRM</span>
                    <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: -75px;">
                        <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                            <a href="{{ route('front.blog_detail',['slug'=>$item->slug]) }}" class="btn text-white" style="font-size:15px">Devamını Oku</a>
                        </div>
                        <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                            <div class="blog-icon-1">
                                <p class="text-white px-2">Paylaş<i class="fa fa-arrow-right ms-3"></i></p>
                            </div>
                            <div class="blog-icon-2">
                                <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                                <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                                <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                        <img src="tema/img/admin.jpg" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                        <h5 class="">Yazar: Zafer Yıldız</h5>
                        <span class="text-secondary">{{ date('d-m-Y',strtotime($item->created_at)) }}</span>
                        <p class="py-2">{{ $item->title }}</p>
                    </div>
                    <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                        <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>{{ $item->hit }} Okuma</small></a>
                        <a href="" class="text-white"> </a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
<!-- Blog Sonu -->

@endsection
