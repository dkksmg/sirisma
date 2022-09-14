<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $message = Contact::all();
        $countmessage = Contact::count();
        return view('pages.admin.index', [
            'countmessage' => $countmessage,
            'messages' => $message,
        ]);
    }
}