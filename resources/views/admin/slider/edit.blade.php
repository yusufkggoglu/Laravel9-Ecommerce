@extends('layouts.admin')

@section('title', 'Slayt Güncelle : '.$data->title)

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
          <li class="breadcrumb-item"><a href="/admin/collection">Slayt</a></li>
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
      <h3 class="card-title">Slayt Güncelle</h3>
    </div>
    <form class="form" action="/admin/slider/update/{{$data->id}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Başlık</label>
          <input type="text" class="form-control" name="title" value="{{$data->title}}">
        </div>
        <div class="form-group">
          <label>TAG</label>
          <input type="text" class="form-control" name="tag" value="{{$data->title}}">
        </div>
        <div class="form-group">
          <label>Açıklama</label>
          <textarea class="textarea" id="summernote" name="description">{!! $data->description !!}</textarea>
        </div>
        <div class="form-group">
          <label>Fotoğraf</label>
          <input type="file" name="image" class="custom-upload-default">
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