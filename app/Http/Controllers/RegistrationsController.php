<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
class RegistrationsController extends Controller
{
    public function create(){
    	$title = "REGISTER";
    	$data = array(
    		'title'=>$title
    	);
    	return view('registration.create')->with($data);
    }

    public function store(){
    	$this->validate(request(),[
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required|confirmed'
    	]);

    	$user = User::create(request(['name','email','password']));
    	auth()->login($user);

    	return redirect()->home();
    }


}
