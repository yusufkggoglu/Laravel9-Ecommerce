<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStockController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $size=Size::all();
        $product=Product::find($id);
        $stock=DB::table('stocks')->where('product_id',$id)->get();
        return view('admin.stock.index',[
         'stock'=>$stock,
        'product'=>$product,
        'size'=>$size,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product=Product::find($id);
        $size=Size::all();
        return view('admin.stock.create',[
            'size' => $size,
            'product'=>$product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $data = new Stock();
        $data->product_id =$request->product_id;
        $data->size_id = $request->size_id;
        $data->stock = $request->stock;
        $data->save();
        return redirect()->route('admin_stock_home', ['id' => $id]);
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
    public function edit($pid,$id)
    {
        $stock=Stock::find($id);
        $product=Product::find($pid);
        $size=Size::all();
        return view('admin.stock.edit',[
            'size' => $size,
            'stock'=>$stock,
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Stock $stock, $id,$pid)
    {
        $data = Stock::find($pid);
        $data->product_id =$request->product_id;
        $data->size_id = $request->size_id;
        $data->stock = $request->stock;
        $data->save();
        return redirect()->route('admin_stock_home', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid,$id)
    {
        $data=Stock::find($id);
        $data->delete();
        return redirect()->route('admin_stock_home', ['id' => $pid]);
    }
}
