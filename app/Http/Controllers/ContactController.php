<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('contacts.index');
    }
}
