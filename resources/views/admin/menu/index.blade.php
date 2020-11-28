
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'menu','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('menu.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($menu as $menus)
                      <tr>
                        <th scope="row">{{ $menus->id }}</th>
                        <td>{{ $menus->name }}</td>
                        <td>
                            <a href="{{ route('menus.edit', ['id'=>$menus->id]) }}" class="btn btn-default">Edit</a>
                            <a href="{{ route('menus.delete', ['id'=>$menus->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{ $menu->links() }}
            </div>
      </div>
    </div>
  </div>

@endsection


