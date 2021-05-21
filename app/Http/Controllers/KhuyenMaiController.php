<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khuyenmais = KhuyenMai::all();
        return view("admin.khuyenmai.index", compact('khuyenmais'));
        // không dùng eloquent thì k dùng đc hàm format date 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.khuyenmai.create");
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
            'phantramkhuyenmai' => 'required',
            'is_active' => 'required|numeric|min:0|max:100',
            'ngaybatdau'=>'required',
            'ngayketthuc'=>'required',
            'tieude'=> 'required',
            'noidung'=>'required',
        ], [
            'phantramkhuyenmai.required'=>'Phần trăm không được để trống',
            'is_active.required'=>'Is_Active không được để trống',
            'ngaybatdau.required'=>'Ngày không được để trống',
            'ngayketthuc.mimes'=>'Ngày không được để trống',
            'tieude.max'=>'Tiêu đề không được để trống',
            'noidung.required' =>'Nội dung không được để trống',
        ]);
        $khuyenmai = new KhuyenMai();
        $khuyenmai ->phantramkhuyenmai = $request->phantramkhuyenmai;
        $khuyenmai ->is_active = $request->is_active;
        $khuyenmai ->ngaybatdau = $request->ngaybatdau;
        $khuyenmai ->ngayketthuc = $request->ngayketthuc;
        $khuyenmai ->tieude = $request->tieude;
        $khuyenmai ->noidung = $request->noidung;
        $khuyenmai ->nguoitao = $request->nguoitao;
        $res = $khuyenmai->save();
        return redirect()->route('khuyenmai.index')->with("success","Thêm mới thành công");
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
        $khuyenmai = KhuyenMai::find($id);
        if($khuyenmai) {
            return view("admin.khuyenmai.edit",compact('khuyenmai'));
        } else {
            return redirect()->route("khuyenmai.index");
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
        $khuyenmai=KhuyenMai::find($id);
        if($khuyenmai){
            $validated = $request->validate([
                'phantramkhuyenmai' => 'required',
                'is_active' => 'required|numeric|min:0|max:100',
                'ngaybatdau'=>'required',
                'ngayketthuc'=>'required',
                'tieude'=> 'required',
                'noidung'=>'required',
                'nguoitao'=>'required'
            ], [
                'phantramkhuyenmai.required'=>'Phần trăm không được để trống',
                'is_active.required'=>'Is_Active không được để trống',
                'ngaybatdau.required'=>'Ngày không được để trống',
                'ngayketthuc.mimes'=>'Ngày không được để trống',
                'tieude.max'=>'Tiêu đề không được để trống',
                'noidung.required' =>'Nội dung không được để trống',
                'nguoitao.required' =>'Người tạo không được để trống',
            ]);
            $khuyenmai->phantramkhuyenmai = $request->phantramkhuyenmai;
            $khuyenmai->is_active = $request->is_active;
            $khuyenmai->ngaybatdau = $request->ngaybatdau;
            $khuyenmai->ngayketthuc = $request->ngayketthuc;
            $khuyenmai->tieude = $request->tieude;
            $khuyenmai->noidung = $request->noidung;
            $khuyenmai->nguoitao = $request->nguoitao;
            $khuyenmai->nguoisua = $request->nguoisua;
            $khuyenmai->save();
            return redirect()->route('khuyenmai.index')->with("success","Cập nhật thành công");
        } else {
            return redirect()->route('khuyenmai.index')->with("error","Cập nhật không thành công");
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
        $khuyenmai = KhuyenMai::destroy($id);
        return Response::json($khuyenmai);
    }
}
