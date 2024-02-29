@extends("panel.partials.master")

@section("pagetitle","Ürün Kategorileri")
@section("title","Ürün Kategori Listesi")
@section("pagesubtitle","Tüm Ürün Kategorileri")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Ürün Kategorisi Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ürün Kategorisi Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('panel.add_product_category_post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Kategori Adı</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category_description">Kategori Açıklama</label>
                        <textarea name="category_description" id="category_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Üst Kategori (Opsiyonel)</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Seçiniz...</option>

                            @foreach ($category as $item)
                                    <option value="{{ $item->product_category_id }}">{{ $item->category_name }}</option>
                            @endforeach
                         </select>
                    </div>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary">Kategori Ekle</button>
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
               <th>Kategori Adı</th>
               <th>Açıklama</th>
               <th>İşlemler</th>

             </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($category as $item)
                <tr>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->category_description }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-simple{{ $item->product_category_id }}">Düzenle</a>
                        <a href="{{ route('panel.delete_product_category',['id'=>$item->product_category_id]) }}" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>

                <div class="modal modal-blur fade" id="modal-simple{{ $item->product_category_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Ürün Kategorisi Düzenle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     <div class="modal-body">
                      <form method="POST" action="{{ route('panel.update_product_category_post') }}">
                          @csrf
                          @method("put")

                          <input type="hidden" name="id" value="{{ $item->product_category_id }}">
                          <div class="form-group">
                              <label for="category_name">Kategori Adı</label>
                              <input type="text" value="{{ $item->category_name }}" name="category_name" id="category_name" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label  >Kategori Açıklama</label>
                              <textarea name="category_description"   class="form-control">{{ $item->category_description }}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="parent_id">Üst Kategori (Opsiyonel)</label>
                              <select name="parent_id" id="parent_id" class="form-control">
                                  <option value="">Seçiniz...</option>

                                  @foreach ($category as $v)
                                          <option value="{{ $item->product_category_id }}" {{ $item->parent_id == $v->product_category_id ? 'selected' :''}}>{{ $v->category_name }}</option>
                                  @endforeach
                               </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kategori Düzenle</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>

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
