<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\System;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);

        return redirect()->back();
    }
}
