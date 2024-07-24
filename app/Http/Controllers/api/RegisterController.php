<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request){
        
        $request->validate([
            'name' => 'require|string|max:255',
            'password' => 'require|string|min:8',
        ]);

        $user = User::create($request -> all());

        return response($user, 200);
    }
}
