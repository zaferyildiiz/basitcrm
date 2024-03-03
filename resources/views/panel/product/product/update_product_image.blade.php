@extends("panel.partials.master")

@section("pagetitle","Ürün Resimleri")
@section("title","Ürün  Resimleri ")
@section("pagesubtitle","Ürün Resimleri")
@section("content")
<div class="card">
    <div class="card-body">

        <div class="row">
            @foreach ($image_url as $key=>$value)
            <div class="col-md-4">
                <div class="card"  >
                    <img class="card-img-top" src="{{ $value }}" alt="" height="250px">
                    <div class="card-body text-center">

                        <form action="{{ route('panel.delete_product_image') }}"  method="post">
                            @csrf
                            <input type="hidden" name="image_path" value="{{ $key }}">
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
