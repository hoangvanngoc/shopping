@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>
@section('content')
 <div class="content-wrapper">
   @include('patials.content-header', ['name' =>'product','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('message'))
                <div class="alert alert-info"> {{ Session::get('message') }}</div>
            @endif
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Users</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Order</th>
                        <th scope="col">Email</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $customer)
                      <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td >{{ $customer->name }}</td>
                        <td >{{ $customer->address }}</td>
                        <td >{{ $customer->created_at }}</td>
                        <td >{{$customer->email  }}</td>
                        <td class="bg-warning">Chưa xử lý</td>
                        <td>
                            {{-- url('bill')}}/{{ $customer->id --}}
                            <a class="btn btn-info" href="{{ route('hello') }}">Detail</a>
                            <a href="" data-url="{{ url('bill')}}/{{ $customer->id }}" class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>
           </div>
            <div class="col-md-12">
                {{-- {{ $customers ->links() }} --}}
            </div>
      </div>
    </div>
  </div>

@endsection
