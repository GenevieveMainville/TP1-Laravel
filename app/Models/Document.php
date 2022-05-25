<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'doc',
        'langue',
        
        
    ];

 
    
    static public function selectDocuments(){
        $lg = "en";
        if(session()->has('locale') &&  session()->get('locale') == 'fr'){
            $lg = "fr";
        }

        $query = DB::Table('documents')
        ->where('langue', $lg)
        ->OrderBy('created_at')
        ->get();
        return $query;
    }

    static public function selectUserDocuments($id = null){
    

        $query = DB::Table('documents')
        ->where('user_id', $id)
        ->OrderBy('created_at')
        ->get();
        
        return $query;
    }

    static public function selectDocument($id = null){

        $query = DB::Table('documents')
        ->where('id', $id)
        ->get();
       
        return $query;
    }


}
