<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

    public function edit(Request $request)
    {
        $admin = Auth::user();

        if($request->isMethod('post')){
            $post = $request->all();

           $validation =  $this->validate($request, [
                'name' => 'required',
                'username' => 'required|regex:/(^[-a-zA-Z0-9@\.+_]+$)/u|unique:users,username,'. $admin->id,
                'email' => 'required|email|unique:users,email,'. $admin->id,
                'password' => $post['password'] ? 'min:5' : ''
            ]);

            $admin->update([
                'name' => $post['name'],
                'username' => $post['username'],
                'email' => $post['email'],
                'password' => $post['password'] ? Hash::make($post['password']) : $admin->getAuthPassword(),
            ]);

            return redirect()->route('admin.edit')->with('success', __('admin.success_save_edit'));
        }

        return view('admin.edit', ['admin' => $admin] );
    }
}
