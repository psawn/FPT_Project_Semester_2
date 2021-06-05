<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\TrangThaiDonHang;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donhangs = DonHang::all();
        return view("admin.donhang.index", compact('donhangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $donhang = DonHang::find($id);
        if($donhang) {
            return view("admin.donhang.edit",compact('donhang'));
        } else {
            return redirect()->route("donhang.index");
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
        $donhang = DonHang::find($id);
        if($donhang){
            $donhang->trangthai=$request->trangthai;
            $donhang->save();
            
            $trangthaidonhang = new TrangThaiDonHang();
            $trangthaidonhang->id_donhang = $id;
            $trangthaidonhang->trangthai = $request->trangthai;
            $trangthaidonhang->confirmed_by = "admin";
            $trangthaidonhang->confirmed_at = now();
            try {
                $trangthaidonhang->save();
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    return redirect()->route('donhang.edit',$id)->with("error","Đơn hàng đã hủy");
                }
            }
            return redirect()->route('donhang.index')->with("success","Xác nhận thành công");
        } else {
            return redirect()->route('donhang.index')->with("error","Xác nhận không thành công");
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
        //
    }
}
