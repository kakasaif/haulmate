<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactPost;

class ContactController extends Controller
{
    public function store(StoreContactPost $request)
    {
        $validated = $request->validated();
        Contact::create($validated);

        return redirect()->route('about')
            ->with('success', 'Message sent successfully.');
    }
}
