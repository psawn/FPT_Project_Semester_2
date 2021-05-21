@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Khuyến mại

                        	</h1> 	
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/khuyenmai') }}">Khuyến mại</a></li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            <div class="card-body">
                            	<form id="form_them" action="{{ route('khuyenmai.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">% KM</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="phantramkhuyenmai" id="phantramkhuyenmai" class="container-fluid" value="">
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Is Active</div>
                                        		</td>
                                        		<td width="25%">
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1" value="1">1</option>
                                                   		<option id="status_active2" value="0">0</option>
                                                	</select>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày bắt đầu</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input name="ngaybatdau" id="ngaybatdau" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày kết thúc</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input name="ngayketthuc" id="ngayketthuc" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="">
                            				 	</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tiêu đề</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="tieude" class="container-fluid" rows="3"></textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Nội dung</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<textarea name="noidung" class="container-fluid" rows="15"></textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Người tạo</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<input name="nguoitao" id="nguoitao" value="admin" readonly>
                                        		</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_them"" type="submit" class="btn btn-primary mt-1" style="width: 20%;float: left">Thêm</button>
                            	</form>
                            </div>
                        </div>
                    </div>
@endsection