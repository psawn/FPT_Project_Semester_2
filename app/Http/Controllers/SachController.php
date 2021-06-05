<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Sach;
use App\Models\DanhMuc;
use Symfony\Contracts\Service\Attribute\Required;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saches = Sach::all();
        return view("admin.sach.index",compact('saches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucs = DanhMuc::all();
        return view("admin.sach.create",compact('danhmucs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_danhmuc' => 'required|numeric',
            'is_active'=> 'required|numeric|min:0|max:1',
            'tensach' => 'required|max:200',
            'tentacgia' => 'required|max:200',
            'nhaxuatban' =>'required|max:200',
            'noinhap' => 'max:200',
            'namxuatban' => 'required|digits:4|integer|min:2000',
            'gianhap' => 'required|numeric|min:0',
            'giaban' => 'required|numeric|min:0',
            'tap' => 'numeric|min:1|nullable',
            'anhdaidien' => 'required|max:500',
            'soluong' => 'required|numeric|min:1',
        ],[
            'id_danhmuc.required' => 'Danh mục không được để trống',
            'is_active.required' => 'Is active không được để trống',
            'tensach.required' => 'Tên sách là chuỗi có độ dài không quá 200',
            'tentacgia.required' => 'Tên tác giả là chuỗi có độ dài không quá 200',
            'namxuatban.required' => 'Năm xuất bản lớn hơn năm 2000',
            'gianhap.required' => 'Giá nhập là số lớn hơn bằng 0',
            'giaban.required' => 'Giá bán là số lớn hơn bằng 0',
            'tap' => 'Tập là số lớn hơn bằng 1',
            'anhdaidien.required' => 'Link ảnh đại diện có độ dài không quá 500',
            'soluong' => 'Số lượng là số lớn hơn bằng 1'
        ]);
        $sach = new Sach();
        $sach->id_danhmuc = $request->id_danhmuc;
        $sach->tensach = $request->tensach;
        $sach->tentacgia = $request->tentacgia;
        $sach->nhaxuatban = $request->nhaxuatban;
        $sach->namxuatban = $request->namxuatban;
        $sach->noinhap = $request->noinhap;
        $sach->created_by = "admin";
        $sach->gianhap = $request->gianhap;
        $sach->giaban = $request->giaban;
        $sach->tap = $request->tap;
        $sach->anhdaidien = $request->anhdaidien;
        $sach->soluong = $request->soluong;
        $sach->is_active = $request->is_active;
        $sach->save();
        return redirect()->route('sach.index')->with("success","Thêm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmucs = DanhMuc::all();
        $sach = Sach::find($id);
        if($sach) {
            return view("admin.sach.edit",compact('sach','danhmucs'));
        } else {
            return redirect()->route("sach.index");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sach = Sach::find($id);
        if($sach) {
            $validated = $request->validate([
                'id_danhmuc' => 'required|numeric',
                'is_active'=> 'required|numeric|min:0|max:1',
                'tensach' => 'required|max:200',
                'tentacgia' => 'required|max:200',
                'nhaxuatban' =>'required|max:200',
                'noinhap' => 'max:200',
                'namxuatban' => 'required|digits:4|integer|min:2000',
                'gianhap' => 'required|numeric|min:0',
                'giaban' => 'required|numeric|min:0',
                'tap' => 'numeric|min:1|nullable',
                'anhdaidien' => 'required|max:500',
                'soluong' => 'required|numeric|min:1',
            ],[
                'id_danhmuc.required' => 'Danh mục không được để trống',
                'is_active.required' => 'Is active không được để trống',
                'tensach.required' => 'Tên sách là chuỗi có độ dài không quá 200',
                'tentacgia.required' => 'Tên tác giả là chuỗi có độ dài không quá 200',
                'namxuatban.required' => 'Năm xuất bản lớn hơn năm 2000',
                'gianhap.required' => 'Giá nhập là số lớn hơn bằng 0',
                'giaban.required' => 'Giá bán là số lớn hơn bằng 0',
                'tap' => 'Tập là số lớn hơn bằng 1',
                'anhdaidien.required' => 'Link ảnh đại diện có độ dài không quá 500',
                'soluong' => 'Số lượng là số lớn hơn bằng 1'
            ]);
            $sach->id_danhmuc = $request->id_danhmuc;
            $sach->tensach = $request->tensach;
            $sach->tentacgia = $request->tentacgia;
            $sach->nhaxuatban = $request->nhaxuatban;
            $sach->namxuatban = $request->namxuatban;
            $sach->noinhap = $request->noinhap;
            $sach->created_by = "admin";
            $sach->gianhap = $request->gianhap;
            $sach->giaban = $request->giaban;
            $sach->tap = $request->tap;
            $sach->anhdaidien = $request->anhdaidien;
            $sach->soluong = $request->soluong;
            $sach->is_active = $request->is_active;
            $sach->save();
            return redirect()->route('sach.index')->with("success","Cập nhật thành công");
        } else {
            return redirect()->route("sach.index")->with("error","Cập nhật không thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = Sach::destroy($id);
        return Response::json($sach);
    }
}
