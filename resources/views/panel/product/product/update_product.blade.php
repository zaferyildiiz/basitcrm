<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">

        <div class="modal modal-blur fade" id="modal-simple{{ $item->product_id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ürün Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">


                <form method="POST" action="{{ route('panel.update_product_post') }}" enctype="multipart/form-data">
                    @csrf
                        @method("PUT")
                    <div class="row">

                        <input type="hidden" name="id" value="{{ $data->product_id }}">
                        <div class="custom-file-container" data-upload-id="my-unique-id"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Ürün Adı</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $data->product_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_code">Ürün Kodu</label>
                                <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $data->product_code }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_category_id">Ürün Kategorisi</label>
                                <select class="form-control" id="product_category_id" name="product_category_id"  required>
                                    <option value="">Kategori Seçiniz</option>
                                    @foreach ($productCategory as $v)
                                        <option value="{{ $v->product_category_id }}" {{ $v->product_category_id== $data->product_category_id ? 'selected':'' }}>{{ $v->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_brand_id">Ürün Markası



                                </label>
                                <select class="form-control" id="product_brand_id" name="product_brand_id"  required>
                                    <option value="">Marka Seçiniz</option>
                                    @foreach ($brand as $v)
                                        <option value="{{ $v->product_brand_id }}" {{ $data->product_brand_id == $v->product_brand_id ? 'selected':'' }} >{{ $v->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="buying_price">Alış Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="buying_price" name="buying_price" value="{{ $data->buying_price }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_old_price">Ürün Eski Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="product_old_price" name="product_old_price" value="{{ $data->product_old_price }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_price">Ürün Fiyatı</label>
                                <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" value="{{ $data->product_price }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $data->description }}
                        </textarea>
                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_quantity">Stok Miktarı</label>
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ $data->stock_quantity }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_type">Stok Türü</label>
                                <select class="form-control" name="stock_type" required>
                                    <option value="Km" {{ $data->stock_type == 'Km' ? 'selected' : '' }}>Km</option>
                                    <option value="Dakika" {{ $data->stock_type == 'Dakika' ? 'selected' : '' }}>Dakika</option>
                                    <option value="Saniye" {{ $data->stock_type == 'Saniye' ? 'selected' : '' }}>Saniye</option>
                                    <option value="Kişi" {{ $data->stock_type == 'Kişi' ? 'selected' : '' }}>Kişi</option>
                                    <option value="Kişi/Gün" {{ $data->stock_type == 'Kişi/Gün' ? 'selected' : '' }}>Kişi/Gün</option>
                                    <option value="Kişi/Saat" {{ $data->stock_type == 'Kişi/Saat' ? 'selected' : '' }}>Kişi/Saat</option>
                                    <option value="Kişi/Dakika" {{ $data->stock_type == 'Kişi/Dakika' ? 'selected' : '' }}>Kişi/Dakika</option>
                                    <option value="Çift" {{ $data->stock_type == 'Çift' ? 'selected' : '' }}>Çift</option>
                                    <option value="Adet" {{ $data->stock_type == 'Adet' ? 'selected' : '' }}>Adet</option>
                                    <option value="Ay" {{ $data->stock_type == 'Ay' ? 'selected' : '' }}>Ay</option>
                                    <option value="Düzine" {{ $data->stock_type == 'Düzine' ? 'selected' : '' }}>Düzine</option>
                                    <option value="Gram" {{ $data->stock_type == 'Gram' ? 'selected' : '' }}>Gram</option>
                                    <option value="Grose" {{ $data->stock_type == 'Grose' ? 'selected' : '' }}>Grose</option>
                                    <option value="Gün" {{ $data->stock_type == 'Gün' ? 'selected' : '' }}>Gün</option>
                                    <option value="İnç" {{ $data->stock_type == 'İnç' ? 'selected' : '' }}>İnç</option>
                                    <option value="Kilogram" {{ $data->stock_type == 'Kilogram' ? 'selected' : '' }}>Kilogram</option>
                                    <option value="Koli" {{ $data->stock_type == 'Koli' ? 'selected' : '' }}>Koli</option>
                                    <option value="Litre" {{ $data->stock_type == 'Litre' ? 'selected' : '' }}>Litre</option>
                                    <option value="Metre" {{ $data->stock_type == 'Metre' ? 'selected' : '' }}>Metre</option>
                                    <option value="m²" {{ $data->stock_type == 'm²' ? 'selected' : '' }}>m²</option>
                                    <option value="Metre Küp" {{ $data->stock_type == 'Metre Küp' ? 'selected' : '' }}>Metre Küp</option>
                                    <option value="Palet" {{ $data->stock_type == 'Palet' ? 'selected' : '' }}>Palet</option>
                                    <option value="Santimetre" {{ $data->stock_type == 'Santimetre' ? 'selected' : '' }}>Santimetre</option>
                                    <option value="Santi Metre Kare" {{ $data->stock_type == 'Santi Metre Kare' ? 'selected' : '' }}>Santi Metre Kare</option>
                                    <option value="Santi Metre Küp" {{ $data->stock_type == 'Santi Metre Küp' ? 'selected' : '' }}>Santi Metre Küp</option>
                                    <option value="Ton" {{ $data->stock_type == 'Ton' ? 'selected' : '' }}>Ton</option>
                                    <option value="Yıl" {{ $data->stock_type == 'Yıl' ? 'selected' : '' }}>Yıl</option>
                                    <option value="Kutu" {{ $data->stock_type == 'Kutu' ? 'selected' : '' }}>Kutu</option>
                                    <option value="Saat/Ay" {{ $data->stock_type == 'Saat/Ay' ? 'selected' : '' }}>Saat/Ay</option>
                                    <!-- Diğer seçenekleri de benzer şekilde ekleyebilirsiniz -->
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stock_alert_level">Stok Uyarı Seviyesi</label>
                                <input type="number" class="form-control" id="stock_alert_level" name="stock_alert_level" value="{{ $data->stock_alert_level }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Durum</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1"  {{ $data->status == 1 ? 'selected' :'' }}>Aktif</option>
                            <option value="0" {{ $data->status == 0 ? 'selected' :'' }}>Pasif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_installment">Taksit İmkanı</label>
                        <select class="form-control" id="is_installment" name="is_installment" required>
                            <option value="1" {{ $data->is_installment == 1 ? 'selected' :'' }}>Var</option>
                            <option value="0" {{ $data->is_installment == 0 ? 'selected' :'' }}>Yok</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="max_installment_number">Maksimum Taksit Sayısı</label>
                        <input type="number" class="form-control"  id="max_installment_number" name="max_installment_number" required value="{{ $data->max_installment_number }}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Gönder</button>
                  </form>
              </div>
            </div>
          </div>
    </div>
    </div>
