<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\newsEnglish;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $article_count = newsEnglish::all()->count();
        $testimonial_count = Testimonial::all()->count();
        $gallery_count = Gallery::all()->count();
        return view('admin.english.dashboard', compact('article_count','testimonial_count','gallery_count'));
    }


    public function english()
    {
        $data = newsEnglish::all();
        return view('admin.english.index')->with('data', $data);
    }

    public function news_create(Request $req)
    {
        $req->validate([
            'n_title' => 'required|max:255',
            'n_date' => 'required|date',
            'n_disc' => 'required',
            'n_file' => 'required',
        ]);

        $mfiles = $req->file('n_file_m');
        $file = $req->file('n_file');

        if ($req->hasFile('n_file')) {
            $file = $req->file('n_file');
            $new_file = time() . $file->getClientOriginalName();
            $file->storeAs('public/eng_news', $new_file);
        }

        $newsEnglish = new newsEnglish;
        $newsEnglish->title = $req->n_title;
        $newsEnglish->slug = SlugService::createSlug(newsEnglish::class, 'slug', $req->n_title);
        $newsEnglish->date = $req->n_date;
        $newsEnglish->discription = $req->n_disc;
        $newsEnglish->image = $new_file;
        $multi_files = '';

        if ($req->hasFile('n_file_m')) {
            foreach ($mfiles as $mfile) {
                $new_m_file = time() . $mfile->getClientOriginalName();
                $mfile->storeAs('public/m_eng_news/', $new_m_file);
                $multi_files .= $new_m_file . ",";
            }
        }
        $newsEnglish->mimages = $multi_files;
        $newsEnglish->save();

        return redirect()->back()->with('success', 'Article has been saved successfully.');
    }

    public function news_edit($id)
    {
        $data = newsEnglish::find($id);

        if ($data) {
            return view('admin.english.edit')->with('data', $data);
        } else {
            return redirect()->route('dashboard')->with('error', 'Article Not Found !!');
        }
    }

    public function news_update(Request $req, $id)
    {
        $req->validate([
            'n_title' => 'required|max:255',
            'n_date' => 'required|date',
            'n_disc' => 'required',
        ]);

        $up_data = newsEnglish::find($id);
        $up_data->title = $req->n_title;
        $up_data->date = $req->n_date;
        $up_data->discription = $req->n_disc;
        $up_data->slug = SlugService::createSlug(newsEnglish::class, 'slug', $req->n_title);

        $old_file = $req->h_file;
        if ($req->file('n_file') == "") {
            $up_data->image = $req->h_file;
        } else {

            $name = $req->file('n_file')->getClientOriginalName();
            $myfile = $up_data->image =  time() . $name;
            $req->file('n_file')->storeAs('public/eng_news', $myfile);
            $path = public_path() . "/storage/eng_news/" . $old_file;
            unlink($path);
        }
        $up_data->update();
        return redirect()->route('dashboard')->with('success', 'Article has been updated successfully.');
    }

    public function news_del($id)
    {
        $data = newsEnglish::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Articles not found.');
        } else {
            newsEnglish::where('id', $id)->delete();
            $eng_image = "/public/eng_news/" . $data->image;
            if (Storage::exists($eng_image)) {
                Storage::delete($eng_image);
            }

            $images = explode(",", $data->mimages);

            foreach ($images as $image) {
                $eng_images = "/public/m_eng_news/" . $image;
                if (Storage::exists($eng_images)) {
                    Storage::delete($eng_images);
                }
            }

            return redirect()->back()->with('success', 'Article has been deleted successfully.');
        }
    }
}
