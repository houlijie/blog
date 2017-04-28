<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles')->withArticles(Article::all());
    }

    public function update($id)
    {

    }

    public function delete($id){

    }
}
