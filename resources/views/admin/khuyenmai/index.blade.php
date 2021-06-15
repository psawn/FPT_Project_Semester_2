@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Khuyến mại
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('admin/khuyenmai/create')}}">
                        			Thêm
                        		</a>
                        	</h1> 	
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Khuyến mại</li>
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
                                                <th>% KM</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Is_Active</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>% KM</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Is_Active</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											@foreach ($khuyenmais as $khuyenmai)
											<tr>
                                                <td>{{$khuyenmai->id}}</td>
                                                <td>{{$khuyenmai->percentage}}</td>
                                                <td>{{$khuyenmai->start_date->format('d/m/Y')}}</td>
                                                <td>{{$khuyenmai->end_date->format('d/m/Y')}}</td>
                                                <td>
                                                @if($khuyenmai->is_active==1)
                                                	Không ẩn
                                                @else Ẩn	
                                                @endif
                                                </td>
                                                <td><a href="{{ route('khuyenmai.edit',$khuyenmai->id) }}">Xem</a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection