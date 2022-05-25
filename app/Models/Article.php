<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_en',
        'titre_fr',
        'contenu_en',
        'contenu_fr',
        
    ];

    public function articleHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    static public function selectArticles(){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }

        $query = Article::Select('id', 'user_id', 'created_at','updated_at', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        ->get();
       
        return $query;
    }
   

    static public function selectArticle($id = null){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }

        $query = Article::Select('id', 'user_id', 'created_at','updated_at', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        ->where('id', $id)
        ->get();
       
        return $query;
    }
   

    static public function selectUserArticles($id = null){
        $lg = "_en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "_fr";
        }

        $query = Article::Select('id', 'user_id', 'created_at', DB::raw('(case when titre'.$lg.' is null then titre_en else titre'.$lg.' end) as titre, (case when contenu'.$lg.' is null then contenu_en else contenu'.$lg.' end) as contenu'))
        ->where('user_id', $id)
        ->OrderBy('titre')
        ->get();
        
        return $query;
    }
}
