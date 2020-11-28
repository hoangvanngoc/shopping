
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>


@section('css')
<link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{  asset('admins/user/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/user/add/add.js') }}"></script>
@endsection

@section('content')
 <div class="content-wrapper">
@include('patials.content-header', ['name' =>'user','key'=>'Edit'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên user </label>
                  <input type="text" name="name" class="form-control " value="{{ $user->name }}" placeholder="Nhập tên User">
                </div>

                <div class="form-group">
                    <label>Email </label>
                    <input type="email" name="email" class="form-control " value="{{ $user->email }}" placeholder="Nhập E-mail">
                  </div>

                  <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" class="form-control " value="" placeholder="Nhập password">
                  </div>

                  <div class="form-group">
                    <label>chọn vai trò </label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        <option value=""></option>
                        @foreach ($role as $roleitem)
                        <option {{  $roleofUser->contains('id', $roleitem->id) ? 'selected' : ''}} value="{{ $roleitem->id }}">{{ $roleitem->name }}</option>
                        @endforeach
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


