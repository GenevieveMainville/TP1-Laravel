<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Etudiant;
use App\Models\Users;
use Barryvdh\DomPDF\Facade as PDF;

class ArticleController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::selectArticles();
        return view('articles.index', ['articles'=>$articles]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mesArticles()
    {
        $articles = Article::selectUserArticles(Auth::user()->id);
        return view('articles.article', ['articles'=>$articles]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre_en' => 'required|min:5|max:100',
            'contenu_en' => 'required|min:20',
            'titre_fr' => 'required|min:5|max:100',
            'contenu_fr' => 'required|min:20'
        ]);

       $nouvelArticle = new Article;
       $nouvelArticle->fill($request->all());
       $nouvelArticle->user_id = Auth::user()->id;
       $nouvelArticle->save();

        return redirect('article/mesarticles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $articles = Article::selectArticle($article->id);
        
        return  view ('articles.show', ['articles'=>$articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
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
        $request->validate([
            'titre_en' => 'required|min:5|max:100',
            'contenu_en' => 'required|min:20',
            'titre_fr' => 'required|min:5|max:100',
            'contenu_fr' => 'required|min:20'
        ]);

        $article->update([
            'titre_en' => $request->titre_en,
            'titre_fr' => $request->titre_fr,
            'contenu_en' => $request->contenu_en,
            'contenu_fr' => $request->contenu_fr
        ]);
        return redirect('article/mesarticles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('article/mesarticles');
    }


    public function showPdf(Article $article){

        $pdf = PDF::loadView('articles.pdf', ['article' => $article]);
        //return $pdf->download('article-post.pdf');
        return $pdf->stream('article-post.pdf');
    }
}
