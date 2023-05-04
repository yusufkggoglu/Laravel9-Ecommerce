@extends('layouts.admin')
@section('title', 'Ürün Galeri')
@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$product->title}} Fotoğrafları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="/admin/product">Ürün</a></li>
              <li class="breadcrumb-item active">{{$product->title}} Fotoğrafları</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <form class="form" action="{{route('admin_image_store',['pid'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" class="form-control" name="title" placeholder="...">
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
                      <th>
                          Fotoğraf
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($images as $rs)
                  <tr>
                      <td>
                          {{$rs->id}}
                      </td>
                      <td>
                          {{$rs->title}}
                      </td>
                      <td>
                           <img src="{{Storage::url($rs->image)}}" style=" height:100px ;width: 150px">
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-danger btn-sm" href="{{route('admin_image_delete',['id'=>$rs->id,'pid'=>$rs->product_id])}}",onclick=return confirm('Emin misin ?')>
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