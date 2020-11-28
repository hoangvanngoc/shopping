
@extends('layouts.admin')

@section('title')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/setting/index.css') }}">
@endsection

<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'setting','key'=>'Edit'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('setting.update',['id'=>$setting->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Config Key</label>
                  <input type="text" name="config_key" class="form-control @error('config_key') is-invalid @enderror" value="{{ $setting->config_key }}" placeholder="Nhập Config key">
                                @error('config_key')
                    <div class="alert alert-danger" >{{ $message }}</div>
                @enderror

                </div>
                @if (request()->type ==='Text')
                <div class="form-group">
                    <label>Config value</label>
                    <input type="text" name="config_value" class="form-control @error('config_value') is-invalid @enderror" value="{{ $setting->config_value }}" placeholder="Nhập Config key">
                    @error('config_value')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                  </div>
                    @elseif(request()->type ==='Textarea')
                    <div class="form-group">
                        <label>Config value</label>
                        <textarea  name="config_value" class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config key" rows="5">
                            {{ $setting->config_value }}
                        </textarea>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                  @endif
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
       </div>
    </div>
   </div>
 @endsection


