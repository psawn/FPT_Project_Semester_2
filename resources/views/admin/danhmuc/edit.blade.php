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
                            	@if($errors->any())
      							<div id="error" style="display:none" class="alert alert-danger">
      								<ul>
      								@foreach($errors->all() as $error)
      									<li>{{ $error }}</li>
      								@endforeach
      								</ul>
      							</div>
      							@endif
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
                                        			<input name="name" id="name" class="container-fluid" value="{{$danhmuc->name}}" readonly>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">ID danh mục cha</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="parent_id" id="parent_id" class="container-fluid" value="{{$danhmuc->parent_id}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Tên danh mục cha</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="parent_name" id="parent_name" class="container-fluid" value="{{$danhmuc->parent_name}}" readonly>
                                        		</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Slug URL</div>
                                        		</td>
                                        		<td colspan="2">
                                               		<textarea name="slug" id="slug" class="container-fluid" rows="3" >{{$danhmuc->slug}}</textarea>
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
<script>
	let has_error = {{ $errors->any() > 0 ? 'true' : 'false'}};
	if(has_error) {
		Swal.fire({
  			title: 'Errors',
  			icon: 'error',
  			html: jQuery("#error").html(),
  			showCloseButton: true,
  			timer: 5000,
		})
	}
</script>
@endsection