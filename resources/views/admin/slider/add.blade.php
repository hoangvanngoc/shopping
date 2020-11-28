
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>

@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'slider','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên Slider </label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nhập tên Slider">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description </label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"  rows="4">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                  <div class="form-group">
                    <label>Image </label>
                    <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror" >
                    @error('image_path')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
       </div>
    </div>
   </div>
 @endsection


