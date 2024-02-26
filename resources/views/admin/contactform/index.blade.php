@extends("admin.partials.master")

@section("pagetitle","Kontak Formu")
@section("title","Kontak Formu Listesi")
@section("pagesubtitle","Tüm Mesajlar")
@section('pageaction')
    <!-- Page title actions -->

@endsection
@section("content")
<div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><button class="table-sort" data-sort="sort-name">Konu</button></th>
              <th><button class="table-sort" data-sort="sort-city">İsim Soyisim</button></th>
              <th><button class="table-sort" data-sort="sort-type">Eposta</button></th>
              <th><button class="table-sort" data-sort="sort-type">Telefon</button></th>
              <th>İçerik</th>
              <th>Tarih</th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            @foreach ($contact_form as $item)
                <tr>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at }}</td>
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
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
      let options = {
        selector: '.tinymce-mytextarea',
        height: 300,
        menubar: false,
        statusbar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
          'bold italic backcolor | alignleft aligncenter ' +
          'alignright alignjustify | bullist numlist outdent indent | ' +
          'removeformat',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
      }
      if (localStorage.getItem("tablerTheme") === 'dark') {
        options.skin = 'oxide-dark';
        options.content_css = 'dark';
      }
      tinyMCE.init(options);
    })
    // @formatter:on
</script>

@endsection
