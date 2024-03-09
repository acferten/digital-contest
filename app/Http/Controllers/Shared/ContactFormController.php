<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Domain\Shared\DataTransferObjects\ContactFormData;
use Domain\Shared\Models\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function create(): View
    {
        return view('static.contact-form');
    }

    public function store(ContactFormData $data): RedirectResponse
    {
        ContactForm::create([...$data->all()]);

        return redirect()->back()->with('success', 'Ваше обращение сохранено. Ответ придет на указанную электронную почту');
    }
}
