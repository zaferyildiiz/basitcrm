@extends("panel.partials.master")

@section("pagetitle","Kontaklar")
@section("title","Kontak Listesi")
@section("pagesubtitle","Tüm Kontaklar")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Kontak Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kontak Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('panel.add_contact_post') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customer_id">Müşteri</label>
                                <select name="customer_id" class="form-control" required>
                                    <option value="">Seçiniz...</option>
                                    @foreach ($customer as $item)
                                        <option value="{{ $item->customer_id }}">{{ $item->customer_name }}</option>
                                    @endforeach
                                </select>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_name">İsim</label>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_surname">Soyisim</label>
                                <input type="text" class="form-control" id="contact_surname" name="contact_surname" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_email">E-posta</label>
                                <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_phone">Telefon</label>
                                <input type="tel" class="form-control" id="contact_phone" name="contact_phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="position">Departman</label>
                                <input type="text" class="form-control" id="position" name="position">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">Şehir</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district">İlçe</label>
                                <input type="text" class="form-control" id="district" name="district">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="customer_note">Müşteri Notu</label>
                        <textarea class="form-control" id="customer_note" name="customer_note" rows="3"></textarea>
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
              <th><button class="table-sort" data-sort="sort-name">Ad</button></th>
              <th><button class="table-sort" data-sort="sort-city">Soyad</button></th>
              <th><button class="table-sort" data-sort="sort-type">Müşteri Adı</button></th>
              <th><button class="table-sort" data-sort="sort-type">Email</button></th>
              <th><button class="table-sort" data-sort="sort-score">Telefon</button></th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($contact as $value)
                <tr>
                    <td>{{ $value->contact_name }}</td>
                    <td>{{ $value->contact_surname }}</td>
                    <td>{{ $value->customer_id }}</td>
                    <td>{{ $value->contact_email }}</td>
                    <td>{{ $value->contact_phone }}</td>
                    <td>
                       <!-- Düzenleme düğmesi -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $value->contact_id }}">
                                Düzenle
                            </button>

                            <a href="{{ route('panel.delete_contact',['id'=>$value->contact_id]) }}" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>

            <!-- Düzenleme Modalı -->
            <div class="modal fade" id="editModal{{ $value->contact_id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Kontak Düzenle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Düzenleme Formu -->
                            <form method="POST" action="{{ route('panel.update_contact_post') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value={{ $value->contact_id }}>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="edit_contact_name" class="form-label">İsim</label>
                                            <input type="text" class="form-control" id="edit_contact_name" name="edit_contact_name" value="{{ $value->contact_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="edit_contact_surname" class="form-label">Soyisim</label>
                                            <input type="text" class="form-control" id="edit_contact_surname" name="edit_contact_surname" value="{{ $value->contact_surname }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_contact_email" class="form-label">E-posta</label>
                                            <input type="email" class="form-control" id="edit_contact_email" name="edit_contact_email" value="{{ $value->contact_email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_contact_phone" class="form-label">Telefon</label>
                                            <input type="tel" class="form-control" id="edit_contact_phone" name="edit_contact_phone" value="{{ $value->contact_phone }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_customer_id" class="form-label">Müşteri ID</label>
                                            <input type="number" class="form-control" id="edit_customer_id" name="edit_customer_id" value="{{ $value->customer_id }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_position" class="form-label">Departman</label>
                                            <input type="text" class="form-control" id="edit_position" name="edit_position" value="{{ $value->position }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_city" class="form-label">Şehir</label>
                                            <input type="text" class="form-control" id="edit_city" name="edit_city" value="{{ $value->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="edit_district" class="form-label">İlçe</label>
                                            <input type="text" class="form-control" id="edit_district" name="edit_district" value="{{ $value->district }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_customer_note" class="form-label">Müşteri Notu</label>
                                    <textarea class="form-control" id="edit_customer_note" name="edit_customer_note" rows="3">{{ $value->customer_note }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
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
