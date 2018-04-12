<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function setLanguage($lang)
    {
        Session::put('lang', $lang);
        
        return redirect()->back();
    }
}
