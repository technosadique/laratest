<?php 
namespace App\Services;
use App\Models\Post;

class PostService{
	
	function createPost($data){		
		return Post::create($data);			
	}	
	
	function deletePost($id){
		return Post::where('id',$id)->delete();
	}
	
	function updatePost($data,$id){
		return Post::where('id',$id)->update($data);
	}
	
	function getAllPost(){
		return Post::orderby('title','DESC')->paginate(10);
	}	
	
}