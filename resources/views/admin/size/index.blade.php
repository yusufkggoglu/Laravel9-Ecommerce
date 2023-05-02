@extends('layouts.admin')
@section('title', 'Beden Sayfası')
@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Beden</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item active">Beden</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
        <a class="btn btn-block btn-default" href="/admin/size/create">Ekle</a>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th>
                          Başlık
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($sizes as $rs)
                  <tr>
                      <td>
                          {{$rs->id}}
                      </td>
                      <td>
                          {{$rs->title}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="/admin/size/show/{{$rs->id}}">
                              <i class="fas fa-folder">
                              </i>
                              Görüntüle
                          </a>
                          <a class="btn btn-info btn-sm" href="/admin/size/edit/{{$rs->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Güncelle
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('admin_size_delete',['id'=>$rs->id])}}",onclick="return confirm('Emin misin ?')">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @endsection