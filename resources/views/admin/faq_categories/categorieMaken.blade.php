@extends('html_layouts.main')

@section('title', 'Nieuwe categorie')

@section('content')

<style>
.faq_container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
}


.faq_form input.faq_input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.faq_button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 4px;
    cursor: pointer;
}

</style>

<div class="faq_container">
    <h1 class="faq_title">Nieuwe categorie toevoegen</h1>

    <form method="POST" action="{{ route('faqcategories.store') }}" class="faq_form">
        @csrf
        <div>
            <label for="name" class="faq_label">Naam van de categorie</label>
            <input type="text" name="name" id="name" class="faq_input" required>
        </div>

        <button type="submit" class="faq_button">Opslaan</button>
    </form>
</div>

@endsection
