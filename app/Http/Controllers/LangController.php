<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($locale)
    {
        if ($locale === 'pl') {
            Session::put('locale', 'pl');
            App::setLocale($locale);
        } else {
            Session::put('locale', 'en');
            App::setLocale('en');
        }

        return back();
    }
}
