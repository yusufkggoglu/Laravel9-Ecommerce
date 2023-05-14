@extends('layouts.admin')

@section('title', 'Slayt Ekle')

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
          <li class="breadcrumb-item"><a href="/admin/slider">Slayt</a></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<div class="card-body">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Slayt Ekle</h3>
    </div>
    <form class="form" action="{{route('admin_slider_store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Başlık</label>
          <input type="text" class="form-control" name="title" placeholder="...">
        </div>
        <div class="form-group">
          <label>TAG</label>
          <input type="text" class="form-control" name="tag" placeholder="...">
        </div>
        <div class="form-group">
          <label>Açıklama</label>
          <textarea class="textarea" id="summernote" name="description"></textarea>
        </div>
        <div class="form-group">
          <label>Fotoğraf</label>
          <input type="file" name="image" class="custom-upload-default">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
    </form>
  </div>
  <!-- /.content -->
</div>
</div>
@endsection
@section('footer')
<script>
  $(function() {
    //Summernote
    $('.textarea').summernote()
  })
</script>
@endsection