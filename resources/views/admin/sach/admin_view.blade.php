@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Sách
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('sach/create')}}">
                        			Thêm
                        		</a>
                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sách</li>
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
                                                <th>Tên sách</th>
                                                <th>Tác giả</th>
                                                <th>NXB</th>
                                                <th>Năm xuất bản</th>
                                                <th>Nơi nhập</th>
                                                <th>Giá nhập</th>
                                                <th>Giá bán</th>
                                                <th>Tên sách</th>
                                                <th>Người tạo</th>
                                                <th>Ngày tạo</th>
                                                <th>Người sửa </th>
                                                <th>Ngày sửa</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                                <th>STT</th>
                                                <th>Tên sách</th>
                                                <th>Tác giả</th>
                                                <th>NXB</th>
                                                <th>Năm xuất bản</th>
                                                <th>Nơi nhập</th>
                                                <th>Giá nhập</th>
                                                <th>Giá bán</th>
                                                <th>Tên sách</th>
                                                <th>Người tạo</th>
                                                <th>Ngày tạo</th>
                                                <th>Người sửa </th>
                                                <th>Ngày sửa</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											@foreach ($sach as $sachs)
											<tr>
                                                <td>{{$sachs->id}}</td>
                                                <td>{{$sachs->tensach}}</td>
                                                <td>{{$sachs->tacgia}}</td>
                                                <td>{{$sachs->nhaxuatban}}</td>
                                                <td>{{$sachs->namxuatban}}</td>
                                                <td>{{$sachs->noinhap}}</td>
                                                <td>{{$sachs->gianhap}}</td>
                                                <td>{{$sachs->giaban}}</td>
                                                <td>{{$sachs->nguoitao}}</td>
                                                <td>{{$sachs->nguoisua}}</td>
                                                <td>{{$sachs->ngaytao->format('d/m/Y')}}</td>
                                                <td>{{$sachs->ngaysua->format('d/m/Y')}}</td>
                                                <td>{{$sachs->is_active}}</td>
                                                <td>{{$sachs->soluong}}</td>
                                                <td><a href="{{ route('sach.edit',$sach->id) }}">Xem</a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection