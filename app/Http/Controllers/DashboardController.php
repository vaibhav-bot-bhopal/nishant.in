<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\newsEnglish;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $article_count = newsEnglish::all()->count();
        $testimonial_count = Testimonial::all()->count();
        $gallery_count = Gallery::all()->count();
        return view('admin.dashboard.dashboard', compact('article_count', 'testimonial_count', 'gallery_count'));
    }
}
