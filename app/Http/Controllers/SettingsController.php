<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
	
	public function __construct(){
		$this->middleware('admin');
	}

    public function index(){
    	return view('admin.settings.index')->with('setting',Setting::first());
    }
    public function update(){

    	$this->validate(request(),[
            'site_name' => 'required',
            'address' => 'required',
            'contact_email' => 'required',
            'contact_number' => 'required',
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;

        $settings->address = request()->address;

        $settings->contact_email = request()->contact_email;

        $settings->contact_number = request()->contact_number;

        $settings->save();

        Session::flash('success', 'Settings successfully updated');

        return redirect()->back();
    }
}
