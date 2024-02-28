@extends("panel.partials.master")

@section("pagetitle","Müşteriler")
@section("title","Müşteri Listesi")
@section("pagesubtitle","Tüm Müşteriler")
@section('pageaction')
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Müşteri Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Müşteri Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form action="{{ route('panel.add_customer_post') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name">Müşteri Adı</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_type">Müşteri Türü</label>
                                <select class="form-control" id="customer_type" name="customer_type" required>
                                    <option value="">Müşteri Türünü Seçin</option>
                                    <option value="Bireysel">Bireysel</option>
                                    <option value="Kurumsal">Kurumsal</option>
                                    <option value="Şahıs">Şahıs</option>
                                    <!-- Diğer müşteri türleri buraya eklenebilir -->
                                    <option value="Anonim Şirket">Anonim Şirket</option>
                                    <option value="Limited Şirket">Limited Şirket</option>
                                    <option value="Kolektif Şirket">Kolektif Şirket</option>
                                    <!-- Diğer şirket türleri buraya eklenebilir -->
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">Şehir</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district">İlçe</label>
                                <input type="text" class="form-control" id="district" name="district" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+90</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-posta</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tax_no">Vergi No</label>
                                <input type="text" class="form-control" id="tax_no" name="tax_no">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tax_office">Vergi Dairesi</label>
                                <input type="text" class="form-control" id="tax_office" name="tax_office">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_person_name">Kontak Kişi Adı</label>
                                <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_person_email">İlgili Kişi E-posta</label>
                                <input type="email" class="form-control" id="contact_person_email" name="contact_person_email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_person_phone">Kontak Kişi Telefon</label>
                                <input type="tel" class="form-control" id="contact_person_phone" name="contact_person_phone" required>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="activity_area">Faaliyet Alanı</label>
                        <input type="text" class="form-control" id="activity_area" name="activity_area" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_note">Notlar</label>
                        <textarea class="form-control" id="customer_note" name="customer_note"></textarea>
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
               <th>Müşteri Adı</th>
               <th>Müşteri Türü</th>
               <th>İl</th>
               <th>İlçe</th>
              <th>Telefon</th>
              <th>Eposta</th>
              <th>Kontak Kişi Adı</th>
              <th>Kontak Kişi Eposta</th>
              <th>Kontak Kişi Telefon</th>
              <th>Faaliyet Alanı</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($customer as $item)
                <tr>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_type }}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->district }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->contact_person_name }}</td>
                    <td>{{ $item->contact_person_email }}</td>
                    <td>{{ $item->contact_person_phone }}</td>
                    <td>{{ $item->activity_area }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->customer_id }}">Düzenle</a>
                        <a href="" class="btn btn-sm btn-danger">Sil</a>


                        <div class="modal fade" id="editModal{{ $item->customer_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->customer_id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Müşteri Düzenle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('panel.update_customer_post') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $item->customer_id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_name">Müşteri Adı</label>
                                                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $item->customer_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customer_type">Müşteri Türü</label>
                                                        <select class="form-control" id="customer_type" name="customer_type" required>
                                                            <option value="">Müşteri Türünü Seçin</option>
                                                            <option value="Bireysel" {{ $item->customer_type === 'Bireysel' ? 'selected' : '' }}>Bireysel</option>
                                                            <option value="Kurumsal" {{ $item->customer_type === 'Kurumsal' ? 'selected' : '' }}>Kurumsal</option>
                                                            <option value="Şahıs" {{ $item->customer_type === 'Şahıs' ? 'selected' : '' }}>Şahıs</option>
                                                            <option value="Anonim Şirket" {{ $item->customer_type === 'Anonim Şirket' ? 'selected' : '' }}>Anonim Şirket</option>
                                                            <option value="Limited Şirket" {{ $item->customer_type === 'Limited Şirket' ? 'selected' : '' }}>Limited Şirket</option>
                                                            <option value="Kolektif Şirket" {{ $item->customer_type === 'Kolektif Şirket' ? 'selected' : '' }}>Kolektif Şirket</option>
                                                            <!-- Diğer şirket türleri buraya eklenebilir -->
                                                        </select>                                                 </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">Şehir</label>
                                                        <input type="text" class="form-control" id="city" name="city" value="{{ $item->city }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="district">İlçe</label>
                                                        <input type="text" class="form-control" id="district" name="district" value="{{ $item->district }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="address">Adres</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ $item->address }}" required>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Telefon</label>
                                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $item->phone }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">E-posta</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tax_no">Vergi No</label>
                                                        <input type="text" class="form-control" id="tax_no" name="tax_no" value="{{ $item->tax_no }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tax_office">Vergi Dairesi</label>
                                                        <input type="text" class="form-control" id="tax_office" name="tax_office" value="{{ $item->tax_office }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_person_name">İlgili Kişi Adı</label>
                                                        <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="{{ $item->contact_person_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_person_email">İlgili Kişi E-posta</label>
                                                        <input type="email" class="form-control" id="contact_person_email" name="contact_person_email" value="{{ $item->contact_person_email }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_person_phone">İlgili Kişi Telefon</label>
                                                        <input type="tel" class="form-control" id="contact_person_phone" name="contact_person_phone" value="{{ $item->contact_person_phone }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="activity_area">Faaliyet Alanı</label>
                                                        <input type="text" class="form-control" id="activity_area" name="activity_area" value="{{ $item->activity_area }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="customer_note">Notlar</label>
                                                <textarea class="form-control" id="customer_note" name="customer_note">{{ $item->customer_note }}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
