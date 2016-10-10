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
	// DB::insert('insert into users (name,email,password) value(?,?,?)',['test3','test3@163.com','admin123']);

		$result = DB::table('comments')
					->join('articles', 'comments.article_id', '=', 'articles.id')
					->select(DB::raw('articles.*','comments.comment_id','comments.website'))
					->get();


		echo"<pre>";print_r($result);exit();
		


	
	
	

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
		//$comment->= $request->get['']
		
		
	}

	public function edit(){

	}
   
    /**数据库操作练习
     *
     *@return array
     */

	public function select(){
		//基础方式，使用？进行参数绑定
		$user = DB::select('select * from users where user_id = ?', [1]);

		//使用命名空间运行查找
		$user = DB::select('select * from users where user_id = :user_id',['user_id' =>1]);

	}

	public function insert(){
		return DB::insert('insert into users (id,name) values(?, ?)', [1,'danny']);

	}
	

	public function update(){
		return  DB::update('update users set email = "test@163.com" where user_id =?',[1] );
	}

	public function delete(){
		return DB::delete('delete from users');
	}

	//对应没有返回值的操作，可以使用statement方法
	public function statement(){
		DB::statement('drop table users');
	}

	//sql监听查询可通过在服务器容器中注册listen方法(./projectname/app/Provider/AppServiceProvider.php)
	public function boot(){
		//监控sql
		DB::listen(function($query){

		});
	}

	/**
	 *数据库的事务操作,自动执行commit/rollback
	 */
	// public transaction(){
	// 	// DB::transaction(function(){
	// 	// 	DB::table('users')->update(['votes' => 1]);

	// 	// 	DB::table('test')->delete();
	// 	// });
	// }
	//手动执行commit/rollback
	public function manualtrans(){
		DB::begTransaction();
	    DB::commit();
		DB::rollback();

	}
}	

