<?php
namespace App\Http\Controllers;

class PagesController
{
    public function hours()
    {
        return view('hours');
    }

    public function contact()
    {
        return view('contact');
    }
}
