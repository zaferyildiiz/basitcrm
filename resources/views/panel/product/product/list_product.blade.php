@extends("panel.partials.master")

@section("pagetitle","Ürünler")
@section("title","Ürün   Listesi")
@section("pagesubtitle","Tüm Ürünler")
@section('pageaction')
    @include('panel.product.product.add_product')
@endsection
@section("content")
<div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
               <th>Ürün Kodu</th>
               <th>Ürün Adı</th>
               <th>Kategori Adı</th>
               <th>Marka Adı</th>
               <th>Alış Fiyatı</th>
               <th>Eski Fiyat</th>
               <th>Yeni Fiyat</th>
               <th>İşlemler</th>

             </tr>
          </thead>
          <tbody class="table-tbody">
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_category_id }}</td>
                        <td>{{ $item->product_brand_id }}</td>
                        <td>{{ $item->buying_price }}</td>
                        <td>{{ $item->product_old_price }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-simple{{ $item->product_id }}">Düzenle</a>
                            <a href="{{ route('panel.update_product_image',['id'=>$item->product_id]) }}" class="btn btn-sm btn-warning">Resimleri Düzenle</a>
                            <a href="" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                    @include("panel.product.product.update_product",["data"=>$item,'brand'=>$item->brands])
                @endforeach
          </tbody>
        </table>
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
