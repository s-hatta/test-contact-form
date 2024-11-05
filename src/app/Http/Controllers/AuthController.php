<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(7)->onEachSide(2);
        $categories = Category::get()->all();
        return view('admin', compact('contacts', 'categories'));
    }
}
