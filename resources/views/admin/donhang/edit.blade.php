@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/donhang') }}">Đơn hàng</a></li>
                            <li class="breadcrumb-item active">{{$donhang->id}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Chi tiết đơn hàng</span>
                            </div>
                            <div class="card-body">
                            	<form id="form_sua" action="{{ route('donhang.update', $donhang->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            	@csrf
                            	@method("patch")
                            		<div class="table-responsive">
                            			<table class="table table-bordered" width="100%" cellspacing="0">
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Mã đơn hàng</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="id" id="id" class="container-fluid" value="{{$donhang->id}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Ngày tạo</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="created_at" id="created_at" class="container-fluid" value="{{$donhang->created_at}}" readonly>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">User</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="user" id="user" class="container-fluid" value="{{$donhang->User->username}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Họ tên</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="hoten" id="hoten" class="container-fluid" value="{{$donhang->User->hoten}}" readonly>
                                        		</td>
                            				 </tr>
                            				 <tr>
                            				 	<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Phone</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="phone" id="phone" class="container-fluid" value="{{$donhang->User->phone}}" readonly>
                                        		</td>
                                        		<td width="25%" class="font-weight-bolder">
                                            		<div class="container-fluid">Email</div>
                                        		</td>
                                        		<td width="25%">
                                        			<input name="email" id="email" class="container-fluid" value="{{$donhang->User->email}}" readonly>
                                        		</td>
                            				 </tr>
                            				 <tr>
                                        		<td class="font-weight-bolder">
                                            		<div class="container-fluid">Địa chỉ</div>
                                        		</td>
                                        		<td colspan="3">
                                               		<textarea name="url" id="url" class="container-fluid" rows="3">{{$donhang->diachi}}</textarea>
                                        		</td>
                                    		</tr>
                            			</table>
                            			<div class="table-responsive">
                            				<table class="table detail_table table-bordered mt-3" width="100%" cellspacing="0">
                            					<thead class="thead-primary">
                            					 	<tr>
						      							<th width="10%">#</th>
						      							<th width="10%">Code</th>
						      							<th>Tên sách</th>
						      							<th width="10%">Số lượng</th>
						      							<th width="15%">Giá</th>
						      							<th width="15%">Tổng</th>
						    						</tr>
                            					</thead>
                            					<tbody>
                            						<tr>
						     							<th scope="row">1</th>
						      							<td>Mark</td>
						      							<td>Otto</td>
						      							<td>1</td>
						      							<td>70000</td>
						      							<td>70000</td>
						    						</tr>
						    						<tr>
						     							<th scope="row">2</th>
						      							<td>Mark</td>
						      							<td>Otto</td>
						      							<td>1</td>
						      							<td>100000</td>
						      							<td>100000</td>
						    						</tr>
						    						<tr>
						     							<th scope="row">3</th>
						      							<td>Mark</td>
						      							<td>Otto</td>
						      							<td>1</td>
						      							<td>50000</td>
						      							<td>50000</td>
						    						</tr>
                            					</tbody>
                            					<tfoot>
                            						<tr>
                            							<td rowspan="2" class="font-weight-bolder">Ghi chú</td>
                            							<td rowspan="2" colspan="3">{{$donhang->ghichu}}</td>
                            							<td class="font-weight-bolder">Phí ship</td>
                            							<td>{{$donhang->phiship}}</td>
                            						</tr>
                            						<tr>
                            							<td class="font-weight-bolder">Tổng tiền</td>
                            							<td>250000</td>
                            						</tr>
                            					</tfoot>
                            				</table>
                            				<div class="font-weight-bolder mb-5 mt-3" style="width:100%;">
                            					<div class="w-25 d-inline-block">Confirmed by: {{$donhang->confirmed_by}}</div>
                            					<div class="w-50 d-inline-block">Confirmed date: {{$donhang->confirmed_at}}</div>
                            				</div>
                            			</div>
                            		</div>
                            		<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%">Duyệt đơn hàng</button>
                            	</form>
                            </div>
                        </div>                        
</div>
@endsection