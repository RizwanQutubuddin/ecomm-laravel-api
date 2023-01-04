<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->name);
        $user->save();
        return $user;
    }

    function login(Request $req)
    {
        $user=User::where(['email'=>$req->email])->first();
        if (!$user || Hash::check($req->password, $user->password)) {
            return response([
                "error"=>"Email Or Password mismatch"
            ]);
        }
        return $user;
    }
}
