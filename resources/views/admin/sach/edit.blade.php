@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Sách
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('sach/create')}}">
                        			Thêm
                        		</a>
                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/sach') }}">Sách</a></li>
                            <li class="breadcrumb-item active">{{$sach->id}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết Sách </span>
                            </div>
                            <div class="card-body">
                            	<form id="form_sua" action="{{ route('sach.update', $sach->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf

                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Tên sách</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="tensach" class="container-fluid" rows="1">{{$sach->tensach}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Tác giả</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="tacgia" class="container-fluid" rows="1">{{$sach->tacgia}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">NXB</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="nhaxuatban" class="container-fluid" rows="1">{{$sach->nhaxuatban}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Năm XB</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="namxuatban" class="container-fluid" rows="1">{{$sach->namxuatban}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Nơi nhập</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="noinhap" class="container-fluid" rows="1">{{$sach->noinhap}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Giá nhập</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="gianhap" class="container-fluid" rows="1">{{$sach->gianhap}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Giá bán</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="giaban" class="container-fluid" rows="1">{{$sach->giaban}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Số lượng </div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="soluong" class="container-fluid" rows="1">{{$sach->soluong}}</textarea>
                                        		</td>
                                        		<td  class="font-weight-bolder">
                                            		<div class="container-fluid">Trạng thái</div>
                                        		</td>
                                        		<td >
                                        			 <div id="check_is_active" hidden>{{$sach->is_active}}</div>
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1">{{$sach->is_active}}</option>
                                                   		<option id="status_active2"></option>
                                                	</select>
                                        		</td>
                            				 </tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoitao" id="nguoitao" class="container-fluid" type="text" value="{{$sach->nguoitao}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$sach->created_at}}</div>
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoisua" id="nguoisua" class="container-fluid" type="text" value="{{$sach->nguoisua}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$sach->updated_at}}</div>
                            				 	</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_sua"type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Chỉnh sửa</button>
                            		<a class="btn btn-primary mt-1 float-right" style="width:15%" href="#" onclick="deleteRecord({{$sach->id}})">Xóa</a>
                            	</form>
                            </div>
                        </div>
</div>

<script>
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
						window.location = "/sach"
                    }
                });
    		}
    	}
</script>
@endsection