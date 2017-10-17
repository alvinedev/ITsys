<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function index(){
		$title = 'DASHBOARD';
		$titleHead = 'DASHBOARD';
		$data = array(
			'title' => $title,
			'titleHead'=> $titleHead
		);
		return view('pages.dashboard')->with($data);
	}

	public function home(){
		$title = 'HOME';
		$data = array(
			'title'=>$title
		);
		return view('pages.home')->with($data);
	}


}
