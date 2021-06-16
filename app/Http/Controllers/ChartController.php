<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doanhthus = DB::select(DB::raw("SELECT m.month, p.revenue FROM ( SELECT '1' AS MONTH UNION SELECT '2' AS MONTH UNION SELECT '3' AS MONTH UNION SELECT '4' AS MONTH UNION SELECT '5' AS MONTH UNION SELECT '6' AS MONTH UNION SELECT '7' AS MONTH UNION SELECT '8' AS MONTH UNION SELECT '9' AS MONTH UNION SELECT '10' AS MONTH UNION SELECT '11' AS MONTH UNION SELECT '12' AS MONTH ) AS m LEFT JOIN orders p ON m.month = (SELECT MONTH(updated_at) as month) ORDER BY cast(m.month as int) ASC"));
        $doanhthus = json_encode($doanhthus);
        
        $saches = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('parent_id','parent_name','quantity')->get();
        $saches->toJson();
        return view("admin.charts.charts",compact('saches','doanhthus'));
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
        //
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
        //
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
