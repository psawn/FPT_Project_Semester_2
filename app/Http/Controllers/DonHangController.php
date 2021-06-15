<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donhangs = Order::all();
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
        $donhang = Order::find($id);
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
        $donhang = Order::find($id);
        if($donhang){
            $donhang->status=$request->status;
            $donhang->save();
            
            $trangthaidonhang = new OrderStatus();
            $trangthaidonhang->order_id  = $id;
            $trangthaidonhang->status = $request->status;
            $trangthaidonhang->confirmed_by = "admin";
            $trangthaidonhang->confirmed_at = now();
            try {
                $trangthaidonhang->save();
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    alert()->error('Đơn hàng đã hủy', 'Something went wrong!');
                    return redirect()->route('donhang.edit',$id);
                    //return redirect()->route('donhang.edit',$id)->with("error","Đơn hàng đã hủy");
                }
            }
            alert()->success('Xác nhận thành công', 'Successfully');
            return redirect()->route('donhang.index');
            //return redirect()->route('donhang.index')->with("success","Xác nhận thành công");
        } else {
            alert()->error('Xác nhận không thành công', 'Something went wrong!');
            return redirect()->route('donhang.index');
            //return redirect()->route('donhang.index')->with("error","Xác nhận không thành công");
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
