<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::limit(3)->get();
        return view('frontend.index', compact('rooms'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function ourRoom()
    {
        $rooms = Room::all();
        return view('frontend.our-room', compact('rooms'));
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }
    public function blog()
    {
        return view('frontend.blog');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
