<?php

namespace App\Http\Controllers\User;

use App\Model\user\article;
use App\Model\user\category;
use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{



    public function index()
    {
        return $this->renderIndex((new article())->newQuery()->where('status',1));
    }

    public function renderIndex($articleQuery)
    {
        $articles = $articleQuery->with('categories')->orderBy('created_at','DESC')->paginate(12);
        $categories = Category::all();
        return view('site.article.index',[

            'articles' => $articles,
            'categories' => $categories

        ]);
    }













    public function article(article $article)
    {

        $articles = Article::with('categories')->orderBy('created_at','DESC')->paginate(12);




        return view('site.article.show',compact(
            'categories',
            'articles',
            'article',
            'comments'
        ));
    }


    public function category(category $category)
    {
        $articles = $category->articles();
        return view('site.article.index',compact('articles'));

    }
    public function tag(tag $tag)
    {
        $articles = $tag->articles();
        return view('site.article.index',compact('articles'));
    }

}
