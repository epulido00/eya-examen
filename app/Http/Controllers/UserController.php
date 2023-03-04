<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('user.login');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*
        $user = new User();
        $user->password = Hash::make($request->post('password'));
        $user->email = $request->post('email');
        $user->name = "Edwin Pulido";
        $user->save();
        */

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator);
        } else {
            if (Auth::attempt(['email' => $request->post('email'), 'password' => $request->post('password')])) {
                return redirect('admin/solicitudes');
            } else {
                return redirect('login')
                    ->with('error', true)
                    ->onlyInput('email');
            }
        }
    }
}
