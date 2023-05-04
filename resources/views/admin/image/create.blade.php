@extends('layouts.admin')

@section('title', 'Ürün Ekle')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="/admin/product">Ürün</a></li>
              <li class="breadcrumb-item active">Ekle</li>
            </ol>
          </div>
        </div>
      </div>
</section>

    <!-- Main content -->
    <div class="card-body">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ürün Ekle</h3>
              </div>
              <form class="form" action="{{route('admin_product_store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label>Ana Kategori</label>
                    <select class="form-control select2 select2-hidden-accessible" name="category_id" style="width: 100%;" >
                        @foreach($categories as $rs)
                            <option value="{{$rs->id}}">{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="title" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Fiyat</label>
                    <input type="text" class="form-control" name="price" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Anahtar Kelimeler</label>
                    <input type="text" class="form-control" name="keywords" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Açıklama</label>
                    <textarea class="textarea" id="summernote" name="description"></textarea>
                 </div>
                 <div class="form-group">
                    <label>Detay</label>
                    <textarea class="textarea" id="summernote" name="detail"></textarea>
                 </div>
                 <div class="form-group">
                    <label>Renk</label>
                    <input type="text" class="form-control" name="color" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Renk Hexadecimal Kodu</label>
                    <input type="text" class="form-control" name="color_hex_code" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Ürün Kodu</label>
                    <input type="text" class="form-control" name="product_code" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="custom-upload-default">
                  </div>
                  <div class="form-group">
                  <label>Durum</label>
                  <select class="form-control select2 select2-hidden-accessible" name="status">
                    <option>True</option>
                    <option>False</option>
                  </select>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>
          </div>
    <!-- /.content -->
  </div>
  @endsection
  @section('footer')
  <script>
    $(function () {
        //Summernote
        $('.textarea').summernote()
    })
  </script>
@endsection