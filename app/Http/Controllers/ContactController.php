<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        Mail::send(new ContactMail($request->validated()));

        return back()->with('contact_success', 'Your message has been sent. We\'ll be in touch soon.');
    }
}
