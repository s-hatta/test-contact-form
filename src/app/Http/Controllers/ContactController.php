<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell1',
            'tell2',
            'tell3',
            'address',
            'building',
            'category_id',
            'detail',
        ]);

        $category = Category::find($contact['category_id']);
        $genderStr = Contact::getGenderString($request['gender']);
        return view('confirm', compact('contact', 'category', 'genderStr'));
    }

    public function store(Request $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('')->withInput();
        }

        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        $contact += array('tell' => $request['tell1'] . $request['tell2'] . $request['tell3']);
        Contact::create($contact);
        return view('thanks');
    }
}
