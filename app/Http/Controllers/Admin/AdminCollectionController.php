<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view('admin.collection.index',['collections' => $collections,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Collection();
        $data->title = $request->title;
        if ($request->file('yatayimage')){
            $data->yatayimage=$request->file('yatayimage')->store('images');
        }
        if ($request->file('dikeyimage')){
            $data->dikeyimage=$request->file('dikeyimage')->store('images');
        }
        $data->save();
        return redirect('admin/collection');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Collection::find($id);
        return view('admin.collection.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Collection::find($id);
        return view('admin.collection.edit', [
            'data' => $data,
        ]);
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
        $data = Collection::find($id);
        $data->title = $request->title;
        if ($request->file('yatayimage')){
            $data->yatayimage=$request->file('yatayimage')->store('yatayimage');
        }
        if ($request->file('dikeyimage')){
            $data->dikeyimage=$request->file('dikeyimage')->store('dikeyimage');
        }
        $data->save();
        return redirect('admin/collection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Collection::find($id);
        if($data->image && Storage::disk('public')->exists($data->image)){
            Storage::delete("$data->image");
        }
        $data->delete();
        return redirect('admin/collection');
    }
}
