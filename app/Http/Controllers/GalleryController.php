<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // Dropzone
    private $photos_path;

    public function __construct()
    {
        $this->photos_path = storage_path('app/public/gallery');
    }

    public function index()
    {
        $photos = Gallery::orderBy('original_name', 'DESC')->paginate(6);
        return view('admin.gallery.view-gallery', compact('photos'));
    }

    public function create()
    {
        return view('admin.gallery.gallery');
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $fileSizeInByte = File::size($photo);
            // $resize_name = $name . Str::random(2) . '.' . $photo->getClientOriginalExtension();

            $path = $photo->move($this->photos_path, $save_name);

            $upload = new Gallery();
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->filename = $save_name;
            $upload->file_size = $fileSizeInByte;
            $upload->file_path = $path;
            $upload->save();
        }

        return Response::json(['success' => 'Image Uploaded Successfully.'], 200);
    }

    public function destroy($id)
    {
        $data = Gallery::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Image not found !!');
        } else {
            Gallery::where('id', $id)->delete();
            $image = "/public/gallery/" . $data->filename;
            if (Storage::exists($image)) {
                Storage::delete($image);
            }
        }

        return redirect()->route('images-show')->with('error', 'Image Deleted Successfully.');
    }

    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
