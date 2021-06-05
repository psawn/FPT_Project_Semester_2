@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Khuyến mại
                        		<a class="btn btn-primary float-right" style="width: 15%" href="">
                        			Thêm
                        		</a>
                        	</h1> 	
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/sach') }}">Sách</a></li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết sách</span>
                            </div>
                            <div class="card-body">
								<form id="form_them" action="{{ route('sach.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				<tr>
                                        		<td width="16%" class="font-weight-bolder">
                                            		<div class="container-fluid">Danh mục</div>
                                        		</td>
                                        		<td width="34%">
                                        			<select name="id_danhmuc" id="id_danhmuc" class="container-fluid">
                                        				@foreach($danhmucs as $danhmuc)
                                        				<option name="option_danhmuc" value="{{$danhmuc->id}}">{{$danhmuc->tendanhmuc}}</option>
                                        				@endforeach
                                        			</select>
                                        			
                                        		</td>
                                        		<td width="16%" class="font-weight-bolder">
                                            		<div class="container-fluid">Is Active</div>
                                        		</td>
                                        		<td width="34%">
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1" value="1" >Không ẩn</option>
                                                   		<option id="status_active2" value="0">Ẩn</option>
                                                	</select>
                                        		</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tên sách</div>
                                        		</td>
                                        		<td colspan="3">
                                               		<textarea name="tensach" class="container-fluid" rows="2"></textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Tên tác giả</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="tentacgia" id="tentacgia" class="container-fluid" type="text" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Tập</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="tap" id="tap" class="container-fluid" type="text" value="">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Số lượng</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="soluong" id="soluong" class="container-fluid" type="text" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Nơi nhập</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="noinhap" id="noinhap" class="container-fluid" type="text" value="">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Giá nhập</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="gianhap" id="gianhap" class="container-fluid" type="text" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Giá bán</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="giaban" id="giaban" class="container-fluid" type="text" value="">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Nhà xuất bản</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="nhaxuatban" id="nhaxuatban" class="container-fluid" type="text" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Năm xuất bản</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="namxuatban" id="namxuatban" class="container-fluid" type="text" value="">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Ảnh đại diện</div>
                                        		</td>
                                        		<td colspan="3">
                                               		<textarea name="anhdaidien" class="container-fluid" rows="2"></textarea>
                                        		</td>
                                    		</tr>
                            			</table>
                            		</div>		
                            		<button id="btn_them"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Thêm</button>
								</form>
                            </div>
                        </div>
</div>
@endsection