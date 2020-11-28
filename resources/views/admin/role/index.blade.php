
@extends('layouts.admin')

@section('title')
@endsection
@section('css')

@endsection

@section('js')
<script src="{{ asset('vendors/sweatAlert2/sweetalert2@10.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'Roles','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên vai trò</th>
                        <th scope="col">Mô tả vai trò</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($roles as $role)
                      <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            <a href="{{ route('roles.edit',['id'=>$role->id]) }}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{ route('roles.delete',['id'=>$role->id]) }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{ $roles->links() }}
            </div>
      </div>
    </div>
  </div>

@endsection


