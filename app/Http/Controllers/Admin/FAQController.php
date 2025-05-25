<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq; //vragen en antwoorden model
use App\Models\FaqCategory; //model categorien


//FAQ controller, de vragen en antwoorden 
// controlleren en veranderen voor admins alleen
class FAQController extends Controller{


    //nieuwe vragen toe te voegen
    public function create(){
        $categories = FaqCategory::all();    //automatisch arrays aanmaken
        return view('admin.faq.create', compact('categories'));
    }
    

    //algemene database validatie, kan nog aangepast worden maar waarschijnlijk niet
    public function opslaan(Request $request){
        //validatie
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        //nieuwe faq toevoegen aan de database 
        Faq::create([
            'faq_category_id' => $request->faq_category_id,
            'question'        => $request->question,
            'answer'          => $request->answer,
        ]);

        return redirect() ->
         route('faqs.create') -> 
         with('succes' , 'vraag toegevoegt');
    }


//verwijderen van faq uit database
    public function destroy(Faq $faq){
        $faq->delete();
        return redirect()->route('faq.index')->with('succes', 'faq verwijdert');
    }

    
    //toont een formulier dat lijk op de create formulier, maar hier verander je dan de 
    //categorie, vraag en antwoord
    //werkt samen met update
    public function edit(Faq $faq){
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }


    //dit werkt samen met de bewerkt knop voor de admins, 
    //Gaat bewerkte gegevens veranderen en opslaan
    public function update(Request $request, Faq $faq){

        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
        $faq->update([  
            'faq_category_id' =>    $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('faq.index')->with('succes', 'succesvol gewijzigt');
    }

public function index() {
    $faqs = Faq::with('category')->get(); // Als je een relatie hebt
    return view('admin.faq.index', compact('faqs'));
}


}

