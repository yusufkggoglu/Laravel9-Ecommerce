@extends('layouts.admin')
@section('title', 'Stok : '.$product->title)
@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$product->title}} Stok Durumu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="/admin/product">Ürün</a></li>
              <li class="breadcrumb-item"><a href="/admin/product/show/{{$product->id}}">{{$product->title}}</a></li>
              <li class="breadcrumb-item active">Stok</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-block btn-default" href="/admin/stock/create/{{$product->id}}">Ekle</a>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
              <thead>
                  <tr>
                      <th>
                          #
                      </th>
                      <th>
                          Ürün
                      </th>
                      <th>
                          Çeşit
                      </th>
                      <th>
                          Stok
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($stock as $rs)
                  <tr>
                      <td>
                          {{$rs->id}}
                      </td>
                      <td>
                          {{$product->title}}
                      </td> 
                      <td>
                        {{$rs->kind}}
                      </td>
                      <td>
                          {{$rs->stock}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="/admin/stock/edit/{{$product->id}}/{{$rs->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Güncelle
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('admin_stock_delete',['pid'=>$product->id,'id'=>$rs->id])}}",onclick=return confirm('Emin misin ?')>
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