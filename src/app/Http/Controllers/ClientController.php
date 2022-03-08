<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
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

    public function index()
    {
        $clients = Client::with([])->orderBy('created_at', 'desc')->get();
        return view('clients.index', ['clients' => $clients]);
    }

    public function edit(Request $request, $id = 0){
        $client = Client::find($id) ?? New Client();

        if($request->isMethod('post')){
            $post = $request->all();

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:clients,email,'. $client->id.',id',
                'password' => $post['password'] ? 'min:5' : ''
            ]);

            $client->name = $post['name'];
            $client->email = $post['email'];
            $client->password = $post['password'] ? Hash::make($post['password']) : $client->password;
            $client->status = isset($post['status']);

            $client->save();

            return redirect()->route('clients.edit', ['id' => $client->id])->with('success', __('admin.success_save_edit'));
        }

        return view('clients.edit', ['client' => $client]);
    }

    public function verification($id){
        $client = Client::find($id);

        if($client){
            if(!$client->email_verified_at){
                $client->email_verified_at = date("Y-m-d g:i:s");
                $client->save();
                return redirect()->back()->with('success', __('admin.success_verification'));
            } else {
                return redirect()->back()->with('error', __('admin.isset_verification'));
            }

        } else {
            return redirect()->back()->with('error', __('admin.fail_verification'));
        }
    }

    public function delete($id){
        $client = Client::find($id);

        if($client){
            $client->delete();
            return redirect()->back()->with('success', __('admin.success_delete_user'));

        } else {
            return redirect()->back()->with('error', __('admin.error_delete_user'));
        }
    }
}
