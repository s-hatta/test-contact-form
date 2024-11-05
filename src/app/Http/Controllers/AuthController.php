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
    public function index(Request $request)
    {
        if ($request->has('gender')) {
            $gender = $request['gender'];
            $params = [
                'gender' => $gender,
            ];
            $contacts = Contact::where([
                ['gender', '=', $gender],
            ])->Paginate(7)->withQueryString()->onEachSide(2);
            $contacts->appends($params);
        } else {
            $contacts = Contact::Paginate(7)->onEachSide(2);
        }
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
