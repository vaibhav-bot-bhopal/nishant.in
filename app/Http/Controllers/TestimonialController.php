<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function viewTestimonial()
    {
        $data = Testimonial::all();
        return view('admin.testimonial.index')->with('data', $data);
    }

    public function addTestimonial(Request $req)
    {

        $req->validate([
            'n_name' => 'required|max:255',
            'n_disc' => 'required',
            'n_file' => 'required',
        ]);

        $file = $req->file('n_file');

        if ($req->hasFile('n_file')) {
            $file = $req->file('n_file');
            $new_file = time() . $file->getClientOriginalName();
            $file->storeAs('public/testimonial', $new_file);
        }

        $testimonial = new Testimonial;
        $testimonial->name = $req->n_name;
        $testimonial->discription = $req->n_disc;
        $testimonial->image = $new_file;

        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial has been saved successfully.');
    }

    public function editTestimonial($id)
    {
        $data = Testimonial::find($id);

        if ($data) {
            return view('admin.testimonial.edit')->with('data', $data);
        } else {
            return redirect()->route('viewTestimonial')->with('error', 'Testimonial Not Found !!');
        }
    }

    public function updateTestimonial(Request $req, $id)
    {
        $req->validate([
            'n_name' => 'required|max:255',
            'n_disc' => 'required',
        ]);

        $up_data = Testimonial::find($id);
        $up_data->name = $req->n_name;
        $up_data->discription = $req->n_disc;
        $old_file = $req->h_file;
        if ($req->file('n_file') == "") {
            $up_data->image = $req->h_file;
        } else {

            $name = $req->file('n_file')->getClientOriginalName();
            $myfile = $up_data->image =  time() . $name;
            $req->file('n_file')->storeAs('public/testimonial', $myfile);
            $path = public_path() . "/storage/testimonial/" . $old_file;
            unlink($path);
        }
        $up_data->update();
        return redirect()->route('viewTestimonial')->with('success', 'Testimonial has been updated successfully.');
    }

    public function deleteTestimonial($id)
    {
        $data = Testimonial::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Testimonial not found.');
        } else {
            Testimonial::where('id', $id)->delete();
            $testimonial_image = "/public/testimonial/" . $data->image;
            if (Storage::exists($testimonial_image)) {
                Storage::delete($testimonial_image);
            }

            return redirect()->back()->with('success', 'Testimonial has been deleted successfully.');
        }
    }
}
