@extends('layouts.admin')

@section('title', 'Stok Güncelle : '.$product->title)

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="/admin/product">Ürün</a></li>
              <li class="breadcrumb-item"><a href="/admin/product/show/{{$product->id}}">{{$product->title}}</a></li>
              <li class="breadcrumb-item"><a href="/admin/stock/{{$product->id}}">Stok</a></li>
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
                <h3 class="card-title">Stok Güncelle</h3>
              </div>
              <form class="form" action="{{route('admin_stock_update',['pid'=>$stock->product_id,'id'=>$stock->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <input type="hidden" name="product_id" value="{{$stock->product_id}}">
                  <div class="form-group">
                        <label>Beden</label>
                        <select class="form-control select2 select2-hidden-accessible" name="size_id" style="width: 100%;" >
                            @foreach($size as $rs)
                                <option value="{{$rs->id}}" @if($rs->id == $stock->size_id) selected="selected" @endif>{{$rs->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="text" class="form-control" name="stock" value="{{$stock->stock}}">
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