@extends('layouts.admin')

@section('title', 'Ayarlar')

@section('content')

<!-- Content Header (Page header) -->
    <di v class="card card-primary card-outline">
        <form class="form" action="{{route('admin_setting_update')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                    <h4>Ayarlar</h4>
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="false">Genel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab" aria-controls="social" aria-selected="false">Sosyal Medya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">İletişim</a>
                    </li>
                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <input type="hidden" id="id" name="id"  value="{{$data->id}}">
                            <div class="form-group">
                                <label for="exampleInputName1">Başlık</label>
                                <input type="text" class="form-control" name="title" value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Anahtar Kelimeler</label>
                                <input type="text" class="form-control"  name="keywords" value="{{$data->keywords}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Açıklama</label>
                                <input type="text" class="form-control" name="description" value="{{$data->description}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Şirket</label>
                                <input type="text" class="form-control" name="company" value="{{$data->company}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Adres</label>
                                <input type="text" class="form-control" name="address" value="{{$data->address}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Google Maps Script</label>
                                <input type="text" class="form-control" name="googlemaps" value="{{$data->googlemaps}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Telefon</label>
                                <input type="tel" class="form-control" name="phone" value="{{$data->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email adresi</label>
                                <input type="email" class="form-control" name="email" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Durum</label>
                                <select class="form-control" name="status">
                                    <option selected>{{$data->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>İcon</label>
                                <input type="file" name="icon" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text"  class="form-control file-upload-info" disabled placeholder="Choose Image File">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="form-group">
                                <label for="exampleTextarea1">İletişim</label>
                                <textarea name="contact" class="form-control textarea" rows="4">{{$data->contact}} </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Güncelle</button>
                </div>
                
        </form>
     </div>
@endsection
@section('footer')
  <script>
    $(function () {
        //Summernote
        $('.textarea').summernote()
    })
  </script>
@endsection