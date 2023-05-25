@extends('layouts.home')

@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
<div class="container">
    <div class="row">
        @if(session()->get('success'))
        <div class="col-lg-12">
            <br><br><br>
            <hr>
            <h3>{{session()->get('success')}}</h3>
            <hr><br><br><br>
        </div>
        @endif
        @if(session()->get('errors'))
        <div class="col-lg-12">
            <br><br><br>
            <hr>
            <h3>{{session()->get('errors')}}</h3>
            <hr><br><br><br>
        </div>
        @endif
    </div>
</div>
@endsection