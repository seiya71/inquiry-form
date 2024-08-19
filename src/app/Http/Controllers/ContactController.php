<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(Request $request)
    {
        $tell_1 = $request->input('tell_1');
        $tell_2 = $request->input('tell_2');
        $tell_3 = $request->input('tell_3');

        $tell = $tell_1 . $tell_2 . $tell_3;

        $contact = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'tell' => $tell,
            'address' => $request->input('address'),
            'building' => $request->input('building'),
            'categories' => $request->input('categories'),
            'detail' => $request->input('detail')
        ];

        return view('confirm', compact('contact'));
    }
    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'email', 'tell', 'address', 'building', 'categories', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
    public function content()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
}
