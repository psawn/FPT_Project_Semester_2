@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Sách
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('admin/sach/create')}}">
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
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Tác giả</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th width="40%">Tên</th>
                                                <th>Tác giả</th>
                                                <th>Số lượng</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($saches as $sach)
                                        	<tr>
                                        		<td>{{$sach->id}}</td>
                                        		<td>{{$sach->tensach}}</td>
                                        		<td>{{$sach->tentacgia}}</td>
                                        		<td>{{$sach->soluong}}</td>
                                        		<td>
                                        		@if($sach->is_active==1)
                                                	Không ẩn
                                                @else Ẩn	
                                                @endif
                                        		</td>
                                        		<td><a href="{{ route('sach.edit',$sach->id) }}">Xem</a></td>
                                        	</tr>
                                        </tbody>
                                        @endforeach
                            		</table>
                            	</div>
                            </div>
                        </div>                        
</div>
@endsection