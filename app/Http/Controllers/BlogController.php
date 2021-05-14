<?php

namespace App\Http\Controllers;

use App\Models\newsEnglish;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs()
    {
        $datas = newsEnglish::orderBy('id', 'desc')->paginate(3);

        return view('blog.blogs')->with('datas', $datas);
    }

    public function blogDetail($slug)
    {
        $detail = newsEnglish::where('slug', $slug)->first();

        if ($detail) {
            return view('blog.blog-detail')->with('detail', $detail);
        } else {
            return view('errors.404');
        }
    }
}
