<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator =Validator::make( $data,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|min:2|max:255',
                'message' => 'required|min:2',
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'name.min' => 'Il nome deve avere almino :min caratteri',
                'name.max' => 'Il nome deve avere più si :max caratteri',
                'email.required' => "L'email è un campo obbligatorio",
                'email.min' => "L'email deve avere almeno :min caratteri",
                'email.max' => "L'email deve avere più si :max caratteri",
                'message.required' => 'Il message è un campo obbligatorio',
                'message.min' => 'Il message deve avere almeno :min caratteri',
            ]
        );
        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('hello@example.com')->send(new NewContact($new_lead));

        $success = true;
        return response()->json(compact('success'));
    }
}
