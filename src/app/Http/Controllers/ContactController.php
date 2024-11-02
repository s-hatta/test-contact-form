<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'detail',
        ]);
        return view('confirm', compact('contact'));
    }
}
