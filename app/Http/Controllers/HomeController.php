<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $req){ 
		$blogs=[['name'=>'Hello World'],['name'=>'My Country']];
		
		//print_r($blogs);die;
		
		return view('list-view',['blogs'=>$blogs]);			
	}	
}

