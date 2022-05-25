<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;
use App\Models\Ville;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.registration',['villes'=>$villes]);
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
            'name' => 'required|min:2|max:191',
            'adresse'=> 'required|min:2|max:191',
            'villes_id'=> 'exists:villes,id',
            'date_naissance'=> 'required|date_format :Y/m/d|before :today|after :1900-01-01',
            'phone'=> 'required|min:12|regex:/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);
        
        $user = new User;
        $user->fill($request->all()); 
        $user->password = Hash::make($request->password); 
        $user->save();
        
        $etudiant = new Etudiant;
        $etudiant->fill($request->all());
        $etudiant->villes_id = $request->villes_id;
        $etudiant->id = $user->id;
        $etudiant->save();

        return redirect(route('login'))->withSuccess( trans('lang.text_success'));
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                ->withErrors(trans('auth.failed'));
        endif;        

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect(route('login'));
    }

    public function dashboard(){
        $name = "Guest";
        if(Auth::check()){
            $name = Auth::user()->name;
        }
        return view('etudiants.dashboard', ['name' => $name]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
