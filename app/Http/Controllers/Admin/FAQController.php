<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;


//FAQ controller
class FAQController extends Controller{

    public function create(){
        $categories = FaqCategory::all();    //automatisch arrays aanmaken
        return view('admin.faq.create', compact('categories'));
    }
    


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
        return redirect()->route('faqs.index')->with('succes', 'faq verwijdert');
    }

    
    //edit tonen
    public function edit(Faq $faq){
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }


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

}

