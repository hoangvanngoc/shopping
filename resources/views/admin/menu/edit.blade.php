
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'menu','key'=>'Edit'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('menus.update',['id'=>$menuFollowIdEdit->id]) }}" method="post">
                @csrf
                <div class="form-group">
                  <label>Tên menu </label>
                  <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="{{ $menuFollowIdEdit->name }}">

                </div>
                <div class="form-group">
                    <label>Chọn menu cha</label>
                    <select class="form-control" name="parent_id">
                      <option value="0">chọn Menu cha</option>
                      {!! $optionSelect !!}
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
       </div>
    </div>
   </div>
 @endsection


