@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Khuyến mại
                        		<a class="btn btn-primary float-right" style="width: 15%" href="{{ url('khuyenmai/create')}}">
                        			Thêm
                        		</a>
                        	</h1> 	
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/khuyenmai') }}">Khuyến mại</a></li>
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
                                        			<input name="percentage" id="percentage" class="container-fluid" value="{{$khuyenmai->percentage}}">
                                        		</td>
                                        		<td width="16.67%" class="font-weight-bolder">
                                            		<div class="container-fluid">Is Active</div>
                                        		</td>
                                        		<td width="16.67%">
                                        			 <div id="check_is_active" hidden>{{$khuyenmai->is_active}}</div>
                                        			 <select name="is_active" id="is_active" class="container-fluid">
                                                   		<option id="status_active1" value="{{$khuyenmai->is_active}}" selected></option>
                                                   		<option id="status_active2"></option>
                                                	</select>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày bắt đầu</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="start_date" id="start_date" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="{{$khuyenmai->start_date->format('Y-m-d')}}">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày kết thúc</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="end_date" id="end_date" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="{{$khuyenmai->end_date->format('Y-m-d')}}">
                            				 	</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tiêu đề</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="title" class="container-fluid" rows="3">{{$khuyenmai->title}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Nội dung</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<textarea name="content" class="container-fluid" rows="15">{{$khuyenmai->content}}</textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                    			<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Người tạo</div>
                            				 	</td>
                            				 	<td colspan="2">
                            				 		<input name="created_by" id="created_by" class="container-fluid" type="text" value="{{$khuyenmai->created_by}}">
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
                            				 		<input name="updated_by" id="updated_by" class="container-fluid" type="text" value="{{$khuyenmai->updated_by}}">
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
                            		<button id="btn_sua" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Chỉnh sửa</button>
                            		<a class="btn btn-primary mt-1 float-right" style="width:15%" href="#" onclick="deleteRecord({{$khuyenmai->id}})">Xóa</a>
                            	</form>
                            </div>
                        </div>                        
</div>
<div class="container-fluid">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-edit mr-1" ></i>
								<span class="font-weight-bolder text-info">Thông tin sách áp dụng</span>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
                                            <tr>
                                                <th>ID</th>
                                                <th width="50%">Tên sách</th>
                                                <th width="20%">Ảnh</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th width="50%">Tên sách</th>
                                                <th width="20%">Ảnh</th>
												<th>Trạng thái</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	@foreach($khuyenmai->PromotionBook as $khuyenmaisach)
                                        	<tr>
                                        		<td>{{$khuyenmaisach->book_id}}</td>
                                        		<td><a href="/admin/sach/{{$khuyenmaisach->Book->id}}/edit">{{$khuyenmaisach->Book->name}}</a></td>
                                        		<td><img width="100%" src="{{$khuyenmaisach->Book->image}}"></td>
                                        		<td>
                                        		@if($khuyenmaisach->is_active==1)
                                        			Áp dụng	
                                        		@else 
                                        			Không áp dụng	
                                        		@endif
                                        		</td>
                                        	</tr>
                                        	@endforeach
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
</div>
<div class="container-fluid">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-edit mr-1" ></i>
								<span class="font-weight-bolder text-info">Danh sách sách</span>
							</div>
							
							<div class="card-body">
									<div class="table-responsive">
									<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
										<thead>
                                            <tr>
                                                <th>ID</th>
                                                <th width="50%">Tên sách</th>
                                                <th width="20%">Ảnh</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th width="50%">Tên sách</th>
                                                <th width="20%">Ảnh</th>
												<th>Trạng thái</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	@foreach($saches as $sach)
                                        	<tr>
                                        		<td name="id_sach">{{$sach->id}}</td>
                                        		<td>{{$sach->name}}</td>
                                        		<td><img width="100%" src="{{$sach->image}}"></td>
                                        		<td><a href="#" onclick="add({{$khuyenmai->id}},{{$sach->id}})">Áp dụng</a></td>
                                        		<!-- 
                                        		<td><a href="{{ url('khuyenmai/'.$khuyenmai->id.'/'.$sach->id.'/add/') }}">Áp dụng</a></td>
                                        		 -->
                                        	</tr>
                                        	@endforeach
                                        </tbody>
									</table>
								</div>
							</div>
						</div>
</div>
<script>
	function deleteRecord(id){
    		if (confirm("Bạn chắc chắn muốn xóa bản ghi này?")){
    			let url = "{{ route('khuyenmai.destroy', '') }}"+"/"+id;
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
  							showCloseButton: true,
  							timer: 5000,
						})
						window.location = "/admin/khuyenmai"
                    }
                });
    		}
    	}
    function add(id_khuyenmai,id_sach){
    	let url = "{{ route('khuyenmai.add', '') }}"+"/"+id_khuyenmai+"/"+id_sach;
    	let token   = $('input[name="_token"]').val();
    	
    	$.ajax({
            url: url,
            type: 'POST',
            data: {
            _token: token
            },
			success: function(response) {
				Swal.fire({
                title: 'Success',
  				icon: 'success',
  				html: 'Áp dụng thành công',
  				showCloseButton: true,
  				timer: 5000,
			})
			window.location = "/admin/khuyenmai"
			}
 		});
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