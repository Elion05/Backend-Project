<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqCategoryController extends Controller
{
    
    //toont formulier om een niewue categorie aan te maken, gewoon de naam
    public function create(){
        return view('admin.faq_categories.categorieMaken');
    }

    //het opslaan van de categorie
    public function opslaan(Request $request){

        //algemene database validatie
        $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name',
        ]);


        //slaat het op
        FaqCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('faqcategories.create')->with('succes', 'Categorie toegevoegd!');
    }


    //tootn alle categorien
    public function index(){

        //alles opnemen
        $categories = FaqCategory::all();

        return view('admin.faq_categories.categorieMaken', compact('categories'));
    }


    //bewerken van categorie
    public function edit(FaqCategory $faqCategory){

        return view('admin.faq_categories.edit', compact('faqCategory'));
    }

    //een bestaande categorie aanpassen van naam
    //
   
 public function update(Request $request, FaqCategory $faqCategory){

     $request->validate([
           'name' => 'required|string|max:255|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        //updaten van categorie
        $faqCategory -> update([
           'name' => $request->name,
        ]);

        return redirect()->route('faqcategories.index')->with('succes', 'categorie aangepast');
    }

    //categorie verwijderen van database en formulier
    public function destroy(FaqCategory $faqCategory){

        $faqCategory->delete();

        return redirect()->route('faq.index')->with('succes', 'categorie succesvol vewijrdert van database');
    }
}
