@extends('layouts.admin')

@section('title', 'Mesaj Detay')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesaj Detay</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Anasayfa</a></li>
              <li class="breadcrumb-item"><a href="/admin/message">Mesaj</a></li>
              <li class="breadcrumb-item active">Detay</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <td><a href="/admin/message/delete/{{$data->id}}" class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
        </div>
        <div class="table-responsive pt-3">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30px">ID</th>
                    <td>{{$data->id}}</td>
                </tr>
                <tr>
                    <th style="width:30px">Ad Soyad</th>
                    <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <th style="width:30px">Mesaj</th>
                    <td>{{$data->message}}</td>
                </tr>
                <tr>
                    <th style="width:30px">IP</th>
                    <td>{{$data->ip}}</td>
                </tr>
                <tr>
                    <th style="width:30px">Email</th>
                    <td>{{$data->email}}</td>
                </tr>
                <tr>
                    <th style="width:30px">Telefon</th>
                    <td>{{$data->phone}}</td>
                </tr>
                <tr>
                    <th style="width:30px">Durum</th>
                    <td>{{$data->status}}</td>
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