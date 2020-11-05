<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Opening;

class PagesController
{
    public function home()
    {
        $galleries = Gallery::recent()->get();

        return view('welcome')->with(compact('galleries'));
    }

    public function hours()
    {
        return view('hours');
    }

    public function contact()
    {
        $openings = Opening::future()->orderBy('date')->get();

        return view('contact')->with(compact('openings'));
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();

        return view('gallery')->with(compact('galleries'));
    }
}
