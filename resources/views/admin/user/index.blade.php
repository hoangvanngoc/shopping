
@extends('layouts.admin')

@section('title')
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('vendors/sweatAlert2/sweetalert2@10.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'user','key'=>'Add'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('user.create') }}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($user as $user1)
                      <tr>
                        <th scope="row">{{ $user1->id }}</th>
                        <td>{{ $user1->name }}</td>
                        <td>{{ $user1->email }}</td>


                        <td>
                            <a href="{{ route('user.edit',['id'=>$user1->id]) }}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{ route('user.delete',['id'=>$user1->id]) }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{-- {{ $user1->links() }} --}}
            </div>
      </div>
    </div>
  </div>

@endsection


