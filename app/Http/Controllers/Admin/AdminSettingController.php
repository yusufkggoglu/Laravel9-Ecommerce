<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::first();
        if ($data == null) //if setting table is empty add one record
        {
            $data = new Setting();
            $data->title = 'Project Title';
            $data->save();
            $data = Setting::first();
        }
        return view('admin.setting.index', [
            'data' => $data
        ]);
    }
     
    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = Setting::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->company = $request->input('company');
        $data->address = $request->input('address');
        $data->googlemaps = $request->input('googlemaps');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->facebook = $request->input('facebook');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->contact = $request->input('contact');
        if ($request->file('icon')){
            $data->icon=$request->file('icon')->store('icon');
        }
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('admin_setting');
    }
}
