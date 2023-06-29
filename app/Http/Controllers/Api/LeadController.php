<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data,
            [
                'name'      => 'required|min:2|max:255',
                'email'     => 'required|email|max:255',
                'message'   => 'required|min:10',
            ],
            [
                'name.required'     => 'Name field is mandatory',
                'name.min'          => 'Name should be at least of :min types',
                'name.max'          => 'Name field cannot contain more than :max types',
                'email.required'    => 'Email address is mandatory',
                'email.email'       => 'Email address not valid',
                'email.max'         => 'Email address cannot contain more than :max types',
                'message.required'  => 'Message field is mandatory',
                'message.min'       => 'Message should be at least of :min types'
            ]
            );

            if($validator ->fails()){
                $success = false;
                $errors = $validator->errors();

                return response()->json(compact('success', 'errors'));
            }

        return response()->json($data);

    }
}
