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
                            			</div>
                            		</div>
                            </div>
                        </div>               
</div>
<div class="container-fluid">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-edit mr-1" ></i>
                            	<span class="font-weight-bolder text-info">Trạng thái đơn hàng</span>
							</div>
							<div class="card-body">
								@foreach($donhang->TrangThaiDonHang as $trangthaidonhang)
									@if($trangthaidonhang->trangthai==1)
									<div>Xác nhận đơn hàng - by : {{$trangthaidonhang->confirmed_by}} at: {{$trangthaidonhang->confirmed_at}}</div>
									@endif
									@if($trangthaidonhang->trangthai==2)
									<div>Xác nhận có hàng - by : {{$trangthaidonhang->confirmed_by}} at: {{$trangthaidonhang->confirmed_at}}</div>
									@endif
									@if($trangthaidonhang->trangthai==3)
									<div>Bắt đầu giao - by : {{$trangthaidonhang->confirmed_by}} at: {{$trangthaidonhang->confirmed_at}}</div>
									@endif
									@if($trangthaidonhang->trangthai==4)
									<div>Đã giao - by : {{$trangthaidonhang->confirmed_by}} at: {{$trangthaidonhang->confirmed_at}}</div>
									@endif
									@if($trangthaidonhang->trangthai==5)
									<div>Đã hủy - by : {{$trangthaidonhang->confirmed_by}} at: {{$trangthaidonhang->confirmed_at}}</div>
									@else
									@endif
									<?php $t1= $donhang->trangthai?>
								@endforeach
								
								<form id="form_sua" action="{{ route('donhang.update', $donhang->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
								@csrf
								@method("patch")
								@if(!isset($t1))
								<input name="trangthai" id="trangthai" value="1" hidden>
								<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%;height:70px">Xác nhận đơn hàng</button>
								@endif				
								@if(isset($t1) && $t1==1)
								<input name="trangthai" id="trangthai" value="2" hidden>
								<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%;height:70px">Xác nhận có hàng</button>
								@endif	
								@if(isset($t1) && $t1==2)
								<input name="trangthai" id="trangthai" value="3" hidden>
								<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%;height:70px">Xác nhận bắt đầu giao hàng</button>
								@endif		
								@if(isset($t1) && $t1==3)
								<input name="trangthai" id="trangthai" value="4" hidden>
								<button id="btn_sua"" type="submit" class="btn btn-primary mt-1 float-left" style="width: 15%;height:70px">Xác nhận đã giao hàng</button>
								@endif									
								</form>
								<form id="form_sua" action="{{ route('donhang.update', $donhang->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
								@csrf
								@method("patch")
								<input name="trangthai" id="trangthai" value="5" hidden>
								<button id="btn_sua"" type="submit" class="btn btn-danger mt-1 float-right" style="width: 15%;height:70px">Hủy đơn hàng</button>
								</form>
							</div>
							
						</div>
</div>         
@endsection