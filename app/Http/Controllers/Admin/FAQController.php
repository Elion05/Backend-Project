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
        return view('admin.FAQ.create', compact('categories'));
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

}

