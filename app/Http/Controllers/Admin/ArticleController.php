<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use DB;

class ArticleController extends Controller
{
    public function index()
	{
		$articles = DB::table('articles')->paginate(2);
		
		#return view('admin/article/index',['posts'=>$articles]);
		return view('admin/article/index')->withArticles(Article::all());
	}
	
	//文件创建
	public function create()
	{
		return view('admin/article/create');
	}

	//文件保存
	public function store(Request $request)
	{
		$this->validate($request, [
			'title'=>'required|unique:articles|max:255',
			'body'=>'required',
		]);
		
		$article = new Article;
		$article->title = $request->get('title');
		$article->body = $request->get('body');
		$article->user_id = $request->user()->id;

		if ($article->save()) {
			return redirect('admin/article');
		}else{
			return redirect()->back()->withInput()->withErrors(' 保存失败');
		}
	}

	//文件编辑
	public function edit($id)
	{
		return view('admin/article/edit')->withArticle(Article::find($id));
	}

	public function update($request,$id)
	{
		$this->validate($request, [
			'title' => 'required|unique:articles,title,'.$id.'|max:255',
			'body' => 'required',
		]);
	
		$article = Article::find($id);
		$article->title = $request->get('title');
		$article->body = $request->get('body');
		
		if ($article->save()){
			return view('admin/article');
		}else {
			return redirect()->back()->withInput()->withErrors(' 更新失败！');
		}	
	}

	//文件删除
	public function destroy($id)
	{
		Article::find($id)->delete();
		return redirect()->back()->withInput()->withErrors(' 删除成功！');
	}
}
