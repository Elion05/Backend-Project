<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuws;

class NieuwsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nieuws.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titel' => 'required|string|max:255',
            'nieuws' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'verzondenOp' => 'required|date',
        ]);

        //van lijn 37 tot 44 heb ik chatgpt gebruikt, erboven is zelf geschreven
        if($request->hasFile('foto')){
            $data['foto'] = $request->file('foto')->store('news_images', 'public');
        }

        Nieuws::create($data);
        
        return redirect()->route('home')->with('succes','NieuwsITEM verzonden');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){

        
        $nieuwsitems = Nieuws::latest()->get();

        $dataUpdate = $request->validate([
            'titel' => 'required|string|max:255',
            'nieuws' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'verzondenOp' => 'required|date',
        ]);

        if($request->hasFile('foto')){
            $dataUpdate['foto'] = $request->file('foto')->store('news_images', 'public');
        }

        $nieuws->update($dataUpdate);

        return redirect()->route('nieuws.index')->with('succes', 'NieuwsItem bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function home(){

        $nieuwsitems = Nieuws::orderBy('verzondenOp', 'desc')->get();

   
        return view('home', compact('nieuwsitems'));
    }
}
