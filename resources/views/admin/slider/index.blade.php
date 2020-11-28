
@extends('layouts.admin')

@section('title')
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweetalert2@10.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'slider','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Slider Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($sliders as $slider1)
                      <tr>
                        <th scope="row">{{ $slider1->id }}</th>
                        <td>{{ $slider1->name }}</td>
                        <td>{{ $slider1->description }}</td>
                        <td><img class="image_slider_150_100" src="{{ $slider1->image_path }}" ></td>

                        <td>
                            <a href="{{ route('slider.edit',['id'=>$slider1->id]) }}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{ route('slider.delete',['id'=>$slider1->id]) }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{ $sliders->links() }}
            </div>
      </div>
    </div>
  </div>

@endsection


