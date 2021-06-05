@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/danhmuc') }}">Danh mục</a></li>
                            <li class="breadcrumb-item active">{{$danhmuc->tendanhmuc}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết danh mục </span>
                            </div>
                            <div class="card-body">
                            	<form id="form_sua" action="{{ route('danhmuc.update', $danhmuc->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            	@method("patch")
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">ID</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="id" id="id" class="container-fluid" value="{{$danhmuc->id}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Tên danh mục</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="tendanhmuc" id="tendanhmuc" class="container-fluid" value="{{$danhmuc->tendanhmuc}}">
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">ID danh mục cha</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="iddanhmuccha" id="iddanhmuccha" class="container-fluid" value="{{$danhmuc->iddanhmuccha}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Tên danh mục cha</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="tendanhmuccha" id="tendanhmuccha" class="container-fluid" value="{{$danhmuc->tendanhmuccha}}">
                                        		</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">URL</div>
                                        		</td>
                                        		<td colspan="3">
                                               		<textarea name="url" id="url" class="container-fluid" rows="3">{{$danhmuc->url}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người tạo</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="created_by" id="created_by" class="container-fluid" type="text" value="admin" readonly>
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td>
                            				 		<div class="container-fluid">{{$danhmuc->created_at}}</div>
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người sửa</div>
                            				 	</td>
                            				 	<td>
                            				 		<input name="updated_by" id="updated_by" class="container-fluid" type="text" value="{{$danhmuc->updated_by}}" readonly>
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày sửa</div>
                            				 	</td>
                            				 	<td>
                            				 		<div class="container-fluid">{{$danhmuc->updated_at}}</div>
                            				 	</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Chỉnh sửa</button>
                            	</form>
                            </div>
                        </div>                        
</div>
@endsection