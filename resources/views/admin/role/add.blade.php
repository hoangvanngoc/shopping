
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>

@section('css')
<link rel="stylesheet" href="{{ asset('admins/roles/add/add.css') }}">
@endsection
@section('js')
<script src="{{ asset('admins/roles/add/add.js') }}"></script>
@endsection

@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'Roles ','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data" style="width: 100%;">
            <div class="col-md-12" >
                @csrf
                <div class="form-group">
                  <label>Tên vai trò </label>
                  <input type="text" name="name" class="form-control " placeholder="Nhập tên vai trò" value="{{ old('name') }}">

                </div>

                <div class="form-group">
                    <label>mô tả vai trò</label>
                    <textarea name="display_name" class="form-control "  rows="4">{{ old('display_name') }}</textarea>
                </div>
                <div class="col-md-12">
                   <div class="row">
                    <div class="col-md-12">
                        <label>
                            <input type="checkbox" class="checkall">
                            check all
                        </label>

                    </div>
                    @foreach ($permissionParent as $permissionItem)
                <div class="card border-primary mb-3 col-md-12">
                  <div class="card-header">
                    <label for="">
                      <input type="checkbox" class="checkbox_wrapper" value="">
                    </label>
                    Module sản phẩm {{ $permissionItem->name }}
                  </div>
                  <div class="row">
                    @foreach ($permissionItem->permissionChildren as $item)
                    <div class="card-body text-primary col-md-3">
                    <h5 class="card-title">
                      <label for="">
                        <input type="checkbox" class="checkbox_children" name="permission_id[]" value="{{ $item->id }}">
                      </label>
                    {{ $item->name}}
                    </h5>
                  </div>
                  @endforeach
                </div>
                  </div>
                  @endforeach
                </div>
                   </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
       </div>
    </div>
   </div>
 @endsection


