<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){
        $articles = Article::latest()->paginate(9);
        return view('articles.index', compact('articles')); 
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {

        // validate cara 1 dan 2
        // request()->validate([
        //     'title' => ['required'],
        //     'content' => ['required']
        // ]);

        //  Cara 1
        // $article = new Article();
        // $article->title = $request->title;
        // $article->slug = Str::slug($request->title) . '-' . Str::random(10);
        // $article->content = $request->content;
        // $article->save();

        // Cara 2
        // $slug = Str::slug($request->title) . '-' . Str::random(10);
        // Article::create([
        //     'title' => $request->title,
        //     'slug' => $slug,
        //     'content' => $request->content,
        // ]);



        // Cara 3  validate + input

        $attr = request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:3']
        ]);
        
        $attr['slug'] = Str::slug(request('title')) . '-' . Str::random(10);

        // $article = Article::create($attr); 

        $article = Auth::user()->articles()->create($attr); // method articles() mengambil dari relasi yang ada pada model user


        // return redirect()->back(); //opsi
        return redirect()->route('articles.show', $article);
    }

    // cara biasa
    // public function show($slug)
    // {
    //     // bisa menggungakan cara biasa atau route model binding
    //     $article = Article::whereSlug($slug)->first();

    //     // $article = Article::findOrFail($id)->first();
    //     // bisa menggunakan findOrFail atau abort(404)
    //     // if(is_null($article)){
    //     //     abort(404);
    //     // }

    //     return view('articles.show', compact('article'));
    // }

    // cara route model binding
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }


    public function edit(Article $article)
    {
         return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        // dd($article);

        $attr = request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:3']
        ]);

        $attr['slug'] = Str::slug(request('title')) . '-' . Str::random(10);

        $article->update($attr);

        return redirect()->route('articles.show', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
