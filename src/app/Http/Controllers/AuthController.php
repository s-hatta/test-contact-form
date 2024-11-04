<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(7)->onEachSide(2);
        return view('admin', compact('contacts'));
    }
}
