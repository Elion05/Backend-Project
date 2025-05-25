<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller{


    public function __construct(){

        $this->middleware(['auth', 'can:manage-users']);
    
    }

    public function index(){
    
        $users = User::all();
        
        return view('admin.users.index',compact('users'));
    
    }


    //admin verheffen of geven aan gebruikers
    public function verhefAdmin(User $user){

        if(auth()->id() === $user->id){

            return back()->with('error', 'Kan eigen rechten niet aanpassen');
        
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()-> back() -> with('succesvol aangepast', 'Adminrechten zijn aangepats.');
    }


    //deze blok code is om de gebruiker zelf te maken (admin)
    public function gebruikerCreaten(){
        return view('admin.users.create');
    }
    public function opslaan(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'is_admin' => $request->has('is_admin'),
        ]);

        return redirect() -> route('admin.users.index') -> with('succes', 'U heeft een gebruiker succesvol aangemaakt aan het systeem.');
    }
}
