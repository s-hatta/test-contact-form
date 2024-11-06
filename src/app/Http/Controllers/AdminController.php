<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        return view('admin', compact('contacts', 'categories', 'request'));
    }

    public function export()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=問い合わせリスト.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () {
            $createCsvFile = fopen('php://output', 'w');

            /* BOMを追加（Excelで開いたときに文字化けしないように）*/
            fputs($createCsvFile, "\xEF\xBB\xBF");

            $columns = [
                'ID',
                '名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
                'お問い合わせ日時',
            ];
            fputcsv($createCsvFile, $columns);

            $contacts = Contact::all();
            foreach ($contacts as $contact) {
                $csv = [
                    $contact->id,
                    $contact->last_name . '　' . $contact->first_name,
                    Contact::getGenderString($contact->gender),
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail,
                    $contact->created_at,
                ];
                fputcsv($createCsvFile, $csv);
            }
            fclose($createCsvFile);
        };
        return Response::stream($callback, 200, $headers);
    }
}
