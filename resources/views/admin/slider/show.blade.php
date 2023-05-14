@extends('layouts.admin')

@section('title', 'Koleksiyon Detay : '.$data->title)

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{$data->title}} Detay</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Anasayfa</a></li>
          <li class="breadcrumb-item"><a href="/admin/slider">Slayt</a></li>
          <li class="breadcrumb-item active">Detay</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div>
    <td><a href="/admin/slider/edit/{{$data->id}}" class="btn btn-primary btn-rounded btn-fw">Güncelle</a></td>
    <td><a href="/admin/slider/delete/{{$data->id}}" class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
  </div>
  <div class="table-responsive pt-3">
    <table class="table table-bordered">
      <tr>
        <th style="width: 30px">ID</th>
        <td>{{$data->id}}</td>
      </tr>
      <tr>
        <th style="width:30px">Başlık</th>
        <td>{{$data->title}}</td>
      </tr>
      <tr>
        <th style="width:30px">TAG</th>
        <td>{{$data->tag}}</td>
      </tr>
      <tr>
        <th style="width:30px">Açıklama</th>
        <td>{{$data->description}}</td>
      </tr>
      <tr>
        <th style="width: 30px">Fotoğraf</th>
        <td>@if($data->image)
          <img src="{{Storage::url($data->image)}}" style=" border-radius:2px ; height:200px ;width: 150px">
          @endif
        </td>
      </tr>
      <tr>
        <th style="width: 30px">Oluşturulma Tarihi</th>
        <td>{{$data->created_at}}</td>
      </tr>
      <tr>
        <th style="width: 30px">Güncellenme Tarihi</th>
        <td>{{$data->updated_at}}</td>
      </tr>
    </table>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection