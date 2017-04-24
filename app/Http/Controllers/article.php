<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class article extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')
                ->where('published_at', '<=', Carbon::now())
                ->orderBy('published_at', 'desc')
                ->paginate(config('blog.post_per_page'));

        return view('article.index', compact('articles'));
    }

    public function showPost()
    {
        $slug = Request::get();
        echo "<pre>";print_r($slug);exit();
        $article = Article::whereSlug($slug)->firstOrFail();
        return view('article.post')->withPost($article);
    }
}
