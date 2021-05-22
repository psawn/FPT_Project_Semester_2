<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\DonHangOnline;

class DonHangOnlineController extends Controller
{
    // /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dh_online = DonHangOnline::all();
        return view("donhang.donhangonline'", compact('dh_online'));
        // không dùng eloquent thì k dùng đc hàm format date
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("donhang.create");
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
            'diachi' => 'required',
            'trangthai' => 'required|numeric|min:0|max:100',
            'ngaytao'=>'required',
            'ngayduyet'=>'required',
            'nguoiduyet'=> 'required',
            'doanhthu'=>'required',
            'ghichu'=>'not required',
            'phiship'=>'required|decimal|min:0',
        ], [
            'diachi.required'=>'Địa chỉ không được để trống',
            'trangthai.required'=>'Trạng thái không được để trống',
            'ngaytao.required'=>'Ngày không được để trống',
            'ngayduyet.mimes'=>'Ngày không được để trống',
            'nguoiduyet.max'=>'Tên không được để trống',
            'doanhthu.required' =>'Doanh thu  không được để trống',
            'phiship.required' =>'Phí ship không được để trống',
        ]);
        $dh_online = new DonHangOnline();
        $dh_online ->diachi = $request->diachi;
        $dh_online ->trangthai = $request->trangthai;
        $dh_online ->ngaytao = $request->ngaytao;
        $dh_online ->ngayduyet = $request->ngayduyet;
        $dh_online ->nguoiduyet = $request->nguoiduyet;
        $dh_online ->doanhthu = $request->doanhthu;
        $dh_online ->ghichu = $request->ghichu;
        $dh_online ->phiship = $request->phiship;
        $res = $dh_online->save();
        return redirect()->route('donhang.donhangonline')->with("success","Thêm mới thành công");
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
        $dh_online = DonHangOnline::find($id);
        if($dh_online) {
            return view("donhang.edit",compact('dh_online'));
        } else {
            return redirect()->route("donhang.donhangonline");
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
        $dh_online=DonHangOnline::find($id);
        if($dh_online){
            $validated = $request->validate([
                'diachi' => 'required',
                'trangthai' => 'required|numeric|min:0|max:100',
                'ngaytao'=>'required',
                'ngayduyet'=>'required',
                'nguoiduyet'=> 'required',
                'doanhthu'=>'required',
                'ghichu'=>'not required',
                'phiship'=>'required|decimal|min:0'
                'ngaysua'=>'required'
                'nguoisua'=>'required'
            ], [
                'diachi.required'=>'Địa chỉ không được để trống',
                'trangthai.required'=>'Trạng thái không được để trống',
                'ngaytao.required'=>'Ngày không được để trống',
                'ngayduyet.require'=>'Ngày không được để trống',
                'nguoiduyet.max'=>'Tên không được để trống',
                'doanhthu.required' =>'Doanh thu không được để trống',
                'phiship.required' =>'Phí ship không được để trống',
                'ngaysua.required' =>'Ngày không được để trống',
                'nguoisua.required' =>'Tên  không được để trống',
            ]);
            $dh_online->diachi = $request->diachi;
            $dh_online->trangthai = $request->trangthai;
            $dh_online->ngaytao = $request->ngaytao;
            $dh_online->ngayduyet = $request->ngayduyet;
            $dh_online->nguoiduyet = $request->nguoiduyet;
            $dh_online->doanhthu = $request->doanhthu;
            $dh_online->ghichu = $request->ghichu;
            $dh_online->phiship = $request->phiship;
            $dh_online->ngaysua = $request->ngaysua;
            $dh_online->nguoisua = $request->nguoisua;
            $dh_online->save();
            return redirect()->route('donhang.donhangonline')->with("success","Cập nhật thành công");
        } else {
            return redirect()->route('donhang.donhangonline')->with("error","Cập nhật không thành công");
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
        $dh_online = DonHangOnline::destroy($id);
        return Response::json($dh_online);
    }
}
