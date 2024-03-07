<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function create(): View
    {
        return view('static.contact-form');
    }

    public function store(): View
    {
        return view('main');
    }
}
