@extends("front.partials.master")
@section('content')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $blog->title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $blog->title }}</li>
            </ol>
        </nav>
    </div>
</div>

    <!-- Blog Start -->
    <div class="container-fluid blog py-5 my-5">
        <div class="container py-5">

            <div class="row g-5 justify-content-center">
              {!! $blog->content !!}
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
