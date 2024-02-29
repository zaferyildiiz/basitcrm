@extends("panel.partials.master")

@section("pagetitle","Ürünler")
@section("title","Ürün   Listesi")
@section("pagesubtitle","Tüm Ürünler")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Ürün Markası Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ürün Markası Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('panel.add_product_brand_post') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Marka Adı</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="brand_logo" class="form-label">Marka Logosu</label>
                        <input type="file" class="form-control" id="brand_logo" name="brand_logo">
                    </div>

                    <div class="mb-3">
                        <label for="brand_description" class="form-label">Marka Açıklaması</label>
                        <textarea class="form-control" id="brand_description" name="brand_description" rows="3"></textarea>
                    </div>





                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Kaydet</button>
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
               <th>Marka Adı</th>
               <th>Kategori Adı</th>
               <th>Açıklama</th>
               <th>Logo</th>
               <th>İşlemler</th>

             </tr>
          </thead>
          <tbody class="table-tbody">

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
