<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //except
        //Not Access in this methods - only
        $this->middleware('auth',['only'=>['create','update','delete']]);
    }

    public function getUsers($slug = null)
    {
        if(!is_null($slug))
        {
            $user = User::where('slug',$slug)->first();
            if($user)
                return response()->json($user, 200);
            else
                return response()->json(['message'=>'User does not exist']);
        }
        else
        { 
            $users = User::All();
            return response()->json($users,200);
        }
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request, $slug)
    {
        
    }

    public function delete($slug)
    {
        
    }
}
