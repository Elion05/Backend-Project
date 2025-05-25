<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqCategoryController extends Controller
{
    

    public function create(){
        return view('admin.faq_categories.categorieMaken');
    }

    public function opslaan(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name',
        ]);


        FaqCategory::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('faqcategories.create')->with('succes', 'Categorie toegevoegd!');
    }

}
