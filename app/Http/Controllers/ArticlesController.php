<?php

namespace App\Http\Controllers;

use App\Model\user\article;
use App\Model\user\category;
use App\Model\user\partial\color;
use App\Model\user\tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $colors = color::all();
        $categories =category::all();
        return view('site.article.create',compact('categories','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all());
        $this->validate($request,[

            'title'=>'required|unique:events|max:255',
            'body'=>'required|min:2',
            'tags'=>'required|min:2',
            'summary'=>'required|string|max:255',
            //'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);


        $article = new Article;

        $article->title = $request->input('title');
        $article->summary = $request->input('summary');
        $article->body= Input::get('body');
        $article->slug = $request->input('slug');
        $article->status = $request->input('status');
        $article->user_id = Auth::user()->id;


        $article->save();
        $article->saveTags($request->get('tags'));
        $article->colors()->sync($request->colors);
        $article->categories()->sync($request->categories);


        //alert()->success('Good Job','Article create with success');
        Toastr::success('Article create with success','', ["positionClass" => "toast-top-center"]);
        return redirect(route('/', Auth::user()->username))->with('success','Article create with success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $colors =color::all();
        $categories =category::all();
        $tags =tag::all();
        $article = Article::where('id',$id)->firstOrFail();


        if(auth()->user()->id !==$article->user_id){


            toastr()->error('<strong>Unauthorized edit this article contact Author</strong>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>', ['timeOut' => 5000]);
            return redirect('articles')
                ->with('error',"Unauthorized edit this article contact Author.");
        }


        return view('site.article.edit',compact('article','categories','colors','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(\request()->all());
        $this->validate($request,[

            'title'=>'required|unique:events|max:255',
            'body'=>'required|min:2',
            'tags'=>'required|min:2',
            'summary'=>'required|string|max:255',
            //'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);

        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->summary = $request->input('summary');
        $article->body= Input::get('body');
        $article->slug = $request->input('slug');
        $article->status = $request->input('status');
        $article->user_id = Auth::user()->id;





        $article->colors()->sync($request->colors);
        $article->categories()->sync($request->categories);
        $article->saveTags($request->get('tags'));
        $article->user_id = Auth::user()->id;
        $article->save();


        alert()->success('Good Job','Article update with success');
        //Toastr::success('Article create with success','', ["positionClass" => "toast-top-center"]);
        return redirect(route('/', Auth::user()->username))->with('success','Article update with success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::findOrFail($request->article_id);



        if(auth()->user()->id !==$article->user_id){

            Toastr::error('','Unauthorized delete this article contact Author ', ["positionClass" => "toast-top-center"]);
            return redirect('articles');
        }

        if ($article->cover_image != 'no_image'){

            Storage::delete('assets/img/event/'.$article->cover_image);
        }


        $article->delete();
        //Toastr::success('Article delete with success','', ["positionClass" => "toast-top-center"]);
        alert()->success('Good Job','Article delete with success');
        return redirect(route('/', Auth::user()->username))->with('success','Event delete with success!');
    }
}
