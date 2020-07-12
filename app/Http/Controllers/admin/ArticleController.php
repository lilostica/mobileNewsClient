<?php

namespace App\Http\Controllers\admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index',compact('articles'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.article.create',compact('categories','users'));
    }


    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article($request->all());
        $file = $request->file('image');
        if (!is_null($file)) {
            $path = $file->store('image', 'public');
            $article['image'] = $path;
        }
        $article->save();
        return redirect()->route('admin.article.index')->with('status',"Article $article->title success added!");
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        return view('admin.article.edit',compact('article','categories','users'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $data['image'] = $path;
        }
        $article->update($data);
        return redirect()->route('admin.article.index')->with('status',"Article $article->title success updated!");
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.article.index')->with('status',"Article $article->title success deleted!");
    }
}
