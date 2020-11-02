<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($locale)
    {
        if ($locale === 'pl') {
            App::setLocale($locale);
        } else {
            App::setLocale('en');
        }

        return back();
    }
}
