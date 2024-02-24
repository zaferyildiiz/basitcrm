@extends("admin.partials.master")

@section("pagetitle","Kullanıcılar")
@section("title","Kulllanıcı Listesi")
@section("pagesubtitle","Tüm Kullanıcılar")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Firma Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Müşteri Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('admin.add_company_post') }}">
                    @csrf

                    <div class="form-group">
                        <label for="company_name">Firma Adı:</label>
                        <input type="text" class="form-control" id="company_name" name="company_name">
                    </div>

                    <div class="form-group">
                        <label for="company_type">Firma Tipi:</label>
                        <select name="company_type" class="form-control">
                            <option value="Şahıs Şirketi">Şahıs Şirketi</option>
                            <option value="Limited Şirketi">Limited Şirketi</option>
                            <option value="Anonim Şirket">Anonim Şirket</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tax_no">Vergi No:</label>
                        <input type="text" class="form-control" id="tax_no" name="tax_no">
                    </div>

                    <div class="form-group">
                        <label for="city">Şehir:</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="form-group">
                        <label for="district">İlçe:</label>
                        <input type="text" class="form-control" id="district" name="district">
                    </div>

                    <div class="form-group">
                        <label for="address">Adres:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="contact_person_name">Yetkili Kişi Adı:</label>
                        <input type="text" class="form-control" id="contact_person_name" name="contact_person_name">
                    </div>

                    <div class="form-group">
                        <label for="contact_person_email">Yetkili Kişi Email:</label>
                        <input type="email" class="form-control" id="contact_person_email" name="contact_person_email">
                    </div>

                    <div class="form-group">
                        <label for="contact_person_phone">Yetkili Kişi Telefon:</label>
                        <input type="text" class="form-control" id="contact_person_phone" name="contact_person_phone">
                    </div>

                    <div class="form-group">
                        <label for="activity_area">Faaliyet Alanı:</label>
                        <input type="text" class="form-control" id="activity_area" name="activity_area">
                    </div>

                    <div class="form-group">
                        <label for="customer_note">Müşteri Notu:</label>
                        <textarea class="form-control" id="customer_note" name="customer_note"></textarea>
                    </div>
               </div>
                <div class="modal-footer">
                  <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kullanıcı Ekle</button>
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
              <th><button class="table-sort" data-sort="sort-name">Firma Adı</button></th>
              <th><button class="table-sort" data-sort="sort-city">Firma Türü</button></th>
              <th><button class="table-sort" data-sort="sort-type">İl</button></th>
              <th><button class="table-sort" data-sort="sort-type">İlçe</button></th>
              <th><button class="table-sort" data-sort="sort-score">Kontak Kişi Adı</button></th>
              <th><button class="table-sort" data-sort="sort-score">Kontak Kişi Telefon</button></th>
              <th><button class="table-sort" data-sort="sort-score">Faaliyet Alanı</button></th>
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
