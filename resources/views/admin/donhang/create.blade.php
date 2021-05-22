@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Thêm đơn hàng

                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/khuyenmai') }}">Đơn hàng online</a></li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            <div class="card-body">
                            	<form id="form_them" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Địa chỉ</div>
                                                    <input type="text" name="diachi">
                                        		</td>
                                                <td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input  name="ngaytao" id="ngaytao" class="container-fluid" type="date" value="">
                            				 	</td>
                                                 <td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày duyệt</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input  name="ngayduyet" id="ngayduyet" class="container-fluid" type="date" value="">
                            				 	</td>
                                                 <td class="font-weight-bolder">
                                            		<div class="container-fluid">Người duyệt</div>
                                                    <input type="text" name="nguoiduyet">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Trạng thái</div>
                                        		</td>
                                        		<td >
                                        			 <select name="trangthai" id="trangthai" class="container-fluid">
                                                   		<option id="status_active1" value="1">1</option>
                                                   		<option id="status_active2" value="0">0</option>
                                                	</select>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Doanh thu</div>
                                                    <input type="number" name="doanhthu">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="form-group">
                                                        <label>Ghi chú</label>
                                                        <textarea class="form-control" name="ghichu" id="ghichu" rows="3"></textarea>
                                                     </div>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Phí ship</div>
                                                    <input type="number" name="phiship">
                                        		</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_them" type="submit" class="btn btn-primary mt-1" style="width: 20%;float: left">Thêm</button>
                            	</form>
                            </div>
                        </div>
                    </div>
@endsection
