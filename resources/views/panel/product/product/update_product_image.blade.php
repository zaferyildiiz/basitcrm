@extends("panel.partials.master")

@section("pagetitle","Ürün Resimleri")
@section("title","Ürün  Resimleri ")
@section("pagesubtitle","Ürün Resimleri")
@section('pageaction')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-simple">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Ürüne Resim Ekle
        </a>

        <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ürün Ekle </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('panel.add_update_product_image') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Resim Seçiniz. (Birden fazla seçebilirsiniz.)</label>

                            <input type="hidden" name="product_id" value="{{ Request::segment(3) }}">
                            <input type="file" name="aksfileupload[]" class="form-control" multiple required>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Resim Ekle</button>
                </div>
            </form>
            </div>
          </div>

    </div>
</div>
</div>
@endsection
@section("content")
<div class="card">
    <div class="card-body">
        <div class="row">
            @foreach ($image_url as $key=>$value)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ URL::to('/').$value }}" alt="" height="250px">
                    <div class="card-body text-center">

                        <form action="{{ route('panel.delete_product_image') }}"  method="post">
                            @csrf
                            <input type="hidden" name="image_path" value="{{URL::to('/').$key }}">
                            <button type="submit" class="btn btn-sm btn-danger">Resmi Sil</button>
                        </form>
                     </div>
                  </div>
            </div>
            @endforeach
        </div>

    </div>
  </div>
@endsection



@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('aksfile/aksFileUpload.js') }} "></script>
<script>
$(function () {
  $("aks-file-upload").aksFileUpload({
    fileUpload: "#uploadfile",
    dragDrop: true,
    maxSize: "90 GB",
    multiple: true,
    maxFile: 50
  });
});
</script>


<script>
    $(document).ready(function(){
        $('#product_category_id').on('change',function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('panel.get_brand') }}",
                data : {product_category_id:$(this).val()},
                type : 'POST',
                dataType:"json",
                success : function(result){
                    var selectBox = $('#product_brand_id');
                    selectBox.html('');

                    selectBox.append('<option value="">Seçiniz...</option>')
                    result.forEach(function(brand) {
                        selectBox.append('<option value="' + brand.product_brand_id + '">' + brand.brand_name + '</option>');
                    });
                    console.log(result);

                }
            });
        });
    })
</script>


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
