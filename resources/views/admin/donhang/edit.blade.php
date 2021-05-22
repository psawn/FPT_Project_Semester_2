@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Đơn hàng online
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('donhang/create')}}">
                        			Thêm
                        		</a>
                        	</h1>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/donhang') }}">Đơn hàng </a></li>
                            <li class="breadcrumb-item active">{{$dh_online->id}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết Đơn hàng </span>
                            </div>
                            <div class="card-body">
                            	<form id="form_sua" action="{{ route('donhang.update', $dh_online->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf

                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Địa chỉ</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="diachi" class="container-fluid" rows="2">{{$dh_online->diachi}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Doanh thu</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="doanhthu" class="container-fluid" rows="1">{{$dh_online->doanhthu}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Ghi chú</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="ghichu" class="container-fluid" rows="5">{{$dh_online->ghichu}}</textarea>
                                        		</td>
                                                <td class="font-weight-bolder">
                                            		<div class="container-fluid">Phí ship</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="phiship" class="container-fluid" rows="1">{{$dh_online->phiship}}</textarea>
                                        		</td>
                                        		<td  class="font-weight-bolder">
                                            		<div class="container-fluid">Trạng thái</div>
                                        		</td>
                                        		<td >
                                        			 <div id="check_trangthai" hidden>{{$dh_online->trangthai}}</div>
                                        			 <select name="trangthai" id="trangthai" class="container-fluid">
                                                   		<option id="status_active1">{{$dh_online->trangthai}}</option>
                                                   		<option id="status_active2"></option>
                                                	</select>
                                        		</td>
                            				 </tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người duyệt</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoiduyet" id="nguoiduyet" class="container-fluid" type="text" value="{{$dh_online->nguoiduyet}}">
                            				 	</td>
                                                 <td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày duyệt</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$dh_online->ngayduyet}}</div>
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$dh_online->created_at}}</div>
                            				 	</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="nguoisua" id="nguoisua" class="container-fluid" type="text" value="{{$dh_online->nguoisua}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày sửa</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<div class="container-fluid">{{$dh_online->updated_at}}</div>
                            				 	</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_sua"type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Chỉnh sửa</button>
                            		<a class="btn btn-primary mt-1 float-right" style="width:15%" href="#" onclick="deleteRecord({{$dh_online->id}})">Xóa</a>
                            	</form>
                            </div>
                        </div>
</div>

<script>
	function deleteRecord(id){
    		if (confirm("Bạn chắc chắn muốn xóa bản ghi này?")){
    			let url = "{{ route('donhang.destroy', '') }}"+"/"+id;
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
						window.location = "/donhang"
                    }
                });
    		}
    	}
</script>
@endsection