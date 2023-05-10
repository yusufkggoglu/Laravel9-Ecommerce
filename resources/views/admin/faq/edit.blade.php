@extends('layouts.admin')

@section('title', 'SSS Güncelle')

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
          <li class="breadcrumb-item"><a href="/admin/faq">SSS</a></li>
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
      <h3 class="card-title">SSS Güncelle</h3>
    </div>
    <form class="form" action="/admin/faq/update/{{$data->id}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Soru</label>
          <input type="text" class="form-control" name="question" value="{{$data->question}}">
        </div>
        <div class="form-group">
          <label>Cevap</label>
          <textarea class="textarea" id="summernote" name="answer">{!! $data->answer !!}</textarea>
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
  $(function() {
    //Summernote
    $('.textarea').summernote()
  })
</script>
@endsection