<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use DB;

class CommentController extends Controller
{
	public function index(){
		return view('admin/comment/index')->withComments(Comment::all());
	}
	
	public function create(){
		return view('admin/comment/create');
	}

	public function store(Request $request){
		$this->validate($request, [
            'nickname'=>'required|max:20',
            'email'=>'required',
			'content'=>'required',
		]);
		
		$comment = new Comment;
		$comment->nickname = $request->get['nickname'];
		$comment->email= $request->get['email'];
		$comment->website= $request->get['website'];
		$comment->content= $request->get['content'];
		$comment->= $request->get[''];

		
		
	}

	public function edit(){

	}
	
}
