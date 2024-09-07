<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }
    public function view($id)
    {
        $user = User::find($id);
        return view('admin.users.view', compact('user'));
    }
    public function activate(Request $request)
    {        
        $user = User::find($request->id);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'User is activated successfully!');
    }
    public function deactivate(Request $request)
    {        
        $user = User::find($request->id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'User is deactivated successfully!');
    }
    public function delete(Request $request)
    {        
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success', 'User is deleted successfully');
    }

    public function editUserProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,' . $request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please enter a unique email address')->withErrors($validator)->withInput();
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'User profile is updated successfully!');
    }

    public function editUserPassword(Request $request)
    {
        $user = User::find($request->id);

        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password and Confirm Password do not match!');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Password must be at least 8 characters!');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User password is updated successfully!');
    }
}
