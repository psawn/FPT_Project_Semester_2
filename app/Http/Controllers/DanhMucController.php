<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmucs = DanhMuc::all();
        return view("admin.danhmuc.index", compact('danhmucs'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = DanhMuc::find($id);
        if($danhmuc) {
            return view("admin.danhmuc.edit",compact('danhmuc'));
        } else {
            return redirect()->route("danhmuc.index");
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
        
        $danhmuc = DanhMuc::find($id);
        if($danhmuc) {
            $validated = $request->validate([
                'slug' => 'required',
            ], [
                'slug.required'=>'URL không được để trống',
            ]);
            $danhmuc->slug = $request->slug;
            $res = $danhmuc->save();
            if($res) {
                alert()->success('Thêm thành công', 'Successfully');
                return redirect()->route('danhmuc.index');
                //return redirect()->route('danhmuc.index')->with("success","Cập nhật thành công");
            } else {
                alert()->error('Thêm thất bại', 'Something went wrong!');
                return redirect()->route('danhmuc.index');
                //return redirect()->route('danhmuc.index')->with("error","Cập nhật không thành công");
            }
        } else {
            alert()->error('Không tìm thấy bản ghi', 'Something went wrong!');
            return redirect()->route('danhmuc.index');
            //return redirect()->route('danhmuc.index')->with("error","Không tìm thấy bản ghi");
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
