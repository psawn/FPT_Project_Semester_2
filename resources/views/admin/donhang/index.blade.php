@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Đơn hàng</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>ID User</th>
                                                <th>Created at</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            	<th>ID</th>
                                                <th>ID User</th>
                                                <th>Created at</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											@foreach ($donhangs as $donhang)
											<tr>
                                                <td>{{$donhang->id}}</td>
                                                <td>{{$donhang->User->username}}</td>
                                                <td>{{$donhang->created_at}}</td>
                                                <td>
                                                @if($donhang->trangthai==0)
                                                	Chờ xác nhận
                                                @elseif($donhang->trangthai==1)
                                                	Xác nhận đơn hàng
                                                @elseif($donhang->trangthai==2)
                                                	Xác nhận có hàng
                                                @elseif($donhang->trangthai==3)
                                                	Đang giao
                                                @elseif($donhang->trangthai==4)
                                                	Đã giao
                                                @elseif($donhang->trangthai==5)
                                                	Đã hủy			
                                                @endif
                                                </td>
                                                <td><a href="{{ route('donhang.edit',$donhang->id) }}">Xem</a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection