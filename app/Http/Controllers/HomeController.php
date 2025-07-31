<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $req){ 
		$blogs=[['name'=>'The Rise of Generative AI'],['name'=>'10 Ways AI Can Make You More Productive at Work'],['name'=>'Top AI Breakthroughs That Are Defining the Decade'],['name'=>'The Future Is Now: How AI Is Changing Everyday Life'],['name'=>'AI in 2025: What to Expect from the Next Wave of Innovation']];
		
		//print_r($blogs);die;
		
		return view('list-view',['blogs'=>$blogs]);			
	}	
}

