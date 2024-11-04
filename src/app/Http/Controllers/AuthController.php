<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Actions\Fortify\CreateNewUser;


class AuthController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(7)->onEachSide(2);
        return view('admin', compact('contacts'));
    }

    public function create(CreateNewUser $request)
    {
        User::create(
            [
                'name' => $request['user'],
                'email' => $request['email'],
                'password' => $request['password'],
            ]
        );
        return view('login');
    }
}
