@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        	<h1>Khuyến mại

                        	</h1> 	
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/khuyenmai') }}">Khuyến mại</a></li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                            </div>
                            <div class="card-body">
                            	<form id="form_them" action="{{ route('khuyenmai.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">% KM</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="percentage" id="percentage" class="container-fluid" value="">
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
                            				 		<input name="start_date" id="start_date" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="">
                            				 	</td>
                            				 	<td class="font-weight-bolder">
                            				 		<div class="container-fluid">Ngày kết thúc</div>
                            				 	</td>
                            				 	<td colspan="1">
                            				 		<input name="end_date" id="end_date" class="container-fluid" min="2000-01-01" max="2999-12-31" type="date" value="">
                            				 	</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Tiêu đề</div>
                                        		</td>
                                        		<td colspan="5">
                                               		<textarea name="title" class="container-fluid" rows="3"></textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Nội dung</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<textarea name="content" class="container-fluid" rows="15"></textarea>
                                        		</td>
                                    		</tr>
                                    		<tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Người tạo</div>
                                        		</td>
                                        		<td colspan="5">
                                                	<input name="created_by" id="created_by" value="admin" readonly>
                                        		</td>
                                    		</tr>
                            			</table>
                            		</div>
                            		<button id="btn_them"" type="submit" class="btn btn-primary mt-1" style="width: 20%;float: left">Thêm</button>
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