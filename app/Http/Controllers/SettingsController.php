<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_as;
        if ($role == 'admin') {
            return view('admin.profile.profile');
        }

        if ($role == 'superadmin') {
            return view('superadmin.profile.profile');
        }
    }

    public function changePassword()
    {
        $role = Auth::user()->role_as;

        if ($role == 'admin') {
            return view('admin.profile.password');
        }

        if ($role == 'superadmin') {
            return view('superadmin.profile.password');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $role = Auth::user()->role_as;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            if ($role == 'admin') {
                return redirect()->route('admin.profile')->withErrors($validator)->withInput();
            }

            if ($role == 'superadmin') {
                return redirect()->route('suadmin.profile')->withErrors($validator)->withInput();
            }
        } else {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->back()->with('success', 'Profile Successfully Updated.');
        }
    }

    public function updatePassword(Request $request)
    {
        $role = Auth::user()->role_as;

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            if ($role == 'admin') {
                return redirect()->route('admin.changePassword')->withErrors($validator)->withInput();
            }

            if ($role == 'superadmin') {
                return redirect()->route('suadmin.changePassword')->withErrors($validator)->withInput();
            }
        } else {
            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->old_password, $hashedPassword)) {
                if (!Hash::check($request->password, $hashedPassword)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->password);
                    $user->save();

                    return redirect()->back()->with('success', 'Password Successfully Changed.');
                    // Auth::logout();
                } else {
                    return redirect()->back()->with('error', 'New password cannot be the same as old password.');
                }
            } else {
                return redirect()->back()->with('error', 'Current password do not match.');
            }
        }
    }

    public function adminChangePassword($id)
    {
        $user = User::findOrFail($id);

        if ($user->role_as == 'admin') {
            return view('superadmin.user.password', compact('user'));
        }

        return redirect()->back()->with('error', 'You are not authorized to access another user profile.');
    }

    public function adminUpdatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('suadmin.changeadminpassword', $user->id)->withErrors($validator)->withInput();
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            // Auth::logout();
            return redirect()->back()->with('success', 'Password Successfully Changed.');
        }
    }
}
