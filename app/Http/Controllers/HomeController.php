<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);
        return redirect()->route('home', ['#contact'])->with(['success' => 'Pesan Anda Berhasil Disimpan!']);
    }
}