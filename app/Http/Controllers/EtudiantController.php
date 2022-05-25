<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Auth;
use PDF;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        $villes = Ville::all();
        $users = User::all();
       
       return view('etudiants.index', ['etudiants'=>$etudiants,
                                        'villes'=>$villes,
                                        'users'=>$users
                                       ]);
                                       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create',['villes'=>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $nouvelEtudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'villes_id' => intval($request->villes_id),
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'user_id' => 1
        ]);

        return redirect('etudiant/'.$nouvelEtudiant->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        
        $ville = Ville::find($etudiant->villes_id);
        $user = User::find($etudiant->id);
    
        return  view ('etudiants.show', ['etudiant'=>$etudiant,
                                            'ville'=>$ville,
                                            'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        $ville_id = Ville::find($etudiant->villes_id);
        $user = User::find($etudiant->id);
        
        return view('etudiants.edit', ['etudiant' => $etudiant,
                                        'ville_id'=>$ville_id,
                                        'user'=>$user,
                                        'villes'=>$villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $user = User::find($etudiant->id);
        $request->validate([
            'name' => 'required|min:2|max:191',
            'adresse'=> 'required|min:2|max:191',
            'villes_id'=> 'exists:villes,id',
            'date_naissance'=> 'required|date_format :Y/m/d|before :today|after :1900-01-01',
            'phone'=> 'required|min:12|regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',
            'email' => 'required|email|unique:users',
            
        ]);
        $etudiant->update([
            
            'adresse' => $request->adresse,
            'villes_id' => intval($request->villes_id),
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,  
        ]);
        User::where('id',$user->id)->update(['name' => $request->name, 'email' =>$request->email]);
        return redirect(route('etudiant.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('etudiant'));
    }

   


}
