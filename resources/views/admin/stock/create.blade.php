@extends('layouts.admin')

@section('title', 'Stok Ekle')

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
              <li class="breadcrumb-item"><a href="/admin/product/{{$product->id}}">{{$product->title}}</a></li>
              <li class="breadcrumb-item"><a href="/admin/stock/{{$product->id}}">Stok</a></li>
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
                <h3 class="card-title">Stok Ekle</h3>
              </div>
              <form class="form" action="{{route('admin_stock_store',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="product_id" value="{{$product->id}}">
                  <div class="form-group">
                      <label>Stok Çeşit</label>
                      <input type="text" class="form-control" name="kind" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stock" placeholder="...">
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