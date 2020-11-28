
@extends('layouts.admin')

@section('title')
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweetalert2@10.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection
<title>Add products</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'product','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Products</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($product as $productItem)
                      <tr>
                        <th scope="row">{{ $productItem->id }}</th>
                        <td>{{ $productItem->name }}</td>
                        <td>{{ number_format($productItem->price) }}</td>
                        <td><img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt=""></td>
                        <td>{{ optional($productItem->category)->name  }}</td> @php
                            // obtional để fix nếu ở bảng product có productitem mà trong dah mục nó không
                            //có id đó nên sẽ xảy ra lỗi
                            //number format để format lại đơn vị tiền tệ
                        @endphp
                        <td>
                            <a href="{{ Route('product.edit', ['id'=>$productItem->id]) }}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{ route('product.delete', ['id'=>$productItem->id]) }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{ $product ->links() }}
            </div>
      </div>
    </div>
  </div>

@endsection


