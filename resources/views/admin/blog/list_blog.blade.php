@extends("admin.partials.master")

@section("pagetitle","Blog Yazıları")
@section("title","Blog Listesi")
@section("pagesubtitle","Tüm Blog Yazıları")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Blog Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Blog Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('admin.add_blog_post') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Başlık -->
                    <div class="form-group">
                        <label for="title">Başlık:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <!-- İçerik -->
                    <div class="form-group">
                        <label for="content">İçerik:</label>
                        <textarea class="form-control" id="editor" name="content" rows="5" required></textarea>
                    </div>
                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>

                    <!-- Blog Resim -->
                    <div class="form-group">
                        <label for="blog_image">Blog Resim:</label>
                        <input type="file" class="form-control" id="blog_image" name="blog_image" required>
                    </div>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Blog Ekle</button>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    </div>
@endsection
@section("content")
<div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><button class="table-sort" data-sort="sort-name">Başlık</button></th>
              <th><button class="table-sort" data-sort="sort-city">İçerik</button></th>
              <th><button class="table-sort" data-sort="sort-type">Slug</button></th>
              <th><button class="table-sort" data-sort="sort-type">Blog Resim</button></th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($blogs as $key=>$value)
                <tr>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->slug }}</td>
                    <td>
                        @php
                            $path = Storage::disk('public')->path($value->blog_image_url);

                        @endphp
                        <img src="{{ asset('storage/blog_images/kcfukn005kV4RZnBFi7j1yMUxttZzDBteeZE0et5.jpg') }}" with="50" height="50">
                    </td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary">Düzenle</a>
                        <a href="" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('script')
@if (Session::has('success'))
<script>
    swal({
        title: "Başarılı!",
        text: "{{ Session::get('success') }}",
        type: "success",
        confirmButtonText: "Tamam"
        });
</script>
@endif

@endsection
