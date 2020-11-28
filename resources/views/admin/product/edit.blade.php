
@extends('layouts.admin')

@section('title')
<title>Add Products</title>
@endsection
@section('css')
<link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('admins/product/add/add.css') }}"></script>
<link rel="stylesheet" href="{{ asset('admin/product/add/add.css') }}">
@endsection
@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'product','key'=>'Edit'])

<form action="{{ route('product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
  <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                    @csrf
                    <div class="form-group">
                    <label>Name products</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="enter products">
                        </div>

                    <div class="form-group">
                        <label>price</label>
                        <input type="text" name="price" class="form-control" placeholder="enter price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" name="feature_image_path" class="form-control-file" >
                            </div>
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                   <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>


                            <div class="form-group container_image_detail">
                                <label>Image detail</label>
                                <input type="file" multiple name="image_path[]" class="form-control-file" >
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                  @foreach ($product->productImages as $productImageitem)
                                    <div>
                                       <div class="col-md-3">
                                        <img class="imageds_product_detail" src="{{ $productImageitem->image_path }}" alt="">
                                       </div>
                                    </div>
                                @endforeach
                            </div>

                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="form-control select2_init" name="category_id">
                      <option value="">chọn danh mục</option>
                      {!! $htmlOption !!}
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Enter Tags for products</label><br>

                    <select class="form-control js-tags" name="tags[]" multiple="multiple">
                        @foreach ($product->tags as $tagsItem)
                        <option value="{{ $tagsItem->name }}" selected >{{ $tagsItem->name }}</option>
                        @endforeach
                    </select>
                </div>
             </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Enter content</label>
                    <textarea class="form-control my-editor" name="content" id="" rows="6">{{ $product->content }}</textarea>
                  </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary chuc_mung">Submit</button>
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

