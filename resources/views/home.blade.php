
@extends('layouts.admin')

@section('title')
@endsection
<title>Trang chủ</title>
@section('content')
    <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    @include('patials.content-header', ['name' =>'Home','key'=>'Home'])
 <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
                Trang chủ
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


