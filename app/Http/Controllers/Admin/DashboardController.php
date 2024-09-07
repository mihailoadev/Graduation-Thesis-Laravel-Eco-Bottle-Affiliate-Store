<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function editPassword(Request $request)
    {
        $user = Admin::find(Auth::guard('admin')->user()->id);


        if (empty($request->password) && empty($request->c_password)) {
            return redirect()->back()->with('failure', 'Please fill in the password fields!');
        }


        if (strlen($request->password) < 8 || strlen($request->c_password) < 8) {
            return redirect()->back()->with('failure', 'Password and Confirm Password must be at least 8 characters long!');
        }


        if ($request->password != $request->c_password) {
            return redirect()->back()->with('failure', 'Password and Confirm Password do not match!');
        }


        $user->password = bcrypt($request->password);
        $user->save();


        return redirect()->back()->with('success', 'Your password is updated successfully!');
    }

    public function editProfile(Request $request)
    {

        $user = Admin::find(Auth::guard('admin')->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($request->hasFile('profile_img')) {
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
            $user->save();
        }
        return redirect()->back()->with('success', 'Your profile is updated successfully!');
    }
    public function profile()
    {
        return view('admin.profile');
    }
}
