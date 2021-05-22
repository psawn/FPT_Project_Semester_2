@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Đơn hàng online
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('donhang/create')}}">
                        			Thêm
                        		</a>
                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Đơn hàng online</li>
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
                                                <th>STT</th>
                                                <th>Địa chỉ</th>
                                                <th>Ngày tạo</th>
                                                <th>Ngày duyệt</th>
                                                <th>Người duyệt</th>
                                                <th>Trạng thái</th>
                                                <th>Doanh thu</th>
                                                <th>Ghi chú</th>
                                                <th>Phí ship</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>STT</th>
                                                <th>Địa chỉ</th>
                                                <th>Ngày tạo</th>
                                                <th>Ngày duyệt</th>
                                                <th>Người duyệt</th>
                                                <th>Trạng thái</th>
                                                <th>Doanh thu</th>
                                                <th>Ghi chú</th>
                                                <th>Phí ship</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											@foreach ($dh_online as $dhol)
											<tr>
                                                <td>{{$dhol->id}}</td>
                                                <td>{{$dhol->diachi}}</td>
                                                <td>{{$dhol->ngaytao->format('d/m/Y')}}</td>
                                                <td>{{$dhol->ngayduyet->format('d/m/Y')}}</td>
                                                 <td>{{$dhol->nguoiduyet}}</td>
                                                <td>{{$dhol->trangthai}}</td>
                                                <td>{{$dhol->doanhthu}}</td>
                                                <td>{{$dhol->ghichu}}</td>
                                                <td>{{$dhol->phiship}}</td>
                                                <td><a href="{{ route('donhang.edit',$dhol->id) }}">Xem</a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection