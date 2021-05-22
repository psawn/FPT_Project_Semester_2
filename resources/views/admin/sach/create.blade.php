@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Thêm sách

                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/khuyenmai') }}">Sách</a></li>
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
                                            		<div class="container-fluid">Tên sách</div>
                                                    <input type="text" name="tensach">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Tác giả</div>
                                                    <input type="text" name="tacgia">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Nhà xuất bản</div>
                                                    <input type="text" name="nhaxuatban">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Năm xuất bản</div>
                                                    <input type="text" name="namxuatban" placeholder = "YYYY">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Nơi nhập</div>
                                                    <input type="text" name="noinhap">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Giá nhập</div>
                                                    <input type="text" name="gianhap">
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Giá bán</div>
                                                    <input type="text" name="giaban">
                                        		</td>

                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Người tạo</div>
                                        		</td>
                                                <td colspan="5">
                                                	<input type ="text" name="nguoitao" id="nguoitao" value="admin" readonly>
                                        		</td>
                                                <td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input  name="ngaytao" id="ngaytao" class="container-fluid" type="date" value="">
                            				 	</td>
                                                 <td class="font-weight-bolder">
                                            		<div class="container-fluid">Trạng thái</div>
                                        		</td>
                                        		<td >
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1" value="1">1</option>
                                                   		<option id="status_active2" value="0">0</option>
                                                	</select>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Số lượng</div>
                                                    <input type="number" name="soluong">
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
