<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShipController extends Controller
{
    //
    public function index()
    {
        return view('form');
    }

    public function update($id)
    {
        return view('form');
    }

    public function create_ship(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'full_name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'cp_origin' => 'required|max:8',
            'cp_destiny' => 'required|max:8',
            'large' => 'required',
            'width' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('')
                ->withErrors($validator)
                ->withInput();
        }

        Ship::create([
            'full_name' => $request->post('full_name'),
            'email' => $request->post('email'),
            'telephone' => $request->post('telephone'),
            'cp_origin' => $request->post('cp_origin'),
            'cp_destiny' => $request->post('cp_destiny'),
            'large' => $request->post('large'),
            'width' => $request->post('width'),
            'height' => $request->post('height'),
            'weight' => $request->post('weight'),
            'content' => $request->post('content')
        ]);

        return redirect('')
            ->with('success', true);
    }

    public function update_ship(Request $request)
    {
        return redirect('')
            ->with('success_update', true);
    }

    public function ships_list()
    {
        return view('ships_list');
    }

    public function delete_ship($id)
    {

        Ship::destroy($id);

        return response()->json([
            "success" => true
        ]);
    }
}
