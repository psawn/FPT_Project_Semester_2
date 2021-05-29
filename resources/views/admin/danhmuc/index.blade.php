@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <div class="mt-4">
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên danh mục</th>
                                                <th>ID danh mục cha</th>
                                                <th>Tên danh mục cha</th>
                                                <th>Người sửa</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên danh mục</th>
                                                <th>ID danh mục cha</th>
                                                <th>Tên danh mục cha</th>
                                                <th>Người sửa</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
											@foreach ($danhmucs as $danhmuc)
											<tr>
                                                <td>{{$danhmuc->id}}</td>
                                                <td>{{$danhmuc->tendanhmuc}}</td>
                                                <td>{{$danhmuc->iddanhmuccha}}</td>
                                                <td>{{$danhmuc->tendanhmuccha}}</td>
                                                <td>
                                                @if($danhmuc->updated_by=='')
                                                	NULL
                                                @else 
                                                	{{$danhmuc->updated_by}}	
                                                @endif
                                                </td>
                                                <td><a href="{{ route('danhmuc.edit',$danhmuc->id) }}">Xem</a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection