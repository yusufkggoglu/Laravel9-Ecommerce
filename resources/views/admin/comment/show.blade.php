@extends('layouts.adminwindow')
@section('title', 'Göster : '.$data->name)

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Yorum Detay Sayfası</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="/admin/comment">Yorumlar</a></li>
                    <li class="breadcrumb-item active">Detay</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div>
        <td><a href="/admin/comment/destroy/{{$data->id}}" class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
    </div>
    <div class="table-responsive pt-3">
        <table class="table table-bordered">
            <tr>
                <th style="width: 30px">ID</th>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <th style="width: 30px">İsim</th>
                <td>{{$data->user->name}}</td>
            </tr>
            <tr>
                <th style="width: 30px">Blog</th>
                <td>{{$data->product->title}}</td>
            </tr>
            <tr>
                <th style="width: 30px">Yorum</th>
                <td>{{$data->comment}}</td>
            </tr>
            <tr>
                <th style="width: 30px">Oluşturulma Tarihi</th>
                <td>{{$data->created_at}}</td>
            </tr>
            <tr>
                <td>
                    <form action="{{route('admin_comment_update', ['id'=>$data->id])}} " method="post">
                        @csrf
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Yorumu Onayla</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection