<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function authenticate(Request $request)
    {
       $result = User::query()->where([
            ['name', $request -> name],
            ['email', $request -> email],
            ['password', $request -> password],
        ]) ->get();
       if(!empty($result)) {
           return $result;
       }
    }
}
