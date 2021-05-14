<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home.home');
    }

    public function about()
    {
        return view('home.about');
    }

    public function testimonials()
    {
        $data = Testimonial::all();
        return view('home.testimonials')->with('data', $data);
    }

    // public function gallery()
    // {
    //     return view('home.gallery');
    // }

    public function photos()
    {
        $photos = Gallery::orderBy('original_name', 'DESC')->paginate(8);
        return view('home.photos', compact('photos'));
    }

    public function contact()
    {
        return view('home.contact');
    }
}
