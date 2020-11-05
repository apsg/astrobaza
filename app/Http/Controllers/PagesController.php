<?php
namespace App\Http\Controllers;

use App\Models\Opening;

class PagesController
{
    public function hours()
    {
        return view('hours');
    }

    public function contact()
    {
        $openings = Opening::future()->orderBy('date')->get();

        return view('contact')->with(compact('openings'));
    }
}
