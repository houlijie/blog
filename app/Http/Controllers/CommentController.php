<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use DB;

class CommentController extends Controller
{
	public function create(){
		return view('show');
	}
	public function store(Request $request)
	{
		if(Comment::create($request->all())){
			return redirect()->back();
		} else {
			return redirect()->back()->withInput()->withErrors(' 评论发表失败！');
		}
	} 
}
