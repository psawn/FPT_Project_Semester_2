<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\PromotionBook;
use App\Models\Book;
use App\Models\Promotion;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khuyenmais = Promotion::all();
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
            'percentage' => 'required',
            'is_active' => 'required|numeric|min:0|max:100',
            'start_date'=>'required',
            'end_date'=>'required',
            'title'=> 'required',
            'content'=>'required',
        ], [
            'percentage.required'=>'Phần trăm không được để trống',
            'is_active.required'=>'Is_Active không được để trống',
            'start_date.required'=>'Ngày không được để trống',
            'end_date.mimes'=>'Ngày không được để trống',
            'title.max'=>'Tiêu đề không được để trống',
            'content.required' =>'Nội dung không được để trống',
        ]);
        $khuyenmai = new Promotion();
        $khuyenmai ->percentage = $request->percentage;
        $khuyenmai ->is_active = $request->is_active;
        $khuyenmai ->start_date = $request->start_date;
        $khuyenmai ->end_date = $request->end_date;
        $khuyenmai ->title = $request->title;
        $khuyenmai ->content = $request->content;
        $khuyenmai ->created_by = $request->created_by;
        $res = $khuyenmai->save();
        if($res) {
            alert()->success('Thêm thành công', 'Successfully');
            return redirect()->route('khuyenmai.index');
            //return redirect()->route('khuyenmai.index')->with("success","Thêm mới thành công");
        }else {
            alert()->error('Thêm thất bại', 'Something went wrong!');
            return redirect()->route('khuyenmai.index');
        }
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
        $saches = Book::all();
        $khuyenmai = Promotion::find($id);
        if($khuyenmai) {
            return view("admin.khuyenmai.edit",compact('khuyenmai','saches'));
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
        $khuyenmai=Promotion::find($id);
        if($khuyenmai){
            $validated = $request->validate([
                'percentage' => 'required',
                'is_active' => 'required|numeric|min:0|max:100',
                'start_date'=>'required',
                'end_date'=>'required',
                'title'=> 'required',
                'content'=>'required',
                'created_by'=>'required'
            ], [
                'phantramkhuyenmai.required'=>'Phần trăm không được để trống',
                'is_active.required'=>'Is_Active không được để trống',
                'start_date.required'=>'Ngày không được để trống',
                'end_date.required'=>'Ngày không được để trống',
                'title.max'=>'Tiêu đề không được để trống',
                'content.required' =>'Nội dung không được để trống',
                'created_by.required' =>'Người tạo không được để trống',
            ]);
            $khuyenmai->percentage = $request->percentage;
            $khuyenmai->is_active = $request->is_active;
            $khuyenmai->start_date = $request->start_date;
            $khuyenmai->end_date = $request->end_date;
            $khuyenmai->title = $request->title;
            $khuyenmai->content = $request->content;
            $khuyenmai->created_by = $request->created_by;
            $khuyenmai->updated_by = "update_admin";
            $res= $khuyenmai->save();
            if($res==1){
                alert()->success('Update thành công', 'Successfully');
                return redirect()->route('khuyenmai.index');
            }else {
                alert()->error('Update không thành công', 'Error');
                return redirect()->route('khuyenmai.index');
            }
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
        $khuyenmai = Promotion::destroy($id);
        return Response::json($khuyenmai);
    }
    public function add($id,$id_sach)
    {
        $khuyenmaisach = new PromotionBook();
        $khuyenmaisach->book_id = $id_sach;
        $khuyenmaisach->promotion_id = $id;
        $khuyenmaisach->is_active=1;
        $khuyenmaisach->created_by="admin";
        $khuyenmaisach->save();
    } 
}
