<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;

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
            $donhang->confirmed_by="admin";
            $donhang->confirmed_at = now();
            $donhang->is_active=1;
            $donhang->save();
            return redirect()->route('donhang.index')->with("success","Xác nhận đơn hàng thành công");
        } else {
            return redirect()->route('donhang.index')->with("error","Xác nhận đơn hàng không thành công");
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
