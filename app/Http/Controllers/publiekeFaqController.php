<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\FaqCategory;

class publiekeFaqController extends Controller
{
    

    public function indexfaq(){

        $categories = FaqCategory::with('faqs')->get();
        return view('faq.index', compact('categories'));

    }

   
}
