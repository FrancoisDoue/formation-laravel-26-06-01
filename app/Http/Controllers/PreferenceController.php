<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index() {
        $theme = session('theme', 'light');
        $locale = session('locale', 'fr');
        return view('preferences.index', compact('theme', 'locale'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'theme' => 'required|in:light,dark',
            'locale' => 'required|in:en,fr',
        ]);
        session(['theme' => $request->theme, 'locale' => $request->getLocale()]);
        return redirect()
            ->route('preferences.index')
            ->with('success','Préférences enregistrées !');
    }
}
