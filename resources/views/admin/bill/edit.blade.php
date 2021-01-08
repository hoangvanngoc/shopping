{{-- @section('content') --}}
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <section class="content-header">
        <h1>
            Chi tiết đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bill</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-md-4">Thông tin khách hàng</th>
                                    <th class="col-md-6"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    {{-- <td>{{ $customerInfo->name }}</td> --}}
                                    <td>hoang van ngoc</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    {{-- <td>{{ $customerInfo->created_at }}</td> --}}
                                    <td> 12/25/2020</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>0567493949</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>Nhân Mỹ , Nam Từ Liêm , Hà Nội</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    {{-- <td>{{ $customerInfo->email }}</td> --}}
                                    <td>hoangngoc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    {{-- <td>{{ $customerInfo->bill_note }}</td> --}}
                                    <td>NNNNN NNN</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting col-md-1" >STT</th>
                                <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                <th class="sorting col-md-2">Số lượng</th>
                                <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>
                            {{-- @foreach($billInfo as $key => $bill) --}}
                                <tr>
                                    {{-- <td>{{ $key+1 }}</td> --}}
                                    <td>11</td>
                                    <td>	Camera hành trình Gopro Hero 9</td>
                                    {{-- <td>{{ $bill->quantily }}</td> --}}
                                    <td>1</td>
                                    {{-- <td>{{ number_format($bill->price) }} VNĐ</td> --}}
                                    <td> 1,990,000 VND</td>
                                </tr>
                            {{-- @endforeach --}}
                            <tr>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td colspan="1"><b class="text-red">1,990,000 VND VNĐ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    {{-- {{ url('admincp/bill') }}/{{ $customerInfo->bill_id }} --}}
                <form action="#" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            <select name="status" class="form-control input-inline" style="width: 200px">
                                <option value="1">Chưa giao</option>
                                <option value="2">Đang giao</option>
                                <option value="2">Đã giao</option>
                            </select>

                            <input type="submit" value="Xử lý" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
{{-- @endsection --}}
