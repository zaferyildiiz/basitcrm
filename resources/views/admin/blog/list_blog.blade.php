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
            Kullanıcı Ekle
        </a>
        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kullanıcı Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('admin.add_user_post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ad:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyad:</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Kullanıcı Adı:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Doğum Tarihi:</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Cinsiyet:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="male">Erkek</option>
                            <option value="female">Kadın</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="city">Şehir:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="district">İlçe:</label>
                        <input type="text" class="form-control" id="district" name="district" required>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notlar:</label>
                        <textarea class="form-control" id="notes" name="notes"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Rol ID:</label>
                        <input type="number" class="form-control" id="role_id" name="role_id" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Durum:</label>
                        <input type="number" class="form-control" id="status" name="status" required>
                    </div>
                    <div class="form-group">
                        <label for="company_id">Şirket ID:</label>
                        <input type="number" class="form-control" id="company_id" name="company_id" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>

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
              <th><button class="table-sort" data-sort="sort-name">Ad</button></th>
              <th><button class="table-sort" data-sort="sort-city">Soyad</button></th>
              <th><button class="table-sort" data-sort="sort-type">Kullanıcı Adı</button></th>
              <th><button class="table-sort" data-sort="sort-type">Email</button></th>
              <th><button class="table-sort" data-sort="sort-score">Telefon</button></th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($users as $key=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->surname }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $value->id }}">Düzenle</a>
                        <a href="{{ route('admin.delete_user',['id'=>$value->id]) }}" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>


                <div class="modal fade" id="editUserModal{{ $value->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $value->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel{{ $value->id }}">Kullanıcı Düzenle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('admin.update_user_post') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                    <!-- Ad -->
                                    <div class="form-group">
                                        <label for="edit_name">Ad:</label>
                                        <input type="text" class="form-control" id="edit_name" name="name" value="{{ $value->name }}">
                                    </div>
                                    <!-- Soyad -->
                                    <div class="form-group">
                                        <label for="edit_surname">Soyad:</label>
                                        <input type="text" class="form-control" id="edit_surname" name="surname" value="{{ $value->surname }}">
                                    </div>
                                    <!-- Kullanıcı Adı -->
                                    <div class="form-group">
                                        <label for="edit_username">Kullanıcı Adı:</label>
                                        <input type="text" class="form-control" id="edit_username" name="username" value="{{ $value->username }}">
                                    </div>
                                    <!-- Doğum Tarihi -->
                                    <div class="form-group">
                                        <label for="edit_birth_date">Doğum Tarihi:</label>
                                        <input type="date" class="form-control" id="edit_birth_date" name="birth_date" value="{{ $value->birth_date }}">
                                    </div>
                                    <!-- Cinsiyet -->
                                    <div class="form-group">
                                        <label for="edit_gender">Cinsiyet:</label>
                                        <select name="gender" class="form-control" id="edit_gender">
                                            <option value="male" {{ $value->gender === 'Erkek' ? 'selected' : '' }}>Erkek</option>
                                            <option value="female" {{ $value->gender === 'Kadın' ? 'selected' : '' }}>Kadın</option>
                                        </select>
                                    </div>
                                    <!-- Adres -->
                                    <div class="form-group">
                                        <label for="edit_address">Adres:</label>
                                        <input type="text" class="form-control" id="edit_address" name="address" value="{{ $value->address }}">
                                    </div>
                                    <!-- Şehir -->
                                    <div class="form-group">
                                        <label for="edit_city">Şehir:</label>
                                        <input type="text" class="form-control" id="edit_city" name="city" value="{{ $value->city }}">
                                    </div>
                                    <!-- İlçe -->
                                    <div class="form-group">
                                        <label for="edit_district">İlçe:</label>
                                        <input type="text" class="form-control" id="edit_district" name="district" value="{{ $value->district }}">
                                    </div>
                                    <!-- Notlar -->
                                    <div class="form-group">
                                        <label for="edit_notes">Notlar:</label>
                                        <textarea class="form-control" id="edit_notes" name="notes">{{ $value->notes }}</textarea>
                                    </div>

                                    <!-- Rol ID -->
                                    <div class="form-group">
                                        <label for="edit_role_id">Rol ID:</label>
                                        <input type="number" class="form-control" id="edit_role_id" name="role_id" value="{{ $value->role_id }}">
                                    </div>
                                    <!-- Durum -->
                                    <div class="form-group">
                                        <label for="edit_status">Durum:</label>
                                        <input type="number" class="form-control" id="edit_status" name="status" value="{{ $value->status }}">
                                    </div>
                                    <!-- Şirket ID -->
                                    <div class="form-group">
                                        <label for="edit_company_id">Şirket ID:</label>
                                        <input type="number" class="form-control" id="edit_company_id" name="company_id" value="{{ $value->company_id }}">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="edit_email">Email:</label>
                                        <input type="email" class="form-control" id="edit_email" name="email" value="{{ $value->email }}">
                                    </div>
                                    <!-- Telefon -->
                                    <div class="form-group">
                                        <label for="edit_phone">Telefon:</label>
                                        <input type="tel" class="form-control" id="edit_phone" name="phone" value="{{ $value->phone }}">
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
