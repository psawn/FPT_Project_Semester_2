@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <h1 class="mt-4">Khuyến mại</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/khuyenmai') }}">Khuyến mại</a></li>
                            <li class="breadcrumb-item active">{{$khuyenmai->id}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết khuyến mại </span>
                            </div>
                            <div class="card-body">
                            	<form id="form_sua" action="{{ route('khuyenmai.update', $khuyenmai->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            	@method("patch")
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                            				 	<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">Mã CTKM</div>
                                        		</td>
                                        		<td width="16.67%">
                                        			<input name="id" id="id" class="container-fluid" value="{{$khuyenmai->id}}" readonly>
                                        		</td>
                                        		<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">% KM</div>
                                        		</td>
                                        		<td width="16.67%">
                                        			<input name="phantramkhuyenmai" id="phantramkhuyenmai" class="container-fluid" value="{{$khuyenmai->phantramkhuyenmai}}">
                                        		</td>
                                        		<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">Is Active</div>
                                        		</td>
                                        		<td width="16.67%">
                                        			 <div id="check_is_active" hidden>{{$khuyenmai->is_active}}</div>
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1">{{$khuyenmai->is_active}}</option>
                                                   		<option id="status_active2"></option>
                                                	</select>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày bắt đầu</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="ngaybatdau" id="ngaybatdau" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="{{$khuyenmai->ngaybatdau->format('Y-m-d')}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày kết thúc</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="ngayketthuc" id="ngayketthuc" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="{{$khuyenmai->ngayketthuc->format('Y-m-d')}}">
                            				 	</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tiêu đề</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="tieude" class="container-fluid" rows="3">{{$khuyenmai->tieude}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Nội dung</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<textarea name="noidung" class="container-fluid" rows="15">{{$khuyenmai->noidung}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoitao" id="nguoitao" class="container-fluid" type="text" value="{{$khuyenmai->nguoitao}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$khuyenmai->created_at}}</div>
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoisua" id="nguoisua" class="container-fluid" type="text" value="{{$khuyenmai->nguoisua}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$khuyenmai->updated_at}}</div>
                            				 	</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_sua"" type="submit" class="btn btn-primary mt-1" style="width: 20%;float: left">Chỉnh sửa</button>
                            	</form>
                            </div>
                        </div>                        
</div>
@endsection