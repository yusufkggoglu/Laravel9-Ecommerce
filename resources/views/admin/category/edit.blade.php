@extends('layouts.admin')

@section('title', 'Kategori Güncelle : '.$data->title)

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
              <li class="breadcrumb-item"><a href="/admin/category">Kategori</a></li>
              <li class="breadcrumb-item active">Güncelle</li>
            </ol>
          </div>
        </div>
      </div>
</section>

    <!-- Main content -->
    <div class="card-body">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Güncelle</h3>
              </div>
              <form class="form" action="/admin/category/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label>Ana Kategori</label>
                    <select class="form-control select2 select2-hidden-accessible" name="parent_id" style="width: 100%;" >
                        <option value="0" selected="selected">Ana Kategori</option>
                        @foreach($datalist as $rs)
                        <option value="{{$rs->id}}" @if($rs->id == $data->parent_id) selected="selected" @endif>{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="title" value="{{$data->title}}">
                  </div>
                  <div class="form-group">
                    <label>Anahtar Kelimeler</label>
                    <input type="text" class="form-control" name="keywords" value="{{$data->keywords}}">
                  </div>
                  <div class="form-group">
                    <label>Açıklama</label>
                    <textarea class="textarea" id="summernote" name="description">{!! $data->description !!}</textarea>
                 </div>
                  <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" name="image" class="custom-upload-default">
                  </div>
                  <div class="form-group">
                  <label>Durum</label>
                  <select class="form-control select2 select2-hidden-accessible" name="status">
                    <option selected>{{$data->status}}</option>
                    <option>True</option>
                    <option>False</option>
                  </select>
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Güncelle</button>
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