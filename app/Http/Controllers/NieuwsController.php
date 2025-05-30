<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuws;
use Carbon\Carbon;
use App\Models\Contactmessage;

class NieuwsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $nieuwsitems = Nieuws::orderBy('verzondenOp', 'desc')->get();

        return view('nieuws.index', compact('nieuwsitems'));
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
    public function edit(Nieuws $nieuw){
       
        return view('admin.nieuws.edit', ['nieuws' => $nieuw]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nieuws $nieuw){

        
       

        $dataUpdate = $request->validate([
            'titel' => 'required|string|max:255',
            'nieuws' => 'required|string',
            'foto' => 'nullable|image|max:2048',
            'verzondenOp' => 'required|date',
        ]);
        

        if($request->hasFile('foto')){
            $dataUpdate['foto'] = $request->file('foto')->store('news_images', 'public');
        }

        $nieuw->update($dataUpdate);

        return redirect()->route('nieuws.index')->with('succes', 'NieuwsItem bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){

        $nieuws = Nieuws::findOrFail($id);

        //foto verwijderen code chatgpt heeft dit gedeelte geschreven
        if($nieuws->foto){
            \Storage::disk('public')->delete($nieuws->foto);
        }
        $nieuws->delete();

        return redirect()->route('nieuws.index')->with('succes', 'verwijdert');
    }



   public function home(){
    $nieuwsitems = Nieuws::orderBy('verzondenOp', 'desc')->get();

    // Voeg dit toe
    $weekelijks = Carbon::now()->subDays(7);
    $topUsers = Contactmessage::where('created_at', '>=', $weekelijks)
        ->selectRaw('naam, email, count(*) as berichten_count')
        ->groupBy('naam', 'email')
        ->orderByDesc('berichten_count')
        ->take(10)
        ->get();

    return view('home', compact('nieuwsitems', 'topUsers'));
    }
}
