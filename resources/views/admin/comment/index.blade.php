@extends('layouts.admin')

@section('title', 'Yorumlar')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Yorum Listesi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
                    <li class="breadcrumb-item active">Yorumlar</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Ürün</th>
                        <th>Yorum</th>
                        <th>Durumu</th>
                        <th>Sil</th>
                        <th>Göster</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $rs)

                    <tr>
                        <td>{{$rs->id}}</td>
                        <td>{{$rs->user->name}}</td>
                        <td>
                            <a href="{{route('admin_product_show',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a>
                        </td>
                        <td>{{$rs->comment}}</td>
                        <td>{{$rs->status}}</td>
                        <td style="text-align: center">
                            <a class="btn btn-danger btn-rounded btn-fw" style="color: white;" href="{{route('admin_comment_destroy',['id'=>$rs->id])}}" , onclick="return confirm('Delete Are You Sure ?')">Sil</a>
                        </td>
                        <td><a href="/admin/comment/show/{{$rs->id}}" class="btn btn-success btn-rounded btn-fw" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">Göster</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
@endsection