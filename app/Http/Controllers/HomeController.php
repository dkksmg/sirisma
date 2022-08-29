<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('pages.home', [
            'faqs' => $faqs
        ]);
    }
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);
        return redirect()->route('home', ['#contact'])->with(['success' => 'Pesan Anda Berhasil Disimpan!']);
    }
}