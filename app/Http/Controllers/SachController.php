<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use App\Models\Book;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
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
        $saches = Book::all();
        return view("admin.sach.index",compact('saches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucs = Category::all();
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
            'category_id' => 'required|numeric',
            'is_active'=> 'required|numeric|min:0|max:1',
            'name' => 'required|max:200',
            'publisher' =>'required|max:200',
            'description' =>'required|max:200',
            'publication_year' => 'required|digits:4|integer|min:2000',
            'import_price' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'print_length' => 'numeric|min:1|nullable',
            'image' => 'required|max:500',
            'quantity' => 'required|numeric|min:1',
        ],[
            'category_id.required' => 'Danh mục không được để trống',
            'is_active.required' => 'Is active không được để trống',
            'name.required' => 'Tên sách là chuỗi có độ dài không quá 200',
            'publisher.required' => 'Nhà xuất bản là chuỗi có độ dài không quá 200',
            'description.required' => 'Nhà xuất bản là chuỗi có độ dài không quá 200',
            'publication_year.required' => 'Năm xuất bản lớn hơn năm 2000',
            'import_price.required' => 'Giá nhập là số lớn hơn bằng 0',
            'price.required' => 'Giá bán là số lớn hơn bằng 0',
            'print_length' => 'Tập là số lớn hơn bằng 1',
            'image.required' => 'Link ảnh đại diện có độ dài không quá 500',
            'quantity.required' => 'Số lượng là số lớn hơn bằng 1'
        ]);
        $sach = new Book();
        $sach->category_id = $request->category_id;
        $sach->name = $request->name;
        $sach->slug =  Str::slug($request->tensach,'-');
        $sach->publisher = $request->publisher;
        $sach->publication_year = $request->publication_year;
        $sach->created_by = "admin";
        $sach->import_price = $request->import_price;
        $sach->price = $request->price;
        $sach->print_length = $request->print_length;
        $sach->image = $request->image;
        $sach->quantity = $request->quantity;
        $sach->description = $request->description;
        $sach->is_active = $request->is_active;
        $res = $sach->save();
        if($res){
            alert()->success('Thêm thành công', 'Successfully');
            return redirect()->route('sach.index');
        } else {
            alert()->error('Thêm thất bại', 'Something went wrong!');
            return redirect()->route('sach.index');
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
        $danhmucs = Category::all();
        $sach = Book::find($id);
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
        $sach = Book::find($id);
        if($sach) {
            $validated = $request->validate([
                'category_id' => 'required|numeric',
                'is_active'=> 'required|numeric|min:0|max:1',
                'name' => 'required|max:200',
                'publisher' =>'required|max:200',
                'description' =>'required|max:200',
                'publication_year' => 'required|digits:4|integer|min:2000',
                'import_price' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0',
                'print_length' => 'numeric|min:1|nullable',
                'image' => 'required|max:500',
                'quantity' => 'required|numeric|min:1',
            ],[
                'category_id.required' => 'Danh mục không được để trống',
                'is_active.required' => 'Is active không được để trống',
                'name.required' => 'Tên sách là chuỗi có độ dài không quá 200',
                'publisher.required' => 'Nhà xuất bản là chuỗi có độ dài không quá 200',
                'description.required' => 'Nhà xuất bản là chuỗi có độ dài không quá 200',
                'publication_year.required' => 'Năm xuất bản lớn hơn năm 2000',
                'import_price.required' => 'Giá nhập là số lớn hơn bằng 0',
                'price.required' => 'Giá bán là số lớn hơn bằng 0',
                'print_length' => 'Tập là số lớn hơn bằng 1',
                'image.required' => 'Link ảnh đại diện có độ dài không quá 500',
                'quantity.required' => 'Số lượng là số lớn hơn bằng 1'
            ]);
            $sach->category_id = $request->category_id;
            $sach->name = $request->name;
            $sach->slug =  Str::slug($request->tensach,'-');
            $sach->publisher = $request->publisher;
            $sach->publication_year = $request->publication_year;
            $sach->created_by = "admin";
            $sach->import_price = $request->import_price;
            $sach->price = $request->price;
            $sach->print_length = $request->print_length;
            $sach->image = $request->image;
            $sach->quantity = $request->quantity;
            $sach->description = $request->description;
            $sach->is_active = $request->is_active;
            $res = $sach->save();
            if($res){
                alert()->success('Update thành công', 'Successfully');
                return redirect()->route('sach.index');
                //return redirect()->route('sach.index')->with("success","Cập nhật thành công");
            }else {
                alert()->error('Update thất bại', 'Something went wrong!');
                return redirect()->route("sach.index");
                //return redirect()->route("sach.index")->with("error","Cập nhật không thành công");
            }
        } else {
            alert()->error('Không tìm thấy bản ghi', 'Something went wrong!');
            return redirect()->route("sach.index");
            //return redirect()->route("sach.index")->with("error","Không tìm thấy bản ghi");
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
        $sach = Book::destroy($id);
        return Response::json($sach);
    }
}
