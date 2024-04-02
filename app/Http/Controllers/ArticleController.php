<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\State;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosArticles = Article::orderBy('id', 'DESC')->simplePaginate(2);
        return view('admin.articles.index', compact('datosArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all();
        return view('admin.articles.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'html' => ['required'],
            'title'=>['required'],
            'state_id'=>['required']
        ];

        $customMessages =[
            'html.required' => 'Este campo es obligatorio',
            'title.required' => 'Este campo es obligatorio',
            'state_id.required' => 'Este campo es obligatorio'
        ];

        $request->validate($rules, $customMessages);

        $article = new Article();

        $article->html = $request->html;
        $article->title = $request->title;
        $article->state_id = $request->state_id;

        $article->save();

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $states = State::all();
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $rules = [
            'html' => ['required'],
            'title'=>['required'],
            'state_id'=>['required']
        ];

        $customMessages =[
            'html.required' => 'Este campo es obligatorio',
            'title.required' => 'Este campo es obligatorio',
            'state_id.required' => 'Este campo es obligatorio'
        ];

        $request->validate($rules, $customMessages);

        $article->html = $request->html;
        $article->title = $request->title;
        $article->state_id = $request->state_id;

        $article->save();
        
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Article::destroy($id);
        return redirect()->route('admin.articles.index');
    }
}
