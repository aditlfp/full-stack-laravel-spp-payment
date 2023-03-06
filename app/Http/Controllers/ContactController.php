<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ct = Contact::paginate(5)->onEachSide(1)->fragment('contact');
        return view('admin.contact.index', ['ct' => $ct]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $ct = new Contact();

        $ct = [
            'username' => $request->username,
            'email' => $request->email,
            'desc' => $request->desc,
        ];

        Contact::create($ct);
        toastr('Succes To Contact Owner Website', 'success', 'Success !');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ct = Contact::findOrFail($id);
        return view('admin.contact.show', ['ct' => $ct]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ct = Contact::findOrFail($id);
        $ct->delete();
        toastr('Data Has Been Success Deleted', 'warning', 'Warning !');
        return redirect()->back();
    }
}
