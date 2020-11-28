
@extends('layouts.admin')

@section('title')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/setting/index.css') }}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('vendors/sweatAlert2/sweetalert2@10.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'setting','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="btn-group float-right">
                    <a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
                      Add setting
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                     <li><a href="{{ route('setting.create') .'?type=Text' }}">Text</a></li>
                     <li><a href="{{ route('setting.create') .'?type=Textarea' }}">Textarea</a></li>
                    </ul>
                  </div>

                </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Config key</th>
                        <th scope="col">Config value</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($setting as $setting1)
                      <tr>
                        <th scope="row">{{ $setting1->id }}</th>
                        <td>{{ $setting1->config_key }}</td>
                        <td>{{ $setting1->config_value }}</td>
                        <td>
                            <a href="{{ route('setting.edit',['id'=>$setting1->id]) .'?type='.$setting1->type }}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{ route('setting.delete',['id'=>$setting1->id]) }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{ $setting->links() }}
            </div>
      </div>
    </div>
  </div>

@endsection



