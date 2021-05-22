<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Sach;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sach = Sach::all();
        return view("admin.sach.admin_view", compact('sach'));
        // không dùng eloquent thì k dùng đc hàm format date
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.sach.create");
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
            'tensach' => 'required',
            'tacgia' => 'required',
            'nhaxuatban' => 'required',
            'namxuatban' => 'required',
            'noinhap' => 'required',
            'gianhap' => 'required|decimal|min:0',
            'giaban' => 'required|decimal|min:0',
            'nguoitao' => 'required',
            'is_active' => 'required|numeric|min:0|max:100',
            'ngaytao'=>'required',
            'soluong'=> 'required|numeric|min:0',
        ], [
            'tensach.required'=>'Tên sách không được để trống',
            'tacgia.required'=>'Tác giả không được để trống',
            'nhaxuatban.required'=>'Nhà xuất bản không được để trống',
            'namxuatban.required'=>'Năm xuất bản không được để trống',
            'noinhap.required'=>'Nơi nhập không được để trống',
            'gianhap.min'=>'Giá nhập không được để trống',
            'giaban.min'=>'Giá bán không được để trống',
            'nguoitao.required'=>'Tên không được để trống',
            'is_active.required'=>'Trạng thái không được để trống',
            'ngaytao.required'=>'Ngày không được để trống',
            'soluong.min'=>'Số lượng không được để trống',
        ]);
        $sach = new Sach();
        $sach ->tensach = $request->tensach;
        $sach ->tacgia = $request->tacgia;
        $sach ->nhaxuatban = $request->nhaxuatban;
        $sach ->namxuatban = $request->namxuatban;
        $sach ->noinhap = $request->noinhap;
        $sach ->gianhap = $request->gianhap;
        $sach ->giaban = $request->giaban;
        $sach ->soluong = $request->soluong;
        $sach ->is_active = $request->is_active;
        $sach ->ngaytao = $request->ngaytao;
        $sach ->nguoitao = $request->nguoitao;
        $res = $sach->save();
        return redirect()->route('sach.admin_view')->with("success","Thêm mới thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $sach = Sach::find($id);
        if($sach) {
            return view("admin.sach.edit",compact('sach'));
        } else {
            return redirect()->route("sach.admin_view");
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
        $sach=Sach::find($id);
        if($sach){
            $validated = $request->validate([
                'tensach' => 'required',
                'tacgia' => 'required',
                'nhaxuatban' => 'required',
                'namxuatban' => 'required',
                'noinhap' => 'required',
                'gianhap' => 'required|decimal|min:0',
                'giaban' => 'required|decimal|min:0',
                'nguoitao' => 'required',
                'nguoisua' => 'required',
                'is_active' => 'required|numeric|min:0|max:100',
                'ngaytao'=>'required',
                'ngaysua'=>'required',
                'soluong'=> 'required|numeric|min:0',
            ], [
                'tensach.required'=>'Tên sách không được để trống',
                'tacgia.required'=>'Tác giả không được để trống',
                'nhaxuatban.required'=>'Nhà xuất bản không được để trống',
                'namxuatban.required'=>'Năm xuất bản không được để trống',
                'noinhap.required'=>'Nơi nhập không được để trống',
                'gianhap.min'=>'Giá nhập không được để trống',
                'giaban.min'=>'Giá bán không được để trống',
                'nguoitao.required'=>'Tên không được để trống',
                'is_active.required'=>'Trạng thái không được để trống',
                'ngaytao.required'=>'Ngày không được để trống',
                'soluong.min'=>'Số lượng không được để trống',
                'nguoisua.required'=>'Tên không được để trống',
                'ngaysua.required'=>'Ngày không được để trống',
            ]);
            $sach = new Sach();
            $sach ->tensach = $request->tensach;
            $sach ->tacgia = $request->tacgia;
            $sach ->nhaxuatban = $request->nhaxuatban;
            $sach ->namxuatban = $request->namxuatban;
            $sach ->noinhap = $request->noinhap;
            $sach ->gianhap = $request->gianhap;
            $sach ->giaban = $request->giaban;
            $sach ->nguoisua = $request->nguoisua;
            $sach ->soluong = $request->soluong;
            $sach ->is_active = $request->is_active;
            $sach ->ngaytao = $request->ngaytao;
            $sach ->ngaysua = $request->ngaysua;
            $sach ->nguoitao = $request->nguoitao;
            $sach->save();
            return redirect()->route('sach.admin_view')->with("success","Cập nhật thành công");
        } else {
            return redirect()->route('sach.admin_view')->with("error","Cập nhật không thành công");
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
