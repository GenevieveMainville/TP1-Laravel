<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;




class DocumentController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::selectDocuments();
       
        return view('documents.index',['documents'=>$documents]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mesDocuments()
    {
        $documents = Document::selectUserDocuments(Auth::user()->id);
        return view('documents.document', ['documents'=>$documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
            'titre'=> 'required|min:5|max:50',
           'doc' => 'required|mimes:pdf,zip,doc',
           'langue'=> 'required|in:en,fr' 
       ]);

       if ($request->hasFile('doc')) {
        $file = $request->file('doc');
           if ($file->isValid()) {
              
            $path = $file->store('files');
            $file->move(public_path($path));
            $nouveauDocument = new Document;
            $nouveauDocument->fill($request->all());
            $nouveauDocument->doc = $path;
            $nouveauDocument->user_id = Auth::user()->id;
            $nouveauDocument->save();

            return redirect('document');
           }
     }
       
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
      
        $documents = Document::selectDocument($document->id);
        
        return  view ('documents.show', ['documents'=>$documents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
       
        return view('documents.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'titre' => 'required|min:5|max:50'
        ]);
        $document->update([
            'titre' => $request->titre, 
        ]);
        return redirect('document/mesdocuments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect('document/mesdocuments');
    }
}
