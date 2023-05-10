@extends('layouts.admin')
@section('title', 'Mesaj Sayfası')
@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesaj Sayfası</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mesaj</li>
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
                      <th>
                          #
                      </th>
                      <th>
                          Ad Soyad
                      </th>
                      <th>
                          IP
                      </th>
                      <th>
                          Status
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $rs)
                  <tr>
                      <td>
                          {{$rs->id}}
                      </td>
                      <td>
                          {{$rs->name}}
                      </td>
                      <td>
                          {{$rs->ip}}
                      </td>
                      <td>
                          {{$rs->status}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="/admin/message/show/{{$rs->id}}">
                              <i class="fas fa-folder">
                              </i>
                              Görüntüle
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('admin_message_delete',['id'=>$rs->id])}}",onclick="return confirm('Emin misin ?')">
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