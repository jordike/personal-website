<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function __invoke($locale)
    {
        if (in_array($locale, [ "en", "nl" ])) {
            App::setLocale($locale);

            session()->put("locale", $locale);
        }

        return redirect()->back();
    }
}
