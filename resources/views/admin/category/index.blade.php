@extends('layouts.admin')
@section('title', 'Kategori Sayfası')
@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
        <a class="btn btn-block btn-default" href="/admin/category/create">Ekle</a>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th>
                          Ana Kategori
                      </th>
                      <th>
                          Başlık
                      </th>
                      <th>
                          Fotoğraf
                      </th>
                      <th>
                          Durum
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($categories as $rs)
                  <tr>
                      <td>
                          {{$rs->id}}
                      </td>
                      <td>
                          {{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}
                      </td>
                      <td>
                          {{$rs->title}}
                      </td>
                      <td>
                          @if($rs->image)
                            <img src="{{Storage::url($rs->image)}}" style=" height:100px ;width: 150px">
                          @endif
                      </td>
                      <td>
                          {{$rs->status}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="/admin/category/show/{{$rs->id}}">
                              <i class="fas fa-folder">
                              </i>
                              Görüntüle
                          </a>
                          <a class="btn btn-info btn-sm" href="/admin/category/edit/{{$rs->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Güncelle
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('admin_category_delete',['id'=>$rs->id])}}",onclick="return confirm('Emin misin ?')">
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