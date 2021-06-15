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
                            <li class="breadcrumb-item active">{{$sach->id}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết sách</span>
                            </div>
                            <div class="card-body">
								<form id="form_sua" action="{{ route('sach.update',$sach->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                            				 	<td width="16%" class="font-weight-bolder">
                                            		<div class="container-fluid">ID</div>
                                        		</td>
                                        		<td width="16.67%">
                                        			<input name="id" id="id" class="container-fluid" value="{{$sach->id}}" readonly>
                                        		</td>
                                        		<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">Danh mục</div>
                                        		</td>
                                        		<td width="20.34%">
                                        			<select name="category_id" id="category_id" class="container-fluid">
                                        				@foreach($danhmucs as $danhmuc)
                                        				<option name="option_danhmuc" value="{{$danhmuc->id}}">{{$danhmuc->name}}</option>
                                        				@endforeach
                                        			</select>
                                        			
                                        		</td>
                                        		<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">Is Active</div>
                                        		</td>
                                        		<td width="15.67%">
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1" value="{{$sach->is_active}}" selected></option>
                                                   		<option id="status_active2"></option>
                                                	</select>
                                        		</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tên sách</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="name" class="container-fluid" rows="2">{{$sach->name}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Mô tả </div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="description" class="container-fluid" rows="2">{{$sach->description}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Tập</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="print_length" id="print_length" class="container-fluid" type="text" value="{{$sach->print_length}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Số lượng</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="quantity" id=""quantity"" class="container-fluid" type="text" value="{{$sach->quantity}}">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Giá nhập</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="import_price" id="import_price" class="container-fluid" type="text" value="{{$sach->import_price}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Giá bán</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="price" id="price" class="container-fluid" type="text" value="{{$sach->price}}">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Nhà xuất bản</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="publisher" id="publisher" class="container-fluid" type="text" value="{{$sach->publisher}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Năm xuất bản</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="publication_year" id="publication_year" class="container-fluid" type="text" value="{{$sach->publication_year}}">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Ảnh đại diện</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="image" class="container-fluid" rows="2">{{$sach->image}}</textarea>
                                               		<div><img width="50%" src="{{$sach->image}}"></div>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Created by</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="created_by" id="created_by" class="container-fluid" type="text" value="{{$sach->created_by}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Created at</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="created_at" id="created_at" class="container-fluid" type="text" value="{{$sach->created_at}}">
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Updated by</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="updated_by" id="updated_by" class="container-fluid" type="text" value="{{$sach->updated_by}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Updated at</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="updated_at" id="updated_at" class="container-fluid" type="text" value="{{$sach->updated_at}}">
                            				 	</td>
                                    		</tr>
                            			</table>
                            		</div>		
                            		<button id="btn_sua" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Chỉnh sửa</button>
                            		<a class="btn btn-primary mt-1 float-right" style="width:15%" href="#" onclick="deleteRecord({{$sach->id}})">Xóa</a>
								</form>
                            </div>
                        </div>
</div>
<script>
	for(var i=0;i<document.getElementById("category_id").length;i++) {
		if({{$sach->category_id}}==document.getElementsByName('option_danhmuc')[i].value) {
			document.getElementsByName('option_danhmuc')[i].setAttribute('selected', 'selected');
		}
	}
	function deleteRecord(id){
    	if (confirm("Bạn chắc chắn muốn xóa bản ghi này?")){
    		let url = "{{ route('sach.destroy', '') }}"+"/"+id;
            let token   = $('input[name="_token"]').val();
            console.log(url);
            console.log(token);
                
            $.ajax({
            	url: url,
                type: 'DELETE',
                data: {
                _token: token
                },
                success: function(response) {
                	Swal.fire({
                		title: 'Success',
  						icon: 'success',
  						html: 'Xóa thành công',
  						confirmButtonText: 'OK',
  						timer: 5000,
					})
					window.location = "/admin/sach"
                }
            });
    	}
    }
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