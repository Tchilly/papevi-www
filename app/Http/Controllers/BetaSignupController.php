<?php

namespace App\Http\Controllers;

use App\Mail\BetaWelcomeMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BetaSignupController extends Controller
{
    /**
     * Send a beta welcome email.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        Mail::to($validated['email'])->queue(new BetaWelcomeMail);

        return back()->with('beta_success', 'You\'re on the list! Check your inbox for a welcome email.');
    }
}
