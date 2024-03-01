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


                <form method="POST" action="{{ route('panel.add_product_post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="custom-file-container" data-upload-id="my-unique-id"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Ürün Adı</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_code">Ürün Kodu</label>
                                <input type="text" class="form-control" id="product_code" name="product_code" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_category_id">Ürün Kategorisi</label>
                                <select class="form-control" id="product_category_id" name="product_category_id"  >
                                    <option value="">Kategori Seçiniz</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_brand_id">Ürün Markası</label>
                                <select class="form-control" id="product_brand_id" name="product_brand_id"  >
                                    <option value="">Marka Seçiniz</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="buying_price">Alış Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="buying_price" name="buying_price" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_old_price">Ürün Eski Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="product_old_price" name="product_old_price" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_price">Ürün Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_quantity">Stok Miktarı</label>
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_type">Stok Türü</label>
                                <select   class="form-control" name="stock_type" required>
                                    <option value="Km">Km</option>
                                    <option value="Dakika">Dakika</option>
                                    <option value="Saniye">Saniye</option>
                                    <option value="Kişi">Kişi</option>
                                    <option value="Kişi/Gün">Kişi/Gün</option>
                                    <option value="Kişi/Saat">Kişi/Saat</option>
                                    <option value="Kişi/Dakika">Kişi/Dakika</option>
                                    <option value="Çift">Çift</option>
                                    <option value="Adet">Adet</option>
                                    <option value="Ay">Ay</option>
                                    <option value="Düzine">Düzine</option>
                                    <option value="Gram">Gram</option>
                                    <option value="Grose">Grose</option>
                                    <option value="Gün">Gün</option>
                                    <option value="İnç">İnç</option>
                                    <option value="Kilogram">Kilogram</option>
                                    <option value="Koli">Koli</option>
                                    <option value="Litre">Litre</option>
                                    <option value="Metre">Metre</option>
                                    <option value="m²">m²</option>
                                    <option value="Metre Küp">Metre Küp</option>
                                    <option value="Palet">Palet</option>
                                    <option value="Santimetre">Santimetre</option>
                                    <option value="Santi Metre Kare">Santi Metre Kare</option>
                                    <option value="Santi Metre Küp">Santi Metre Küp</option>
                                    <option value="Ton">Ton</option>
                                    <option value="Yıl">Yıl</option>
                                    <option value="Kutu">Kutu</option>
                                    <option value="Saat/Ay">Saat/Ay</option>
                                    <!-- Diğer seçenekleri de benzer şekilde ekleyebilirsiniz -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_alert_level">Stok Uyarı Seviyesi</label>
                                <input type="number" class="form-control" id="stock_alert_level" name="stock_alert_level" required>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="status">Durum</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image_json">Ürün Resimleri</label>
                        <input type="text" class="form-control zafer" id="image_json" name="image_json[]" multiple>

                    </div>

                    <div class="form-group">
                        <label for="is_installment">Taksit İmkanı</label>
                        <select class="form-control" id="is_installment" name="is_installment" required>
                            <option value="1">Var</option>
                            <option value="0">Yok</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="max_installment_number">Maksimum Taksit Sayısı</label>
                        <input type="number" class="form-control" id="max_installment_number" name="max_installment_number">
                    </div>
                    <input type="file" class="my-pond" name="filepond"/>
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </form>
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
