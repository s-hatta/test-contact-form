<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $params = [];
        $query = Contact::query();

        if (!is_null($request['gender'])) {
            if ($request['gender'] != "4") {
                $params = $params + ['gender' => $request['gender']];
                $query = $query->where('gender', '=', $request['gender']);
            }
        }
        if (!is_null($request['category_id'])) {
            $params = $params + ['category_id' => $request['category_id']];
            $query = $query->where('category_id', '=', $request['category_id']);
        }

        if (!is_null($request['date'])) {
            $params = $params + ['date' => $request['date']];
            $query = $query->whereDate('created_at', $request['date']);
        }

        if (!is_null($request['text'])) {
            $params = $params + ['text' => $request['text']];
            $text = str_replace(' ', '', $request['text'],);
            $text = str_replace('　', '', $text,);
            $query = $query->where('email', 'like', '%' . $text . '%')
                ->orWhere('first_name', 'like', '%' . $text . '%')
                ->orWhere('last_name', 'like', '%' . $text . '%')
                ->orWhereRaw('CONCAT(last_name, "", first_name) LIKE ? ', '%' . $text . '%');
        }
        $contacts = $query->Paginate(7)->withQueryString()->onEachSide(2);
        $contacts->appends($params);
        return view('admin', compact('contacts', 'categories'));
    }
}
