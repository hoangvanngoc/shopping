
@extends('layouts.admin')

@section('title')
<title>Add Products</title>
@endsection
@section('css')
<link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/product/add/add.css') }}">
@endsection

@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'product','key'=>'Add'])

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
  <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                  <label>Name products</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="enter products">
                  @error('name')
                         <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>

                  <div class="form-group">
                    <label>price</label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="enter price">
                    @error('price')
                         <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="file" name="feature_image_path" class="form-control-file" >
                        </div>

                        <div class="form-group">
                            <label>Image detail</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file" >
                            </div>

                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                      <option value="">chọn danh mục</option>
                      {!! $htmlOption !!}
                    </select>
                    @error('category_id')
                         <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter Tags for products</label><br>

                    <select class="form-control js-tags" name="tags[]"  multiple="multiple">

                    </select>
                </div>
             </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Enter content</label>
                    <textarea class="form-control my-editor @error('contents') is-invalid @enderror" name="contents" {{ old('contents') }}  rows="6"></textarea>
                    @error('contents')
                    <div class="alert alert-danger">{{ $message }}</div>
             @enderror
                </div>
                   </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
       </div>
    </div>
</form>
   </div>
 @endsection

 @section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <script src="{{ asset('admins/product/add/add.js') }}"></script>
 <script>
 </script>
@endsection

