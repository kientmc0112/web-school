<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Enums\DBConstant;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $status = isset($request->status) && $request->status ? $request->status : DBConstant::NEW_STATUS;
        $contacts = Contact::where('status', $status)->orderBy('updated_at', 'DESC')->get();

        return view('portal.contacts.index', compact('contacts', 'status'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('portal.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('note', 'status');
        Contact::find($id)->update($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect()->back();
    }
}
