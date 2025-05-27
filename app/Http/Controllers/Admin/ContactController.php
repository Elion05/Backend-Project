<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactmessage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    //
    public function create(){
        return view('contact.formulier');
    }

    public function store(Request $request){
        
        $contact = $request->validate([
            'bericht' => 'required|string',
        ]);

        $contact['naam'] = auth()->user()->name;
        $contact['email'] = auth()->user()->email;

        Contactmessage::create($contact);

        return redirect()->route('home')->with('succes', 'Bericht is susccelvol verzonden naar de admins');
    }

    public function index()
    {
        $this->authorize('admin');
        $berichten = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('berichten'));
    }

}
